@extends('layouts.dashboard')
@section('title', 'Mis Sucursales')
@section('content')

    <section class="row d-flex justify-content-center align-items-center  "
        style="min-height: 100vh; background-color: #D6DFE4;">
        <input type="hidden" data-seller-id="{{ $id }}">
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center m-3">
                        <img src="{{ asset('img/icon.jpg') }}" class="img-fluid rounded-circle"
                            style="width: 20px; height: 20px;">
                        <h1 class="modal-title fs-5 fw-bold " style="margin-left: 20px;" id="staticBackdropLabel">
                            @{{ modalTitle }}
                        </h1>
                        <button type="button" class="btn-close fw-bold" style="color: #062D00" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('seller.components.redes')
                        @include('seller.components.clock')
                        @include('seller.components.data')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-md-flex align-items-cente card">
                <div class="card-body">
                    <div class="row">
                        <div class="m-3">
                            <h1 class="fw-bold fs-1">@{{ sellerName }}</h1>
                            <span class="fs-6 opacity-25 ">Opciones de la sucursal disponible</span>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-options hvr-bounce-out" data-bs-toggle="modal" data-bs-target="#myModal"
                                @click="redesview()">
                                <i class="fas fa-share"></i> Redes Sociales
                            </button>
                            <button class="btn btn-options m-1 hvr-bounce-out" data-bs-toggle="modal"
                                data-bs-target="#myModal" @click="horariosview()">
                                <i class="far fa-clock"></i> Horarios
                            </button>
                            <button class="btn btn-options m-1 hvr-bounce-out" data-bs-toggle="modal"
                                data-bs-target="#myModal" @click="info()">
                                <i class="fas fa-info-circle"></i> Información
                            </button>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <h2 class="fs-6 opacity-50 m-3">
                            Opciones Premium <i class="fas fa-gem text-warning"></i>
                        </h2>
                        <button class="btn btn-warning btn-sm m-1 hvr-bounce-out "
                            style=" border-radius: 80px;
    font-size: 12px;
    padding: 10px;">
                            <i class="fas fa-store"></i> Crear Sub-Sucursal
                        </button>

                        <button class="btn btn-warning btn-sm m-1 hvr-bounce-out "
                            style=" border-radius: 80px;
    font-size: 12px;
    padding: 10px;">
                            <i class="fas fa-ad"></i> Crear Publicidad
                        </button>

                    </div>
                </div>
            </div>
        </div>

    </section>
    @push('scripts')
        <script src="{{ asset('js/seller/show.js') }}"></script>
    @endpush
@endsection
