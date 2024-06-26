var userData = "profile";
var id_user = document
    .querySelector("meta[name='user_id']")
    .getAttribute("content");

const app = new Vue({
    el: "#app",
    data: {
        DataUser: [],
        usuario: {
            // nombreUsuario: '',
            nombres: "",
            apellidos: "",
            telefono: "",
            fotodeperfil: null, // Utilizar null para manejar archivos
            codigopostal: "",
            estado: "",
            ciudad: "",
            direccion: "",
        },
        images: false,
    },
    watch: {
        "usuario.telefono"(val) {
            if (val.length > 10) {
                this.usuario.telefono = val.slice(0, 10);
            }
        },
    },
    mounted() {
        this.getUser();
    },
    methods: {
        showUpdate: function () {
            this.images = true;
        },
        getUser: function () {
            axios
                .get(userData)
                .then((response) => {
                    if (response.data) {
                        this.usuario = response.data;
                    } else {
                        new Toast({
                            message: "Registra tus datos",
                            type: "warning",
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error al obtener datos del usuario:", error);
                });
        },
        enviarFormulario: function () {
            axios
                .post(userData, this.usuario)
                .then((response) => {
                    new Toast({
                        message: "Registrado Correctamente",
                        type: "success",
                    });
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        PostPublication: function () {
            var body = {
                category_id: this.selectedCategory,
                content: this.content,
            };

            axios
                .post(apiPublicationsClients, body)
                .then((response) => {
                    new Toast({
                        message: response.data.message,
                        type: "success",
                    });
                    this.content = "";
                    this.selectedCategory = null;
                })
                .catch((error) => {
                    new Toast({
                        message: "Error al hacer la solicitud",
                        type: "danger",
                    });
                    console.error("Error al hacer la solicitud POST:", error);
                });
        },
        abrirModal: function () {
            var miModal = new bootstrap.Modal(
                document.getElementById("miModal")
            );
            miModal.show();
        },
    },
});
