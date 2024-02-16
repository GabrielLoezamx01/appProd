@extends('layouts.dashboard')
@section('title', 'Mis Sucursales')
@section('content')
    <div class=" mt-5 row d-flex justify-content-center align-items-center  "
        style="min-height: 100vh; background-color: #D6DFE4;">
        <div v-if="Data.length > 0">
            <div v-for="item in Data" class="mt-5 p-3" style="background-color: #f3f3f744;" :key="item.id">
                <div class="row">
                    <div class="col-md-4">
                        {{-- <img src="img/icon.jpg" class="img-fluid rounded-circle" :alt="item.sucursal.nombre"
                        v-if="item.sucursal.imagen_url == null" style="width: 100px; max-width: 100px;"> --}}
                        <img src="{{ asset('img/icon.jpg') }}" class="img-fluid" v-if="imagen_url == null">
                        <img :src="'img/sucursales/' + item.imagen_url" class="img-fluid" v-else>

                    </div>
                    <div class="col-md-8">
                        <h2 class="fs-2 mt-3 fw-bold">
                            @{{ item.nombre }}
                        </h2>
                        <p class="fw-light ">
                            @{{ item.acerca_de_nosotros }}
                        </p>
                        <a :href="'/seller/ShowSeller/' + item.id">
                            <button class="btn btn-options mt-3 btn-black">
                                <i class="fas fa-cogs"></i> Ajustes
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 m-5">
            <div class="d-md-flex align-items-cente card">
                <div class="card-body" v-if="Data.length == 0">
                    <div class="p-3">
                        <div class="search-container shadow-2 " style="background-color: #F3F3F7">
                            <i class="fas fa-search icon-search"></i>
                            <input type="search" placeholder="Buscar" class="form-search"
                                style="background-color: #F3F3F7" />
                        </div>
                        <button class="btn btn-options mt-3" data-bs-toggle="modal" data-bs-target="#myModal"
                            @click="crearsucursal()"> Crear
                            Sucursal</button>
                        <button class="btn btn-options mt-3" data-bs-toggle="modal" data-bs-target="#myModal"
                            @click="newPost()"> Nueva
                            Publicacion</button>
                    </div>
                    <div class="p-3">
                        <h1 class="fw-bold  fs-1">Sucursales<span class="fs-6 opacity-25 ">
                                @{{ Data.length }} Resultados
                            </span></h1>
                    </div>
                    <div v-for="item in Data" class="mt-5 p-3" style="background-color: #f3f3f744;" :key="item.id">
                        <div class="row">
                            <div class="col-md-4">
                                {{-- <img src="img/icon.jpg" class="img-fluid rounded-circle" :alt="item.sucursal.nombre"
                                v-if="item.sucursal.imagen_url == null" style="width: 100px; max-width: 100px;"> --}}
                                <img src="{{ asset('img/icon.jpg') }}" class="img-fluid" v-if="imagen_url == null">
                                <img :src="'img/sucursales/' + item.imagen_url" class="img-fluid" v-else>

                            </div>
                            <div class="col-md-8">
                                <h2 class="fs-2 mt-3 fw-bold">
                                    @{{ item.nombre }}
                                </h2>
                                <p class="fw-light ">
                                    @{{ item.acerca_de_nosotros }}
                                </p>
                                <a :href="'/seller/ShowSeller/' + item.id">
                                    <button class="btn btn-options mt-3 btn-black">
                                        <i class="fas fa-cogs"></i> Ajustes
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-if="Data.message">
                        <h1 class="text-center  fw-bold mt-5" v-if="Data.message">
                            @{{ Data.message }}
                        </h1>
                        <button class="btn btn-login mt-5" data-bs-toggle="modal" data-bs-target="#myModal"> Crear
                            Sucursal</button>
                    </div>
                </div>
            </div>
        </div>
        @include('seller.components.modal')
    </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/seller/myseller.js') }}"></script>
    @endpush
@endsection
