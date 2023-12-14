@extends('layouts.dashboard')
@section('title', 'Perfil')
@section('content')
    <div class=" mt-5 row d-flex justify-content-center align-items-center " style="min-height: 100vh; background-color: #D6DFE4;">
        <div class="col p-3 bg-img mt-5 ">
            <div class="bg-app p-5">
                <div class="text-right">
                    <p class="text-login fw-bold mt-3">Informacion Personal</p>
                </div>
                @if(session('success'))
                   <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                       <form method="POST" action="{{ route('profileIMG') }}" class="text-center" enctype="multipart/form-data">
                        @csrf
                        <div v-if="usuario.fotodeperfil == null" class="text-center">
                            <img src="img/icon.jpg" class="img-fluid rounded-circle" style="width: 100px; max-width: 100px;">
                        </div>
                        <div v-else class="text-center">
                            <img :src="'storage/fotos_perfil/' + usuario.fotodeperfil" class="img-fluid rounded-circle" style="width: 100px; max-width: 100px;">
                        </div>
                        <div class="mb-3">
                            <input name="foto" type="file" accept="image/*" class="borderless-input mt-3" >
                            <button class="btn">
                                Actualizar foto de perfil
                            </button>
                        </div>
                   </form>
                <form @submit.prevent="enviarFormulario" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nombres" class="fw-light">Nombres</label>
                        <input v-model="usuario.nombres" type="text" class="borderless-input mt-3" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="fw-light">Apellidos</label>
                        <input v-model="usuario.apellidos" type="text" class="borderless-input mt-3" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="fw-light">Telefono</label>
                        <input v-model="usuario.telefono" type="number" class="borderless-input mt-3" required>
                    </div>
                    <div class="text-right">
                        <p class="text-login fw-bold mt-3">Dirección</p>
                    </div>
                    <div class="mb-3">
                        <label for="codigoPostal" class="fw-light">Codigo Postal</label>
                        <input v-model="usuario.codigopostal    " type="number" class="borderless-input mt-3" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="fw-light">Estado</label>
                        <input v-model="usuario.estado" type="text" class="borderless-input mt-3" required>
                    </div>
                    <div class="mb-3">
                        <label for="ciudad" class="fw-light">Ciudad</label>
                        <input v-model="usuario.ciudad" type="text" class="borderless-input mt-3" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="fw-light">Dirección</label>
                        <input v-model="usuario.direccion" type="text" class="borderless-input mt-3" required>
                    </div>
                    <div class="mb-3 mt-5">
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn-login btn-large">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="js/profile/index.js"></script>
    @endpush
@endsection
