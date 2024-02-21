var id_user = document.querySelector("meta[name='user_id']").getAttribute('content');
var api = 'ApiCommentsClients';
var apiCategories = 'categorias';

const app = new Vue({
    el: '#app',
    data: {
        post: [],
        comments: [],
        loading: true,
        msg: 0,
        idU: 0,
        pagination: 0,
        next: false,
        back: false,
        redis: []
    },
    mounted() {
        this.getData();
    },
    methods: {
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
                        if(this.post.length > 0){
                            this.idU = response.data.post[0].user_id;
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
    }
});

