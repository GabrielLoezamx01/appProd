@extends('layouts.dashboard')
@section('title', 'Perfil')
@section('content')
    <div class="row d-flex justify-content-center align-items-center " style="min-height: 100vh; background-color: #D6DFE4;">
        <div class="col p-3 bg-img ">
            <div class="bg-app p-5">
                <div class="text-right">
                    <p class="text-login fw-bold mt-3">Informacion Personal</p>
                </div>
                <form @submit.prevent="enviarFormulario" class="mt-3">
                    @csrf
                        {{-- <div class="mb-3">
                            <label for="nombreUsuario" class="fw-light">Nombre de usuario</label>
                            <input v-model="usuario.nombreUsuario" type="text" class="borderless-input mt-3" placeholder="@lang('login.input-email-placeholder')" required>
                        </div> --}}
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
                    <div class="mb-3">
                        <label for="fotoPerfil" class="fw-light">Foto de Perfil</label>
                        <input @change="cargarFotoPerfil" type="file" class="borderless-input mt-3" required>
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
