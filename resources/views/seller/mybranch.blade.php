@extends('layouts.dashboard')
@section('title', 'Mis Sucursales')
@section('content')

    <div class="container">
        <div class="btn-group">
            <div class="ms-4">
                <button class="btn btn-options mt-3  btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                    @click="crearsucursal()"> Crear
                    Sucursal</button>
            </div>
            <div class="ms-4">
                <button class="btn btn-options mt-3 btn-primary" data-bs-toggle="modal" data-bs-target="#myModal"
                    @click="newPost()"> Nueva
                    Publicacion</button>
            </div>

        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-12 shadow mt-5 bg-white">
                <div class="table-responsive mt-5">
                    <div class="">
                        <h2 class="table-title">Mis Sucursales</h2>
                        <div class="search-container shadow-2 " style="background-color: #F3F3F7">
                            <i class="fas fa-search icon-search"></i>
                            <input type="search" placeholder="Buscar" class="form-search"
                                style="background-color: #F3F3F7" />
                        </div>
                        <div class="table-responsive mt-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID
                                            <i class="fa fa-hashtag" aria-hidden="true" title="ID"></i>
                                        </th>
                                        <th>Nombre de la sucursal
                                            <i class="fa fa-building" aria-hidden="true" title="Nombre de la sucursal"></i>
                                        </th>
                                        <th>Opciones
                                            <i class="fa fa-cog" aria-hidden="true" title="Opciones"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in Data" class="mt-5 p-3" style="background-color: #f3f3f744;"
                                        :key="item.id">
                                        <td> @{{ item.id }}</td>

                                        {{-- <td>
                                            <img src="{{ asset('img/icon.jpg') }}" class="small-img"
                                                v-if="imagen_url == null">
                                            <img :src="'img/sucursales/' + item.imagen_url" class="small-img" v-else>
                                        </td> --}}
                                        <td> @{{ item.nombre }}</td>
                                        <td>
                                            <a :href="'/seller/ShowSeller/' + item.id">
                                                <button class="btn-options btn-black btn-sm">
                                                    Ajustes
                                                </button>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-group-horizontal mt-5">
        <button class="btn-options btn-primary">Primario</button>
        <button class="btn-options btn-error">Error</button>
        <button class="btn-options btn-warning">Advertencia</button>
        <button class="btn-options btn-info">Información</button>
        <button class="btn-options btn-black">Negro</button>
    </div>


    @include('seller.components.modal')

    @push('scripts')
        <script src="{{ asset('js/seller/myseller.js') }}"></script>
    @endpush
@endsection
