var apiPublications = '/customer/Publications';
var apiLikes = 'customer/Likes_Publications/';
var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');

const app = new Vue({
    el: '#app',
    data: {
        conectado: true,
        items: [],
        showAll: false,

    },
    mounted() {
        this.getPost();
    },
    methods: {
        getPost: function () {
            axios
                .get(apiPublications)
                .then(response => (this.items = response.data))
        },
        showAllTags: function (item) {
            this.showAll = true;
        },
        isUserLiked: function (item, id) {
            return item.likes.some(like => like.user_id === +id_user);
        },
        toggleLike: function (item) {
            if (this.isUserLiked(item)) {
                const url = apiLikes + item.id;
                axios.delete(url)
                    .then(response => {
                    })
                    .catch(error => {
                        console.error('Error en la solicitud DELETE:', error);
                    });
                this.getPost();

            } else {
                var data = {
                    'publicacion_id': item.id,
                    'user_id': id_user
                };
                axios.post(apiLikes, data)
                    .then(response => {
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                this.getPost();
            }
        }
    }
});
