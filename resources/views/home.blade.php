@extends('layouts.dashboard')
@section('title', 'Bienvenido')
@section('content')
    <div class="row">
        <div class="p-4">
            <div class="search-container">
                <i class="fas fa-search icon-search"></i>
                <input type="search" placeholder="Buscar" class="form-search" />
            </div>
        </div>
    </div>
    <section class="row text-center bg-white p-3">
        <div class="col d-flex align-items-center justify-content-center" style="border-right: 2px solid #96CCAA;">
            <button class="text-color2 btn">Publicaciones</button>
        </div>
        <div class="col d-flex justify-content-center align-items-center">
            <button class="text-color2 btn">Multimedia</button>
        </div>
    </section>




@endsection
