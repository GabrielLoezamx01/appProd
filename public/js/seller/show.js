var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var api = '/seller/ApiUserSeller';
const app = new Vue({
    el: '#app',
    data: {
        Data: [],
        idSeller: null,
        dias: [
            { id: 1, name: 'Lunes', onTime: '', offTime: ''  },
            { id: 2, name: 'Martes', onTime: '', offTime: '' },
            { id: 3, name: 'Miercoles', onTime: '', offTime: '' },
            { id: 4, name: 'Jueves', onTime: '', offTime: '' },
            { id: 5, name: 'Viernes', onTime: '', offTime: '' },
            { id: 6, name: 'Sabado', onTime: '', offTime: '' },
            { id: 7, name: 'Domingo', onTime: '', offTime: '' }
        ],
        sellerName: '',
        modalTitle: '',
        idDia: null,
        divDias: false,
        redes: false,
        horarios: false,
        informacion: false,
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
        onTime: null,
        offTime: null
    },
    mounted() {
        const sellerIdElement = this.$el.querySelector('[data-seller-id]');
        if (sellerIdElement) {
            this.idSeller = sellerIdElement.getAttribute('data-seller-id');
        } else {
            console.error('Elemento con data-seller-id no encontrado.');
        }
        this.getData();
    },
    methods: {
        getData: function () {
            axios.get(api + '/' + this.idSeller)
                .then(response => {
                    if (response.data) {
                        const json = response.data;
                        this.sellerName = json.nombre;
                        console.log(json);
                        this.idSeller = json.id;
                        this.formatClock(json);
                        this.redesview(json);
                        this.horariosview(json);
                        this.viewdata(json);
                    }
                })
                .catch(error => {
                    new Toast({ message: 'No se pudo cargar la informacion de la sucursal', type: 'danger' });
                });
        },
        formatClock: function (json) {
            this.dias.forEach(dia => {
                const nombreDia = dia.name.toLowerCase(); // Convertir el nombre del día a minúsculas
                dia.onTime = json[`${nombreDia}_inicio`];
                dia.offTime = json[`${nombreDia}_fin`];
            });
        },
        saveSeller: function () {
            if (this.Correo.trim() === '') {
                new Toast({ message: 'Por favor, complete todos los campos obligatorios.', type: 'danger' });
                return 0;
            }
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
        openFileExplorer() {
            this.$refs.fileInput.click();
        },
        handleFileChange(event) {
            this.imgs = event.target.files;
        },
        editHorario: function (id, dia) {
            this.idDia = id;
            this.modalTitle = 'Horario del ' + dia;
        },
        openModal: function (redes, horarios, informacion) {
            this.redes = redes;
            this.horarios = horarios;
            this.informacion = informacion;
        },
        redesview: function (json) {
            this.modalTitle = 'Redes Sociales';
            this.openModal(true, false, false);
            this.Correo = json.correo;
            this.Tiktok = json.tiktok;
            this.Facebook = json.facebook;
            this.Instagram = json.instagram;
            this.X = json.twitter;
            this.Whatsapp = json.whatsapp;
        },
        updateRedes: function () {
            if (this.Correo.trim() === '') {
                new Toast({ message: 'Por favor, complete todos los campos obligatorios.', type: 'danger' });
                return 0;
            }
            var request = {
                'Facebook': this.Facebook,
                'Tiktok': this.Tiktok,
                'Instagram': this.Instagram,
                'X': this.X,
                'Whatsapp': this.Whatsapp,
                'Correo': this.Correo,
                'section': 1
            };
            axios.patch(api + '/' + this.idSeller, request)
                .then(response => {
                    new Toast({ message: response['data']['message'], type: 'success' });
                })
                .catch(error => {
                    console.log(error);
                    new Toast({ message: 'No se pudo cargar las sucursales', type: 'danger' });
                });
        },
        horariosview: function (json) {
            this.modalTitle = 'Horarios de la sucursal';
            this.openModal(false, true, false);
        },
        updateOnTime(dayId) {
            const horaInicio = this.dias.find(day => day.id === dayId).onTime;
            console.log('Hora de inicio para el día con ID:', dayId, 'es', horaInicio);
            var request = {
                'value': horaInicio,
                'id': dayId,
                'section': 2,
                'type': 'on'
            };
            axios.patch(api + '/' + this.idSeller, request)
                .then(response => {
            })
            .catch(error => {
                console.log(error);
                new Toast({ message: 'No se pudo cargar las sucursales', type: 'danger' });
            });
        },
        updateOffTime(dayId) {
            const horaFinal = this.dias.find(day => day.id === dayId).offTime;
            console.log('Hora de cierre para el día con ID:', dayId, 'es', horaFinal);
            var request = {
                'value': horaFinal,
                'id': dayId,
                'section': 2,
                'type': 'off'
            };
            axios.patch(api + '/' + this.idSeller, request)
                .then(response => {
            })
            .catch(error => {
                console.log(error);
                new Toast({ message: 'No se pudo cargar las sucursales', type: 'danger' });
            });
        },
        viewdata: function (json) {

        },
        info: function () {
            this.openModal(false, false, true);
        }
    }
});
