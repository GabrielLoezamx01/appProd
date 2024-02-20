@extends('layouts.dashboard')
@section('title', 'Mis Publicaciones')
@section('content')
    <div class="p-2"></div>
    <div class="row d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #D6DFE4;">
        <section class="row justify-content-center col-md-6" style="background-color: #D6DFE4;">
            <div class="card shadow">
                <div class="card-body">
                    <h2 v-if="loading" class="fw-light mt-3 fs-6 p-2 animate__animated animate__bounce animate__infinite">
                        Cargando.....
                    </h2>
                    <h2 v-if="msg === 1">
                        No hay publicaciones
                    </h2>
                    <div v-for="p in post" v-if="loading === false">
                        <div class="d-flex align-items-center mt-3">
                            <div v-if="p.data.fotodeperfil == null">
                                <img src="{{ asset('img/icon.jpg') }}" class="card-img-top rounded-circle"
                                    alt="Profile photo" style="height: 40px;">
                            </div>
                            <div v-else class="text-center">
                                <img :src="'{{ asset('storage/fotos_perfil/') }}' + '/' + p.data.fotodeperfil"
                                    class="card-img-top rounded-circle" alt="Profile photo" style="height: 40px;">
                            </div>
                            <h5 class="card-title ml-2 m-2">@{{ p.data.nombres }} @{{ p.data.apellidos }}</h5>
                        </div>
                        <div class="mt-3">
                            <p class="card-text text-info text-dark" style="font-size: 15px;"
                                v-html="Hashtags(p.contenido)">
                                <u class="list-inline">
                                    <li class="list-inline-item rounded-5 p-2"
                                        style="background-color: #8FC82D; font-weight: 700; color: #FFFFFF; height: 10%; font-size: 10px">
                                        <i class="fas fa-tag " style="color: white; "></i> @{{ p.categoria.name }}
                                    </li>
                                </u>
                                <hr>
                        </div>
                    </div>
                    <div class="comment-list mt-3 p-3" v-if="loading === false"
                        style="max-height: 500px; overflow-y: auto;">
                        <div v-for="c in comments" class="mt-3">
                            <div class="d-flex align-items-center">
                                <div v-if="c.data.fotodeperfil == null">
                                    <img src="{{ asset('img/icon.jpg') }}" class="card-img-top rounded-circle"
                                        alt="Profile photo" style="height: 40px;">
                                </div>
                                <div v-else class="text-center">
                                    <img :src="'{{ asset('storage/fotos_perfil/') }}' + '/' + c.data.fotodeperfil"
                                        class="card-img-top rounded-circle" alt="Profile photo" style="height: 40px;">
                                </div>
                                <h6 class="fw-bold ml-2 m-2 fs-6">@{{ c.data.nombres }} @{{ c.data.apellidos }}</h6>
                            </div>
                            <p class="card-text text-info text-dark ms-5 mt-1" style="font-size: 15px;">
                                @{{ c.content }}</p>
                            <div v-if="{{Auth::user()->id}} === c.id_user">
                                    <div class="d-flex justify-content-end mt-3">
                                        <button class="btn btn-sm ms-3">
                                            <i class="fas fa-trash-alt custom-icon text-danger"></i>
                                        </button>
                                        <button class="btn   btn-sm ms-3">
                                            <i class="fas fa-edit text-info custom-icon"></i>
                                            </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('scripts')
        <script src="{{ asset('js/profile/comments.js') }}"></script>
    @endpush
@endsection
