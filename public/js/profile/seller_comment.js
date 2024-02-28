var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var api     = 'ApiCommentsPost';
var apiCategories = 'categorias';
const app         = new Vue({
    el: '#app',
    data: {
        post: [],
        comments: [],
        loading: true,
        msg: 0,
        sucursal_id: 0,
        pagination: 0,
        next: false,
        back: false,
        redis: [],
        redis2: [],
        fotodeperfil: '',
        commentContent: '',
        imagesPost: [],
        comentshow: false,
        imagenExpandida: '',
    },
    mounted() {
        this.getData();
    },
    methods: {

        mostrarImagenExpandida(img) {
            this.imagenExpandida = img.ruta;
            console.log(this.imagenExpandida);
            var myModal = new bootstrap.Modal(document.getElementById('imagenExpandidaModal'));
            myModal.show();
        },
        cerrarImagenExpandida() {
            this.imagenExpandida = null;
        },
        getData: function (page = 1) {
            this.pagination = page;
            if(this.pagination > 1){
                this.redis = this.comments;
            }

            var id = window.location.pathname.split('/').pop();
            axios
                .get(api + '/' + id, {
                    params: { 'page': page }
                })
                .then(response => {
                    if (response.data) {
                        this.post = response.data.post;
                        if (response && response.data && response.data.post && response.data.post.length > 0 && response.data.post[0].images) {
                            this.imagesPost = response.data.post[0].images;
                        } else {
                            console.error("La estructura de datos no es válida o está incompleta");
                        }
                        if(this.post.length > 0){
                            this.sucursal_id = response.data.post[0].sucursal_id;
                            this.comments = response.data.comments.data;
                            if(this.comments.length == 0){
                                if(this.redis.length > 0){
                                    this.next = false;
                                    this.back = true;
                                    this.comments = this.redis;
                                }
                            }else{
                                this.next = true;
                            }

                            this.loading = false;
                        }else{
                            this.loading = false;
                            this.msg = 1;
                        }
                        if(this.pagination == 1){
                            this.back = false;
                        }
                    }
                })
                .catch(error => {
                    console.error('Error al obtener datos:', error);
                });
        },
        nextComments: function () {
            this.getData(this.pagination + 1);
        },
        backComments: function () {
            this.getData(this.pagination - 1);
        },
        Hashtags: function (texto) {
            const regex = /#(\w+)/g;
            const textoResaltado = texto.replace(regex, '<a href="Hashtags?value=$1" style="color: blue;" @click.prevent="redireccionar(\'$1\')">#$1</a>');
            const textoResaltado1 = '<i class="fas fa-info-circle fa-1x " style="color: #8FC82D;"></i>' + textoResaltado;
            return textoResaltado1;
        },
        comentarpost: function () {
            this.comentshow = true;
        },
        insertcomment: function(){
            var request = {
                idpost: this.post[0].id,
                content: this.commentContent
            };
            axios
            .post(api , request)
            .then(response => {
                this.getData(1);
                this.comentshow = false;
                this.commentContent = '';
                new Toast({ message: 'Comentario Agregado', type: 'success' });
            })
            .catch(error => {
                new Toast({ message: 'Error al hacer la solicitud', type: 'danger' });
                console.error('Error al hacer la solicitud POST:', error);
            });
        },
        cerrarComentario: function() {
            this.comentshow = false;
            this.loading = true;
            this.getData( this.pagination);
        },
        formatDate(date) {
            const now = moment(); // Obtener la fecha y hora actual
            const commentDate = moment(date);
            const diffInMinutes = now.diff(commentDate, 'minutes');
            const intervals = {
                year: 'año',
                month: 'mes',
                week: 'semana',
                day: 'día',
                hour: 'hora',
                minute: 'minuto'
            };
            for (let interval in intervals) {
                const value = Math.floor(now.diff(commentDate, interval, true));
                if (value >= 1) {
                    const plural = value !== 1 ? 's' : '';
                    return `hace ${value} ${intervals[interval]}${plural}`;
                }
            }
            return 'hace unos momentos'
          }
    }
});

