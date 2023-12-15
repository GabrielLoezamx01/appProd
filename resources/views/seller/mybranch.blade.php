@extends('layouts.dashboard')
@section('title', 'Mis Sucursales')
@section('content')
<div class=" mt-5 row d-flex justify-content-center align-items-center "
style="min-height: 100vh; background-color: #D6DFE4;">
    <div class="d-md-flex align-items-cente card" >
        <div class="card-body">
            <div class="card-body">
                <h1 class="text-center  fw-bold mt-5" v-if="Data.message">
                    @{{Data.message}}
                </h1>
             <button class="btn btn-login mt-5" data-bs-toggle="modal" data-bs-target="#myModal"> Crear Sucursal</button>
            </div>
        </div>
    </div>
</section>
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center m-3">
            <img src="{{asset('img/icon.jpg')}}" class="img-fluid rounded-circle" style="width: 20px; height: 20px;">
            <h1 class="modal-title fs-5 fw-bold " style="margin-left: 20px;" id="staticBackdropLabel"> Crear Sucursal
            </h1>
            <button type="button" class="btn-close fw-bold" style="color: #062D00" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <!-- Pestañas -->
          <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="section1-tab" data-bs-toggle="tab" href="#section1" role="tab" aria-controls="section1" aria-selected="true">Datos</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="section2-tab" data-bs-toggle="tab" href="#section2" role="tab" aria-controls="section2" aria-selected="false">Dirección</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="section3-tab" data-bs-toggle="tab" href="#section3" role="tab" aria-controls="section2" aria-selected="false">Redes Sociales</a>
              </li>
          </ul>

          <!-- Contenido de las Pestañas -->
          <div class="tab-content">
            <div class="tab-pane fade show active mt-4 p-3" id="section1" role="tabpanel" aria-labelledby="section1-tab">
                <div class="mb-3">
                    <label for="name" class="fw-light">Nombre de la sucursal</label>
                    <input v-model="name" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="info" class="fw-light">Acerca de</label>
                    <input v-model="info" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-login" @click="nextSection(2)">Siguiente</button>
                </div>
            </div>
            <div class="tab-pane fade  mt-4 p-3" id="section2" role="tabpanel" aria-labelledby="section2-tab">
                <div class="mb-3">
                    <label for="postal" class="fw-light">Código Postal</label>
                    <input v-model="postal" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="Dirreción" class="fw-light">Dirreción</label>
                    <input v-model="Dirrecion" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="Estado" class="fw-light">Estado</label>
                    <input v-model="estado" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="Ciudad" class="fw-light">Ciudad</label>
                    <input v-model="ciudad" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-login" @click="nextSection(3)">Siguiente</button>
                </div>
            </div>
               <div class="tab-pane fade mt-4 p-3" id="section3" role="tabpanel" aria-labelledby="section3-tab">
                <div class="mb-3">
                    <label for="Facebook" class="fw-light">Facebook</label>
                    <input v-model="Facebook" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="Tiktok" class="fw-light">Tiktok</label>
                    <input v-model="Tiktok" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="Instagram" class="fw-light">Instagram</label>
                    <input v-model="Instagram" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="X" class="fw-light">X (twitter) </label>
                    <input v-model="X" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="Whatsapp" class="fw-light">Whatsapp</label>
                    <input v-model="Whatsapp" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <label for="Correo" class="fw-light">Correo</label>
                    <input v-model="Correo" type="text" class="borderless-input mt-3" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-login" onclick="nextSection()">Guardar</button>
                </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
@push('scripts')
       <script src="{{ asset('js/seller/myseller.js') }}"></script>
@endpush
@endsection
