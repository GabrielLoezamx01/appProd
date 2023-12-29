@extends('layouts.dashboard')
@section('title', 'Mis Sucursales')
@section('content')
    <div class=" mt-5 row d-flex justify-content-center align-items-center  "
        style="min-height: 100vh; background-color: #D6DFE4;">
        <div v-if="this.Data > 0">
            @{{ this.Data }}
        </div>
        <div class="col-md-5 m-5">
            <div class="d-md-flex align-items-cente card">
                <div class="card-body" v-if="Data[0]">
                    <div class="p-3">
                        <div class="search-container shadow-2 " style="background-color: #F3F3F7">
                            <i class="fas fa-search icon-search"></i>
                            <input type="search" placeholder="Buscar" class="form-search"
                                style="background-color: #F3F3F7" />
                        </div>
                        <button class="btn btn-options mt-3" data-bs-toggle="modal" data-bs-target="#myModal" @click="crearsucursal()"> Crear
                            Sucursal</button>
                        <button class="btn btn-options mt-3" data-bs-toggle="modal" data-bs-target="#myModal"
                            @click="newPost()"> Nueva
                            Publicacion</button>
                    </div>
                    <div class="p-3">
                        <h1 class="fw-bold  fs-1">Sucursales<span class="fs-6 opacity-25 ">
                                @{{ Data.length }} Resultados
                            </span></h1>
                    </div>

                    <div v-for="item in Data" class="mt-2 p-3" style="background-color: #f3f3f744;">
                        <div class="row">
                            <div class="col-md-4">
                                {{-- <img src="img/icon.jpg" class="img-fluid rounded-circle" :alt="item.sucursal.nombre"
                                v-if="item.sucursal.imagen_url == null" style="width: 100px; max-width: 100px;"> --}}
                                <img src="{{ asset('img/icon.jpg') }}" class="img-fluid"
                                    v-if="imagen_url == null">
                                <img :src="'img/sucursales/' + item.imagen_url"
                                    class="img-fluid" v-else>

                            </div>
                            <div class="col-md-8">
                                <button class="btn btn-options mt-3 btn-black" data-bs-toggle="modal"
                                    data-bs-target="#myModal">
                                    <i class="fas fa-edit"></i> Información
                                </button>
                                <button class="btn btn-options mt-3 btn-black" data-bs-toggle="modal"
                                    data-bs-target="#myModal">
                                    <i class="fas fa-camera"></i> Fotos
                                </button>
                                <button class="btn btn-options mt-3 btn-black" data-bs-toggle="modal"
                                    data-bs-target="#myModal">
                                    <i class="fas fa-clock"></i> Horarios
                                </button>
                                <button class="btn btn-options mt-3 btn-black" data-bs-toggle="modal"
                                    data-bs-target="#myModal">
                                    <i class="fas fa-map-marker"></i> Dirección
                                </button>
                                <h2 class="fs-2 mt-3 fw-bold">
                                    @{{ item.nombre }}
                                </h2>
                                <p class="fw-light ">
                                    @{{ item.acerca_de_nosotros }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-if="Data.message">
                        <h1 class="text-center  fw-bold mt-5" v-if="Data.message">
                            @{{ Data.message }}
                        </h1>
                        <button class="btn btn-login mt-5" data-bs-toggle="modal" data-bs-target="#myModal"> Crear
                            Sucursal</button>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="fade show  p-3" v-if="section1 == true">
                            <div class="mb-3">
                                <label for="name" class="fw-light">Nombre de la sucursal</label>
                                <input v-model="name" type="text" class="borderless-input mt-3" required>
                            </div>
                            <div class="mb-3">
                                <label for="info" class="fw-light">Acerca de</label>
                                <input v-model="info" type="text" class="borderless-input mt-3" required>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-login" @click="nextSection()">Siguiente</button>
                            </div>
                        </div>
                        <div class="fade show p-3" v-if="section2 == true">
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
                        <div class="fade show p-3" v-if="section3 == true">
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
                                <input v-model="Whatsapp" type="number" class="borderless-input mt-3" required>
                            </div>
                            <div class="mb-3">
                                <label for="Correo" class="fw-light">Correo</label>
                                <input v-model="Correo" type="email" class="borderless-input mt-3" required>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-login" @click="saveSeller()" data-bs-dismiss="modal"
                                    aria-label="Close">Guardar</button>
                            </div>
                        </div>
                        <div v-if="sectionPost == true" class="fade show p-3">
                            <div class="mb-3">
                                <label for="selectSucursal">Sucursal</label>
                                <select v-model="selectSucursal" class="mt-2">
                                    <option :value="item.id" v-for="item in Data">@{{ item.nombre }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea v-model="content" maxlength="300" class="mt-3 post-content fw-light text-justify"
                                placeholder="¿Que hay de nuevo?" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-options" title="Añadir Imágenes" @click="openFileExplorer">
                                    <i class="fas fa-image"></i>
                                  </button>
                                  <input type="file" ref="fileInput" style="display: none" @change="handleFileChange" accept="image/*" multiple>
                            </div>
                            <div class="mb-3">
                                <button @click="crearPublicacion()" data-bs-dismiss="modal" aria-label="Close" type="button" class="btn-login">Publicar</button>
                            </div>
                        </div>
                        {{-- <div class="modal-footer text-center">
                        <button @click="PostPublication()" data-bs-dismiss="modal"
                        aria-label="Close" type="button" class="btn-login">Publicar</button>
                    </div> --}}

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
