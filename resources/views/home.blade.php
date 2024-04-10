@extends('layouts.dashboard')
@section('title', 'Bienvenido')


@push('styles')
    <style>
        .post-card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .post-header {
            margin-bottom: 10px;
        }

        .post-title {
            font-size: 24px;
            margin: 0;
        }

        .post-date {
            font-size: 14px;
            color: #666666;
            margin: 0;
        }

        .post-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .like-comment-share {
            display: flex;
            align-items: center;
        }

        .like-comment-share i {
            margin-right: 10px;
            font-size: 18px;
            color: #333333;
        }

        .like-count,
        .comment-count {
            font-size: 16px;
            margin-right: 10px;
        }

        .sucursal-info {
            display: flex;
            align-items: center;
        }

        .logo-facebook {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* New styles for responsive alignment */
        .sucursal-info img {
            max-width: 100px;
            height: auto;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .sucursal-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .sucursal-info img {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
    <style>
        .desing-btn {
            background-color: #ffffff;
            width: 100%;
            padding: 10px;
            border-radius: 25px;
            border: 1px solid #8FC82D;
            margin-top: 20px;
            margin-bottom: 20px;
            color: #e6e6e6;
        }

        .desing-btn:focus {
            outline: none;
        }

        .icon-color {
            color: #e6e6e6;

            font-size: 20px;
        }

        .input-container {
            position: relative;
        }

        .input-container input {
            padding-left: 30px;
            text-indent: 1rem;
        }

        .input-container i {
            position: absolute;
            left: 2rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .cover-image {
            width: 100%;
            height: 300px;
            background-image: url('{{ asset('img/demo.jpg') }}');
            background-size: cover;
            background-position: center;
            transition: opacity 0.3s ease;
        }

        a {
            text-decoration: none;
        }

        .btn-category {
            background: transparent;
            color: #ffffff;
            height: 5rem;
            border: none;
            padding: 2rem;
            font-size: 22px;
        }

        .img-carusel {
            background-size: 100% 100%;
            border-radius: 25px;
            width: 90rem;
            height: 300px;
            overflow: hidden;
        }

        h4 {
            color: #062D00;
            font-weight: 700;
        }

        .cr-img {
            width: 100%;
            height: 150px;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cr-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Estilos para los resultados */
        .lista-resultados {
            list-style-type: none;
            padding: 0;
        }

        .resultado-enlace {
            display: block;
            text-decoration: none;
            color: #333;
            /* Color del texto */
            margin-bottom: 5px;
            /* Espacio entre resultados */
        }

        .resultado-enlace:hover {
            background-color: #f0f0f0;
            /* Cambio de color al pasar el mouse */
        }

        .nombre {
            font-weight: bold;
            /* Hacer el nombre en negrita */
        }

        .codigo-postal {
            color: #888;
            /* Color del código postal */
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="p-3"></div>
        <div class="row m-3" id="app">
            <div class="input-container">
                <i class="fa fa-map-marker icon-color" aria-hidden="true"></i>
                <input type="search" class="desing-btn" placeholder="Encontrar negocios cerca de ti" @input="buscar">
            </div>
            <ul v-if="mostrarResultados == true" class="lista-resultados">
                <li v-for="resultado in resultadosvue" :key="resultado.id" class="ms-5 p-2">
                    <a :href="'view/branch/' + resultado.id" class="fw-bold " style="color: #FFFFFF">
                        @{{ resultado.nombre }} @{{ resultado.codigo_postal }}
                    </a>
                </li>
            </ul>

        </div>


        <div class="row">
            <div class="cover-image"></div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item" v-for="(categorie, index) in categories.slice(0, 5)" :key="index"
                        :class="{ 'active': index === 0 }">
                        <div class="row">
                            <div class="col text-center">
                                <button @click="showCategorie(categorie.id)"
                                    class="btn btn-category">@{{ categorie.name }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>

            </div>
        </div>
    </div>


    <div class="bg-white">
        <div class="p-5"></div>
        <div class="owl-carousel owl-theme">
            <div class="item cr-img">
                <img src="img/demo.jpg" alt="">
            </div>
            <div class="item cr-img">
                <img src="img/c.jpg" alt="">
            </div>
            <div class="item cr-img">
                <img src="img/1.jpg" alt="">
            </div>
        </div>
        <div class="p-5"></div>
    </div>
    <div class="container-fluid">
        <div class="row" style="background-color: #D6DFE3;">
            <h4 class="mt-5 text-center">
                <i class="fas fa-utensils me-2"></i>
                <span class="ms-6">Recomendaciones de Restaurantes</span>
            </h4>
        </div>
    </div>
    <div class="bg-white">
        <div class="p-5"></div>
        <div class="owl-carousel owl-theme">
            <div v-for="item in items">
                <div class="card text-justify item">
                    <div class="card-body">
                        <h2 class="fw-bold">@{{ item.sucursal.nombre }}</h2>
                        <p class="card-text text-info text-dark" style="font-size: 15px;" v-html="Hashtags(item.contenido)">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="row text-center" style="background-color: #D6DFE3">
        <div class="p-5 text-center">

        </div>

    </div> --}}



    @push('scripts')
        <script src="{{ asset('js/home/setting.js') }}"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                stagePadding: 80,
                loop: true,
                margin: 20,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        </script>
    @endpush
@endsection
