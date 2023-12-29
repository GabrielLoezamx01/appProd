var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var api     = 'ApiUserSeller';
var apiPost = 'ApiPostSeller';
const app   = new Vue({
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
        section1: true,
        sectionPost: false,
        modalTitle: '',
        selectSucursal: null,
        content: '',
        imagen_url: null,
        imgs: null,
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
                    }
                })
                .catch(error => {
                    new Toast({ message: 'No se pudo cargar las sucursales', type: 'danger' });
                });
        },
        nextSection: function (section) {
            if (this.name.trim() === '' || this.info.trim() === '') {
                new Toast({ message: 'Por favor, complete todos los campos obligatorios.', type: 'danger' });
            } else {
                this.section1 = false;
                this.section2 = true;
                if (section == 3) {
                    if (this.postal.trim() === '' || this.Dirrecion.trim() === '' || this.estado.trim() === '' || this.ciudad.trim() === '') {
                        new Toast({ message: 'Por favor, complete todos los campos obligatorios.', type: 'danger' });
                    } else {

                        this.section2 = false;
                        this.section3 = true;
                    }
                }
            }
        },
        saveSeller: function () {
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
                    this.getData();
                    this.limpiar();
                    new Toast({ message: response.data.message, type: 'success' });
                })
                .catch(error => {
                    new Toast({ message: 'Error al hacer la solicitud', type: 'danger' });
                    console.error('Error al hacer la solicitud POST:', error);
                });
        },
        limpiar: function () {
            this.name = '';
            this.info = '';
            this.postal = '';
            this.Dirrecion = '';
            this.estado = '';
            this.ciudad = '';
            this.Facebook = '';
            this.Tiktok = '';
            this.Instagram = '';
            this.X = '';
            this.Whatsapp = '';
            this.Correo = '';
        },
        newPost: function () {
            this.section1 = false;
            this.modalTitle = 'Nueva Publicación';
            this.sectionPost = true;
        },
        crearsucursal (){

        },
        crearPublicacion: function () {
            var formData = new FormData();
            if (this.imgs) {
                for (let i = 0; i < this.imgs.length; i++) {
                    formData.append('imgs[]', this.imgs[i]);
                }
            }
            formData.append('contenido', this.content);
            formData.append('id', this.selectSucursal);

            axios.post(apiPost, formData, {
                headers: {
                  'Content-Type': 'multipart/form-data',
                },
              })
              .then(response => {
                console.log(response);
                this.content = '';
                this.selectSucursal = null;
                this.imgs = null;
                new Toast({ message: response.data.message, type: 'success' });
              })
              .catch(error => {
                new Toast({ message: 'Error al hacer la solicitud', type: 'danger' });
              });
        },
        openFileExplorer() {
            this.$refs.fileInput.click();
        },
        handleFileChange(event) {
            this.imgs = event.target.files;
        },
    }
});
