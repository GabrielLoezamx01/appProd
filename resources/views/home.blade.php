@extends('layouts.dashboard')
@section('title', 'Bienvenido')
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
    <div class="p-4"></div>
    <div class="row d-flex align-items-center justify-content-center" style="background-color: #019C04;">
        <div class="p-4 col-md-7 mt-5">
            <div class="search-container">
                <i class="fas fa-search icon-search"></i>
                <input type="search" placeholder="Buscar" class="form-search" />
            </div>
        </div>
    </div>
    @include('home.modalPost')
    <section class="row text-center bg-white p-3">
        <div class="col d-flex align-items-center justify-content-center border-hide">
            <button class="text-color2 btn">Publicaciones</button>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <button class="text-color2 btn">Multimedia</button>
        </div>
    </section>
    <section class="row justify-content-center" style="background-color: #D6DFE4;">
        <div v-for='(item, index) in items' :key="index" class="col-md-12 mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 align-self-center">
                    <div class="card-post">
                        <div class="card-header m-4">
                            <div class="d-md-flex align-items-center">
                                <div class="me-md-3 mb-3 mb-md-0">
                                    <img src="img/icon.jpg" class="img-fluid rounded-circle" :alt="item.sucursal.nombre"
                                        v-if="item.sucursal.imagen_url == null" style="width: 100px; max-width: 100px;">
                                </div>
                                <div class="me-md-8 mb-3 mb-md-0">
                                    <h2 class="fw-bold text-start text-nombre">@{{ item.sucursal.nombre }}</h2>
                                    <address class="text-start fw-light opacity-50" itemprop="address" itemscope
                                        itemtype="http://schema.org/PostalAddress" style="font-size: 14px;">
                                        <span class="fas fa-map-marker-alt fa-1x" style="color: #8FC82D;"></span>
                                        <span itemprop="streetAddress">@{{ item.sucursal.direccion }}</span>
                                        <span itemprop="addressLocality">,@{{ item.sucursal.ciudad }}</span>
                                        <span itemprop="addressRegion">, @{{ item.sucursal.estado }}</span>
                                        <span itemprop="postalCode">, @{{ item.sucursal.codigo_postal }}</span>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-start">
                            <p v-html="item.contenido" class="card-text text-info text-dark text-justify m-4" style="font-size: 15px;">
                            </p>

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

                            <div class="row justify-content-start align-items-start images-container">
                                <div v-for="img in item.images" class="col-md-4 mb-5 text-center">
                                    <img :src="'storage/publicaciones/sucursales/' + img.ruta" class="img-fluid"  @click="mostrarImagenExpandida(img)">
                                </div>
                            </div>

                            {{-- <i class="fas fa-info-circle fa-1x" style="color: #8FC82D;"></i> --}}
                            <div class="text-start mt-2 m-4">
                                <u class="list-inline">
                                    <li class="list-inline-item rounded-5 mt-2 p-2"
                                        style="background-color: #8FC82D; font-weight: 700; color: #FFFFFF; height: 10%; font-size: 10px"
                                        v-for="(ticket, index) in item.tickes" v-if="showAll || index < 5">
                                        <i class="fas fa-tag " style="color: white; "></i> @{{ ticket.etiqueta.nombre }}
                                    </li>
                                </u>
                                <button v-if="item.tickes.length > 5 && !showAll" style="cursor: pointer; color: #8FC82D;"
                                    @click="showAllTags(item)" class="btn"> Ver más ..... </button>
                                <hr class="custom-icon">
                            </div>
                        </div>
                        <div class="card-footer text-muted m-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button @click="toggleLike(item , index)" class="btn">
                                        <i  class="fas fa-heart custom-icon"></i>
                                        <span class="badge badge-primary text-dark">
                                          @{{ item.likes.length }}
                                        </span>
                                    </button>

                                </div>
                                <div class="col text-center">
                                    <button class="btn" @click="shared(item.id)">
                                        <i class="fas fa-star  custom-icon"></i>
                                    </button>
                                </div>
                                <div class="col text-center">
                                    <a :href="'seller/comments/' + item.id">
                                        <button class="btn">
                                            <i class="fas fa-eye  custom-icon"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5"></div>
                    </div>
                </div>
              </div>
        </div>
    <div class="p-5"></div>

    </section>
    @if (Auth::user()->role_id == 1)
        <button @click="abrirModal()" class="btn btn-floating circular-btn"
            style="position: fixed; bottom: 20px; right: 20px; background-color: #8FC82D;">
            <i class="fas fa-plus fa-2x text-white"></i>
        </button>
    @endif


    @push('scripts')
        <script src="js/post/index.js"></script>
    @endpush
@endsection
