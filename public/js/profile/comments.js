var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var api = 'ApiCommentsClients';
var apiCategories = 'categorias';

const app = new Vue({
    el: '#app',
    data: {
        Data: [],
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData: function (page = 1) {
            var id = window.location.pathname.split('/').pop();
            axios
                .get(api + '/' + id, {
                    params: { 'page': page }
                })
                .then(response => {
                    if (response.data) {
                        console.log(response);
                        this.Data = response.data;
                    }
                })
                .catch(error => {
                    console.error('Error al obtener datos:', error);
                });
            }
            }
            });
