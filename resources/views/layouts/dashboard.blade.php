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
    <link rel="stylesheet" href="css/bts.css">
    <link rel="stylesheet" href="css/echamelamano.css">
    <link rel="stylesheet" href="css/Toast.min.css">

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
                    <li class="nav-item d-flex align-items-center nav-bg">
                        <i class="fas fa-home mr-2"></i>
                        <a class="p-3 xds" href="">Inicio</a>
                    </li>
                    <li class="nav-item d-flex align-items-center nav-bg">
                        <i class="fas fa-user mr-2"></i>
                        <a class="p-3 xds" href="perfil">Perfil</a>
                    </li>
                    <li class="nav-item d-flex align-items-center nav-bg">
                        <i class="fas fa-home mr-2"></i>
                        <a class="p-3 xds" href="#">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="app" style="   margin-top: 60px; ">
        <main class="container-fluid">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="js/Toast.min.js"></script>
    <script src="js/vue.js"></script>
    @stack('scripts')
</body>

</html>
