var userData = 'profile';
var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');

const app = new Vue({
    el: '#app',
    data: {
        DataUser: [],
        usuario: {
            // nombreUsuario: '',
            nombres: '',
            apellidos: '',
            telefono: '',
            fotoPerfil: null, // Utilizar null para manejar archivos
            codigopostal: '',
            estado: '',
            ciudad: '',
            direccion: ''
        }
    },
    mounted() {
        this.getUser();
    },
    methods: {
        getUser: function () {
            new Toast({ message: 'Cargando.......', type: 'warning' });
            axios
            .get(userData)
            .then(response => {
                if (response.data) {
                    this.usuario = response.data;
                    new Toast({ message: 'Datos cargado con exito', type: 'success' });
                  } else {
                    new Toast({ message: 'Registra tus datos', type: 'danger' });
                  }
            })
            .catch(error => {
              console.error('Error al obtener datos del usuario:', error);
            });
        },
        enviarFormulario: function () {
            axios.post(userData, this.usuario)
                .then(response => {
                    console.log(response.data);
                    location.reload();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        cargarFotoPerfil(event) {
            // Manejar la carga de la foto de perfil
            // event.target.files contiene los archivos seleccionados
            this.usuario.fotoPerfil = event.target.files[0];
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
