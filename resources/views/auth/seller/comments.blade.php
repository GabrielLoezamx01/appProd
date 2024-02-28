@extends('layouts.dashboard')
@section('title', 'Mis Publicaciones')
@push('styles')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-dialog {
            margin: auto;
            max-width: 90%;
        }

        .modal-content {
            background-color: transparent;
            border: none;
            box-shadow: none;
            overflow: hidden;
        }

        .modal-body {
            padding: 0;
        }

        .expanded-image {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .expanded-image:hover {
            transform: scale(1.1);
        }

        .modal-header .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: white;
            font-size: 1.5rem;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .images-container {
            display: flex;
            flex-wrap: wrap;
        }

        .images-container .col-md-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }

        .images-container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .images-container img:hover {
            opacity: 0.8;
        }
    </style>
@endpush
@section('content')
    <div class="row d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #D6DFE4;">
        <section class="row justify-content-center col-md-6" style="background-color: #D6DFE4;">
            <div class="p-5 mt-5"></div>
            <div class="card shadow">
                <div class="card-body">
                    <h2 v-if="loading" class="fw-light mt-3 fs-6 p-2 animate__animated animate__bounce animate__infinite">
                        Cargando.....
                    </h2>
                    <div v-for="p in post" v-if="loading === false">
                        <div class="d-flex align-items-center mt-3">
                            <div v-if="p.sucursal.imagen_url == null">
                                <img src="{{ asset('img/icon.jpg') }}" class="card-img-top rounded-circle"
                                    alt="Profile photo" style="height: 40px;">
                            </div>
                            <div v-else class="text-center">
                                <img :src="'{{ asset('storage/fotos_perfil/') }}' + '/' + p.sucursal.imagen_url"
                                    class="card-img-top rounded-circle" alt="Profile photo" style="height: 40px;">
                            </div>
                            <h5 class="card-title ml-2 m-2">@{{ p.sucursal.nombre }}</h5>

                        </div>
                        <div class="mt-3">
                            <p class="card-text text-info text-dark" style="font-size: 15px;"
                                v-html="Hashtags(p.contenido)"></p>



                            <div>
                                <div class="modal" id="imagenExpandidaModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img :src="'/storage/publicaciones/sucursales/' + imagenExpandida"
                                                    class="img-fluid expanded-image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row justify-content-start align-items-start images-container"
                                v-if="imagesPost && imagesPost.length > 0">
                                <div v-for="img in imagesPost" class="col-md-4 mb-5 text-center">
                                    <img :src="'/storage/publicaciones/sucursales/' + img.ruta" class="img-fluid"
                                        @click="mostrarImagenExpandida(img)">
                                </div>
                            </div>


                            <div v-else>
                                {{-- <p>No hay imágenes disponibles.</p> --}}
                            </div>



                            <hr>
                        </div>
                    </div>


                    <div class=" mt-3 p-3" v-if="loading === false">

                        <div v-if="comments.length === 0">
                            <p class="text-center fw-light">Sin Comentarios</p>
                        </div>


                        <div v-for="c in comments" v-if="comentshow === false" class="shadow-sm mb-1 bg-body">
                            <div class="p-3"></div>
                            <div class="d-flex align-items-center ms-3">
                                {{-- <div v-if="c.data.fotodeperfil == null">
                                    <img src="{{ asset('img/icon.jpg') }}" class="card-img-top rounded-circle"
                                        alt="Profile photo" style="height: 40px;">
                                </div>
                                <div v-else class="text-center">
                                    <img :src="'{{ asset('storage/fotos_perfil/') }}' + '/' + c.data.fotodeperfil"
                                        class="card-img-top rounded-circle" alt="Profile photo" style="height: 40px;">
                                </div> --}}
                                {{-- <strong class="ms-3 fs-6">
                                    <span>
                                        @{{ c.data.nombres }} @{{ c.data.apellidos }}
                                    </span>
                                </strong> --}}
                            </div>
                            <div class="ms-4">
                                <p class="card-text text-info text-dark ms-5 mt-1 fw-light " style="font-size: 15px;">
                                    @{{ c.content }}</p>
                            </div>
                            <div class="ms-4">
                                <span class="fw-light ms-5 mt-3" style="font-size: 12px">
                                    @{{ formatDate(c.created_at) }}
                                </span>
                            </div>
                            <div v-if="{{ Auth::user()->id }} === c.id_user" class="p-2">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm ms-3">
                                        <i class="fas fa-trash-alt custom-icon text-danger"></i>
                                    </button>
                                    <button class="btn btn-sm ms-3">
                                        <i class="fas fa-edit text-info custom-icon"></i>
                                    </button>
                                </div>
                            </div>
                            <div v-else>
                                <div class="p-2"></div>
                            </div>
                        </div>
                        <div v-if="comments.length > 0 && comentshow === false" class="text-center btn-sm mt-4">
                            <button v-if="comments.length > 3"
                                style=" background-color: #FFFFFF; color: #8FC82D;  padding: 8px 16px; "
                                @click="nextComments()" class="btn btn-sm" v-if="next === true">
                                <i class="fas fa-chevron-circle-right"></i> Siguiente
                            </button>
                            <button style=" background-color: #8FC82D; color: #FFFFFF; padding: 8px 16px;  "
                                @click="backComments()" class="btn btn-sm" v-if="back === true">
                                <i class="fas fa-chevron-circle-left"></i> Anterior
                            </button>

                        </div>
                        <div class="mt-2 m-5 mb-2">
                            <div class="p-3" v-if="comentshow">
                                <label for="comentario" class="fw-bold">
                                    Comentario
                                </label>
                                <textarea v-model="commentContent" maxlength="300" class="post-content fw-light text-justify"
                                    placeholder=".................." rows="6">
                                </textarea>
                            </div>
                            <button class="btn-login mt-2" @click="comentarpost()"
                                v-if="comentshow === false">Comentar</button>
                            <button class="btn-login mt-2" @click="insertcomment()" v-if="comentshow">Comentar</button>
                            <button class="btn-login mt-2" @click="cerrarComentario()" v-if="comentshow">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    @push('scripts')
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="{{ asset('js/profile/seller_comment.js') }}"></script>
    @endpush
@endsection
