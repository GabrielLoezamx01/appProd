var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var api = 'customer/ClientsPublications';
const app = new Vue({
    el: '#app',
    data: {
        Data: [],
        pagination: {}
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData: function (page = 1) {
            axios
                .get(api, {
                    params: { 'page': page }
                })
                .then(response => {
                    if (response.data) {
                        this.Data = response.data.data;
                        this.pagination = response.data;
                    }
                })
                .catch(error => {
                    console.error('Error al obtener datos:', error);
                });
        }
        // getUser: function () {
        //     axios
        //     .get(userData)
        //     .then(response => {
        //         if (response.data) {
        //             this.usuario = response.data;
        //             console.log(this.usuario);
        //              new Toast({ message: 'Datos cargado con exito', type: 'success' });
        //           } else {
        //               new Toast({ message: 'Registra tus datos', type: 'warning' });
        //           }
        //     })
        //     .catch(error => {
        //       console.error('Error al obtener datos del usuario:', error);
        //     });
        // },
        // enviarFormulario: function () {
        //     axios.post(userData, this.usuario)
        //         .then(response => {
        //             new Toast({ message: 'Registrado Correctamente', type: 'success' });
        //         })
        //         .catch(error => {
        //             console.error(error);
        //         });
        // },
        // PostPublication: function () {
        //     var body = {
        //         'category_id': this.selectedCategory,
        //         'content': this.content
        //     };

        //     axios.post(apiPublicationsClients, body)
        //         .then(response => {
        //             new Toast({ message: response.data.message, type: 'success' });
        //             this.content = '';
        //             this.selectedCategory = null;
        //         })
        //         .catch(error => {
        //             new Toast({ message: 'Error al hacer la solicitud', type: 'danger' });
        //             console.error('Error al hacer la solicitud POST:', error);
        //         });
        // },
        // abrirModal: function () {
        //     var miModal = new bootstrap.Modal(document.getElementById('miModal'));
        //     miModal.show();
        // }
    }
});
