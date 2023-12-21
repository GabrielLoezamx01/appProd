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
        Correo: '',
        request: {},
        section2: false,
        section3: false,
        section1: true
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
                        this.Data = response.data;
                        console.log(this.Data[0]);
                    }
                })
                .catch(error => {
                    console.error('Error al obtener datos:', error);
                });
        },
        nextSection: function (section) {
            if (this.name.trim() === '' || this.info.trim() === '') {
                new Toast({ message: 'Por favor, complete todos los campos obligatorios.', type: 'danger' });
            } else {
                this.section1 = false;
                this.section2 = true;
                if(section == 3){
                    if (this.postal.trim() === '' || this.Dirrecion.trim() === '' || this.estado.trim() === '' || this.ciudad.trim() === '') {
                       new Toast({ message: 'Por favor, complete todos los campos obligatorios.', type: 'danger' });
                    }else{

                        this.section2 = false;
                        this.section3 = true;
                    }
                }
            }
        },
        saveSeller: function (){
            this.request = {
                'name': this.name,
                'info': this.info,
                'postal': this.postal,
                'Dirrecion': this.Dirrecion,
                'estado': this.estado,
                'ciudad': this.ciudad,
                'Facebook': this.Facebook,
                'Tiktok': this.Tiktok,
                'Instagram': this.Instagram,
                'X': this.X,
                'Whatsapp': this.Whatsapp,
                'Correo': this.Correo
            };
            axios.post(api, this.request)
                    .then(response => {
                        new Toast({ message: response.data.message, type: 'success' });
                    })
                    .catch(error => {
                        new Toast({ message: 'Error al hacer la solicitud', type: 'danger' });
                        console.error('Error al hacer la solicitud POST:', error);
                    });
        }
    }
});
