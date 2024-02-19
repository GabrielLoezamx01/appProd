@extends('layouts.dashboard')
@section('title', 'Mis Publicaciones')
@section('content')
    <div class="row d-flex justify-content-center align-items-center "
        style="min-height: 100vh; background-color: #D6DFE4;">
        <section class="row justify-content-center col-md-6" style="background-color: #D6DFE4;">
            <div v-for='item in Data' class="col-md-12 mt-5">
                <div class="card-post">
                    <div class="card-header">

                    </div>
                    <div class="card-body text-start mt-5">
                        <p class="card-text text-info text-dark m-4" style="font-size: 15px;"> <i class="fas fa-info-circle fa-1x"
                                style="color: #8FC82D;"></i>
                            @{{ item.contenido }}</p>
                            <div class="text-start mt-2 m-4">
                            <u class="list-inline">
                                <li class="list-inline-item rounded-5 mt-2 p-2"
                                    style="background-color: #8FC82D; font-weight: 700; color: #FFFFFF; height: 10%; font-size: 10px">
                                    <i class="fas fa-tag " style="color: white; "></i> @{{ item.categoria.name }}
                                </li>
                            </u>

                            <hr class="custom-icon">
                        </div>
                    </div>
                    <div class="card-footer text-muted ">
                        <div class="row">
                            <div class="col text-center">
                                <button class="btn" @click="deletePost(item.id)">
                                    <i class="fas fa-trash-alt custom-icon text-danger"></i>
                                </button>
                            </div>
                            <div class="col text-center">
                                <button class="btn" @click="comments(item.id)">
                                <i class="fas fa-comments custom-icon"></i>
                                </button>
                            </div>
                            <div class="col text-center">
                                <button class="btn" data-bs-toggle="modal" href="#exampleModalToggle" @click="showData(item.id)" >
                                    <i class="fas fa-edit text-info custom-icon"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5"></div>
                </div>
            </div>
            <div class="container mt-3">
                <nav v-if="pagination.last_page > 1" aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item" v-if="pagination.current_page > 1">
                            <a class="page-link custom-page-link" @click="getData(pagination.current_page - 1)"
                                href="#" aria-label="Anterior">
                                <span aria-hidden="true">&laquo; Anterior</span>
                            </a>
                        </li>
                        <li v-for="page in pagination.last_page" :key="page"
                            :class="{ 'page-item': true, 'active': page === pagination.current_page }">
                            <a class="page-link custom-page-link" @click="getData(page)"
                                href="#">@{{ page }}</a>
                        </li>
                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                            <a class="page-link custom-page-link" @click="getData(pagination.current_page + 1)"
                                href="#" aria-label="Siguiente">
                                <span aria-hidden="true">Siguiente &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center m-3">
                        <img src="img/icon.jpg" class="img-fluid rounded-circle" style="width: 20px; height: 20px;">
                        <h1 class="modal-title fs-5 fw-bold " style="margin-left: 20px;" id="staticBackdropLabel">Editar
                        </h1>
                        <button type="button" class="btn-close fw-bold" style="color: #062D00" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-3">
                        <label for="InputSelect" class="text-login fs-6">Seleccione categoria</label>
                        <div class="custom-select">

                            <select v-model="selectedCategory" class="btn-app fw-light">
                                <option :disabled="true" :value="null"> Categorias </option>
                                <option v-for="category in categories" style="opacity: 0.6;" :key="category.id"
                                    :value="category.id">
                                    @{{ category.name }}
                                </option>
                            </select>
                            <div class="icon" style="opacity: 0.6;"><i class="fas fa-chevron-down" style="opacity: 0.6;"></i>
                            </div>
                        </div>
                        <textarea v-model="content" maxlength="300" class="mt-3 post-content fw-light text-justify"
                            placeholder="¿Que hay de nuevo?" rows="10"></textarea>
                    </div>
                    <div class="modal-footer text-center">
                        <button @click="updateData()" type="button" class="btn-login">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="js/profile/mypost.js"></script>
    @endpush
@endsection
