@extends('layouts.dashboard')
@section('title', 'Bienvenido')
@section('content')
    <div class="row d-flex align-items-center justify-content-center" style="background-color: #019C04;">
        <div class="p-4 col-md-7" >
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
        <div v-for='item in items' class="col-md-12 mt-5">
            <div class="card-post">
                <div class="card-header m-4">
                    <div class="d-md-flex align-items-center">
                        <div class="me-md-3 mb-3 mb-md-0">
                            <img src="img/icon.jpg" class="img-fluid rounded-circle" :alt="item.sucursal.nombre"
                                v-if="item.sucursal.imagen_url == null" style="width: 100px; max-width: 100px;">
                        </div>
                        <div class="me-md-8 mb-3 mb-md-0">
                            <h2 class="fw-bold text-start text-nombre">@{{ item.sucursal.nombre }}</h2>
                            <address class="text-start fw-light" itemprop="address" itemscope
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
                    <p class="card-text text-info text-dark text-justify m-4" style="font-size: 15px;"> <i class="fas fa-info-circle fa-1x"
                            style="color: #8FC82D;"></i>
                        @{{ item.contenido }}</p>
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
                            <button @click="toggleLike(item)" class="btn">
                                <i v-if="isUserLiked(item)" class="fas fa-heart" style="color: red;"></i>
                                <i v-else class="fas fa-heart custom-icon"></i>
                            </button>
                            <span class="badge badge-primary text-dark">@{{ item.likes.length }}</span>
                        </div>
                        <div class="col text-center">
                            <button class="btn">
                              <i class="fas fa-star  custom-icon"></i>
                            </button>
                            <span class="badge badge-primary text-dark"></span>

                        </div>
                        <div class="col text-center">
                            <button class="btn">
                                <i class="fas fa-eye  custom-icon"></i>

                            </button>
                            <span class="badge badge-primary text-dark"></span>
                        </div>
                    </div>
                </div>
                <div class="mt-5"></div>
            </div>
        </div>
    </section>
    <button @click="abrirModal()" class="btn btn-floating circular-btn"
        style="position: fixed; bottom: 20px; right: 20px; background-color: #8FC82D;">
        <i class="fas fa-plus fa-2x text-white"></i>
    </button>

    @push('scripts')
        <script src="js/post/index.js"></script>
    @endpush
@endsection
