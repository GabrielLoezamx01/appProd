<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="description" content="Iniciar sesión en Mi Sitio Web - Accede a tu cuenta de forma segura y rápida.">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="iniciar sesión, acceso, cuenta, seguridad, echamelamano, Echame La Mano">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/bts.css">
    <link rel="stylesheet" href="css/echamelamano.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        <main class="container">
            @yield('content')
        </main>
    </div>
    <script>
        const passwordInput = document.getElementById('password-field');
        const showPasswordButton = document.getElementById('showPassword');
        const eyeIcon = document.getElementById('eyeIcon');

        showPasswordButton.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('far', 'fa-eye');
                eyeIcon.classList.add('far', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('far', 'fa-eye-slash');
                eyeIcon.classList.add('far', 'fa-eye');
            }
        });
        const passwordInput2 = document.getElementById('password-field2');
        const showPasswordButton2 = document.getElementById('showPassword2');
        const eyeIcon2 = document.getElementById('eyeIcon2');
        showPasswordButton2.addEventListener('click', () => {
            if (passwordInput2.type === 'password') {
                passwordInput2.type = 'text';
                eyeIcon2.classList.remove('far', 'fa-eye');
                eyeIcon2.classList.add('far', 'fa-eye-slash');
            } else {
                passwordInput2.type = 'password';
                eyeIcon2.classList.remove('far', 'fa-eye-slash');
                eyeIcon2.classList.add('far', 'fa-eye');
            }
        });
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

</body>

</html>
