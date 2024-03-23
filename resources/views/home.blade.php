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
    </style>
@endpush
@section('content')
    <div class="row m-3">
        <div class="input-container">
            <i class="fa fa-map-marker icon-color" aria-hidden="true"></i>
            <input type="search" class="desing-btn" placeholder="Encontrar negocios cerca de ti">
        </div>
    </div>
    <div class="row bg-primary">
        <div class="cover-image"></div>
    </div>
    <div class="row mt-5 align-items-center justify-content-center">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item" v-for="(categorie, index) in categories.slice(0, 5)" :key="index" :class="{ 'active': index === 0 }">
            <div class="row">
                <div class="col text-center">
                    <button @click="showCategorie(categorie.id)" class="btn btn-category">@{{ categorie.name }}</button>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    </div>
    <div class="row bg-white mt-5">
        <div class="col mt-5">
            <img src="img/c.jpg" class="img-carusel img-fluid " alt="">
        </div>
        <div class="col mt-5">
            <img src="img/c.jpg" class="img-carusel img-fluid " alt="">
        </div>
        <div class="col mt-5">
            <img src="img/c.jpg" class="img-carusel img-fluid " alt="">
        </div>
        <div class="p-5 text-center">
            <i class="fas fa-circle m-2"></i>
            <i class="fas fa-circle m-2"></i>
            <i class="fas fa-circle m-2"></i>
        </div>
    </div>
    <div class="row text-center" style="background-color: #D6DFE3">
        <div class="p-5 text-center">
            <h4>
                <i class="fas fa-utensils me-2"></i>
                <span class="ms-4">Recomendaciones de Restaurantes</span>
            </h4>
        </div>

    </div>



    @push('scripts')
        <script src="js/home/setting.js"></script>
    @endpush
@endsection
