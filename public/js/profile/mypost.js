var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var api = 'customer/ClientsPublications';
var apiCategories = 'categorias';

const app = new Vue({
    el: '#app',
    data: {
        Data: [],
        pagination: {},
        refresData: false,
        categories: [],
        selectedCategory: null,
        content: '',
        idupdate: 0
    },
    mounted() {
        this.getData();
        this.getCategories();
    },
    methods: {
        getData: function (page = 1) {
            axios
                .get(api, {
                    params: { 'page': page }
                })
                .then(response => {
                    if (response.data) {
                        this.Data = [];
                        this.Data = response.data.data;
                        this.pagination = response.data;
                    }
                })
                .catch(error => {
                    console.error('Error al obtener datos:', error);
                });
        },
        getCategories: function () {
            axios
                .get(apiCategories)
                .then(response => (this.categories = response.data))
        },
        deletePost: function (idPost){
                new Toast({
                    message: '¿Estás seguro(a) de que deseas eliminarlo?',
                    type: 'default',
                    customButtons: [
                        {
                            text: 'Si',
                            onClick: function() {
                                const url = api + '/' + idPost;
                                axios.delete(url)
                                    .then(response => {
                                        new Toast({ message: response.data.message, type: 'success' });
                                        axios
                                        .get(api, {
                                            params: { 'page': page }
                                        })
                                        .then(response => {
                                            if (response.data) {
                                                this.Data = [];
                                                this.Data = response.data.data;
                                                this.pagination = response.data;
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error al obtener datos:', error);
                                        });
                                    })
                                    .catch(error => {
                                        console.log(error);
                                        new Toast({ message: error.response.data.error ?? 'ocurrio un problema', type: 'danger' });
                                });
                            }
                        }
                    ]
                });
        },
        showData: function (id){
            axios
            .get(api + '/' + id)
            .then(response => {
               this.selectedCategory = response.data.categoria_id;
               this.content = response.data.contenido;
               this.idupdate = response.data.id;
            })
        },
        updateData: function (){
            var request = {
                categoria_id: this.selectedCategory,
                contenido: this.content,
              };
            axios
            .patch(api + '/' + this.idupdate, request)
            .then(response => {
              new Toast({ message: 'Actualizado', type: 'success' });
            })
        }
    }
});
