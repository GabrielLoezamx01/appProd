var userData = "profile";
const app = new Vue({
    el: "#app",
    data: {
    },
    mounted() {
        this.getUser();
    },
    methods: {
        getUser: function () {
            axios
                .get(userData)
                .then((response) => {
                    console.log(response.data);
                    if (response.data) {
                        this.usuario = response.data;
                    } else {
                        // window.location.href = "/perfil";
                    }
                })
                .catch((error) => {
                    console.error("Error al obtener datos del usuario:", error);
                });
        }
    },
});
