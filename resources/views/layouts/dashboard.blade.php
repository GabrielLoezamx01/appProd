<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Auth::check())
        <meta name="user_id" content="{{ Auth::user()->id }}" />
    @endif
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/echamelamano.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Toast.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/awesome.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/hover-min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    @stack('styles')

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <button class="navbar-toggler border-0" style="color #8FC82D;" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                        <div class="m-2">
                            <i class="fas fa-home mr-2"></i>
                            <a class="p-3 xds" href="{{ url('home') }}">Inicio</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                        <div class="m-2">
                            <i class="fas fa-user mr-2"></i>
                            <a class="p-3 xds" href="{{ url('perfil') }}">Mi Información</a>
                        </div>
                    </li>

                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                            <div class="m-2">
                                <i class="fas fa-book mr-2"></i>
                                <a class="p-3 xds" href="{{ url('MisPublicaciones') }}">Mis Publicaciones</a>
                            </div>
                        </li>
                        <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                            <div class="m-2">
                                <i class="fas fa-share-alt mr-2"></i><!-- Cambiado de "fa-shared" a "fa-share-alt" -->
                                <a class="p-3 xds" href="{{ url('PublicacionesCompartidas') }}"> Mis Compartidos</a>
                            </div>

                        </li>
                    @endif
                    @if (Auth::user()->role_id == 2)
                        <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                            <div class="m-2">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <a class="p-3 xds" href="{{ url('seller/Myseller') }}">Mis Sucursales</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="dropdown ms-auto p-3">
                <a class="navbar-brand fw-bold dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name ?? 'Actualizar Información' }}
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item nav-bg" href="#">Ajustes</a></li>
                    <li><a class="dropdown-item nav-bg" href="{{ url('closeUser') }}">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="app" style="margin-top: 4rem;">
        <main class="mt-5">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/axios_cached.js') }}"></script>
    <script src="{{ asset('js/Toast.min.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
