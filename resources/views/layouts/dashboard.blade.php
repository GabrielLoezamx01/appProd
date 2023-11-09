<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/bts.css">
    <link rel="stylesheet" href="css/echamelamano.css">

    <style>
        .navbar {
            background-color: #FFFFFF;
        }

        .navbar-toggler {
            order: -1;
            /* Mover el botón del menú a la izquierda en dispositivos móviles */
        }

        .navbar-brand {
            order: 1;
            /* Mover el logotipo a la derecha en dispositivos móviles */
        }

        .navbar-nav {
            margin: 0 auto;
            /* Centrar los elementos de la lista en dispositivos móviles */
        }

        .navbar-nav .nav-item {
            text-align: center;
            /* Centrar el contenido de las listas */
        }

        .navbar-nav .nav-link {
            color: #062D00;
            padding: 10px 20px;
            /* Ajusta el espaciado de los elementos de la lista */
        }

        .navbar-nav .nav-link i {
            margin-right: 10px;
            /* Separar el ícono del contenido */
        }

        .navbar-nav .nav-link:hover {
            background-color: #062D00;
            color: #FFFFFF;
        }

        .nav-bg:hover {
            background-color: #062D00;
            color: #FFFFFF;
        }

        .xds{
            text-decoration: none;
            color: inherit;/
        }

        .nav-link:hover {
            color: #8FC82D;
            /* Cambiar el color al que desees */
        }

        .menu-icon {
            color: #019C04;
            /* Cambia el color al que desees */
            text-align: center;
            /* Alinea el icono al centro */
            font-size: 24px;
            /* Cambia el tamaño de fuente si es necesario */
        }

        .nav-item {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
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
                        <a class="p-3 xds" href="#">Inicio</a>
                    </li>
                    <li class="nav-item d-flex align-items-center nav-bg">
                        <i class="fas fa-home mr-2"></i>
                        <a class="p-3 xds" href="#">Inicio</a>
                    </li>
                    <li class="nav-item d-flex align-items-center nav-bg">
                        <i class="fas fa-home mr-2"></i>
                        <a class="p-3 xds" href="#">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="app">
        <main class="container">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>
