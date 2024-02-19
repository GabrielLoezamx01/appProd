@extends('layouts.dashboard')
@section('title', 'Mis Publicaciones')
@section('content')
    <div class="row d-flex justify-content-center align-items-center "
        style="min-height: 100vh; background-color: #D6DFE4;">
        <section class="row justify-content-center col-md-6" style="background-color: #D6DFE4;">
            @{{Data}}
        </section>

    </div>
    @push('scripts')
        <script src="{{ asset('js/profile/comments.js') }}"></script>
    @endpush

@endsection
