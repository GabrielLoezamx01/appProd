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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/echamelamano.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Toast.min.css') }}">
    <link href="{{ asset('css/hover-min.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
            <a class="navbar-brand" href="#">Mi Sitio</a>
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
                            <a class="p-3 xds"  href="{{ url('perfil') }}">Mi Información</a>
                        </div>
                    </li>
                    @if (Auth::user()->role_id == 1)
                    <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                        <div class="m-2">
                            <i class="fas fa-book mr-2"></i>
                            <a class="p-3 xds"  href="{{ url('MisPublicaciones') }}" >Mis Publicaciones</a>
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
                    <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                        <div class="m-2">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <a class="p-3 xds" href="{{ url('closeUser') }}">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="app" style="   margin-top: 6px; ">
        <main class="container-fluid">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="{{ asset('js/Toast.min.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>

    @stack('scripts')
</body>

</html>
