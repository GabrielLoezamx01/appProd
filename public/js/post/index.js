var apiPublications = '/customer/Publications';
var apiLikes        = 'customer/Likes_Publications/';
var id_user         = document.querySelector("meta[name='user_id']").getAttribute('content');
var apiCategories   = 'categorias';
const app = new Vue({
    el: '#app',
    data: {
        conectado: true,
        items: [],
        showAll: false,
        categories: [],
        selectedCategory: null
    },
    mounted() {
        this.getPost();
        this.getCategories();
    },
    methods: {
        getPost: function () {
            axios
                .get(apiPublications)
                .then(response => (this.items = response.data))
        },
        getCategories: function (){
            axios
            .get(apiCategories)
            .then(response => (this.categories = response.data))
        },
        showAllTags: function (item) {
            this.showAll = true;
        },
        isUserLiked: function (item) {
            const valor = item.likes.some(like => like.user_id === +id_user);
            console.log(valor);
            return valor;
        },
        toggleLike: function (item) {
            if (this.isUserLiked(item)) {
                const url = apiLikes + item.id;
                axios.delete(url)
                    .then(response => {
                        this.getPost();
                    })
                    .catch(error => {
                        console.error('Error en la solicitud DELETE:', error);
                    });
            } else {
                var data = {
                    'publicacion_id': item.id,
                    'user_id': id_user
                };
                axios.post(apiLikes, data)
                    .then(response => {
                        this.getPost();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    }
});
