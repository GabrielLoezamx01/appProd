@extends('layouts.dashboard')
@section('title', 'Mis Publicaciones')
@section('content')
    <div class=" mt-5 row d-flex justify-content-center align-items-center "
        style="min-height: 100vh; background-color: #D6DFE4;">
        <section class="row justify-content-center" style="background-color: #D6DFE4;">
            <div v-for='item in Data' class="col-md-12 mt-5">
                <div class="card-post">
                    <div class="card-header">

                    </div>
                    <div class="card-body text-start mt-5">
                        <p class="card-text text-info text-dark"> <i class="fas fa-info-circle fa-1x"
                                style="color: #8FC82D;"></i>
                            @{{ item.contenido }}</p>
                        <div class="text-start mt-4">
                            <u class="list-inline">
                                <li class="list-inline-item rounded-5 mt-2 p-2"
                                    style="background-color: #8FC82D; font-weight: 700; color: #FFFFFF; height: 10%; font-size: 13px">
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
                                    <i class="fas fa-trash-alt fa-2x custom-icon"></i>
                                </button>
                            </div>
                            <div class="col text-center">
                                <button class="btn ">
                                    <i class="fas fa-edit fa-2x custom-icon"></i>
                                </button>
                            </div>

                            {{-- <div class="col text-center">
                                <i class="fas fa-star fa-2x custom-icon"></i>
                            </div>
                            <div class="col text-center">
                                <i class="fas fa-eye fa-2x custom-icon"></i>
                            </div> --}}
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
    </div>
    @push('scripts')
        <script src="js/profile/mypost.js"></script>
    @endpush
@endsection
