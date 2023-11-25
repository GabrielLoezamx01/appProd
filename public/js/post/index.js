var apiPublications = '/customer/Publications';
var apiLikes = 'customer/Likes_Publications/';
var apiPublicationsClients = 'customer/ClientsPublications';
var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var apiCategories = 'categorias';

const app = new Vue({
    el: '#app',
    data: {
        conectado: true,
        items: [],
        showAll: false,
        categories: [],
        selectedCategory: null,
        content: '',
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
        getCategories: function () {
            axios
                .get(apiCategories)
                .then(response => (this.categories = response.data))
        },
        showAllTags: function (item) {
            this.showAll = true;
        },
        isUserLiked: function (item) {
            const valor = item.likes.some(like => like.user_id === +id_user);
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
        },
        PostPublication: function () {
            var body = {
                'category_id': this.selectedCategory,
                'content': this.content
            };

            axios.post(apiPublicationsClients, body)
                .then(response => {
                    new Toast({ message: response.data.message, type: 'success' });
                    this.content = '';
                    this.selectedCategory = null;
                })
                .catch(error => {
                    new Toast({ message: 'Error al hacer la solicitud', type: 'danger' });
                    console.error('Error al hacer la solicitud POST:', error);
                });
        },
        abrirModal: function () {
            var miModal = new bootstrap.Modal(document.getElementById('miModal'));
            miModal.show();
        }
    }
});
