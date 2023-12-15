var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var api = 'ApiUserSeller';
const app = new Vue({
    el: '#app',
    data: {
        Data: [],
        name: '',
        info: '',
        estado: '',
        estado: '',
        ciudad: '',
        postal: '',
        Dirrecion: '',
        Facebook: '',
        Tiktok: '',
        Instagram: '',
        X: '',
        Whatsapp: '',
        Correo: ''


    },
    mounted() {
        this.getData();
    },
    methods: {
        getData: function () {
            axios
            .get(api)
            .then(response => {
                if (response.data) {
                    this.Data = response.data;  // Asigna la respuesta de la API a this.Data
                }
            })
            .catch(error => {
                console.error('Error al obtener datos:', error);
            });
        },
        nextSection: function (section){
            this.valor = 'section' +  section + '-tab';
            console.log(       this.valor );
            var tab = new bootstrap.Tab(document.getElementById(this.valor));
            tab.show();
            this.valor = '';
        }
    }
});
