<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (Auth::check())
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="user_id" content="{{ Auth::user()->id }}" />
    @endif
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/echamelamano.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
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
    <x-nav-bar />
   <div id="app">
    <main class="custom-margin">
        @yield('content')
    </main>
</div>
    @if (Auth::check())
        <script src="{{ asset('js/axios_cached.js') }}"></script>
        <script src="{{ asset('js/Toast.min.js') }}"></script>
        <script src="{{ asset('js/vue.js') }}"></script>
        <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    @endif
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
