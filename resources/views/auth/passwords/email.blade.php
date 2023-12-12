@extends('layouts.app')
@section('title', 'Echame La Mano - Recuperar Cuenta')
@section('content')
    <div class="row d-flex justify-content-center align-items-center " style="min-height: 100vh;">


        <div class="col p-3 bg-img">
            <img src="{{ asset('img/Frame -login.jpg') }}" class="img-fluid text-center">
            <div class="bg-app p-5">
                <div class="text-right">
                    <h1 class="title-login">Recuperar Cuenta</h1>
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="bg-light">{{ $error }}</p>
                    @endforeach
                @endif
                </div>
                <form method="POST" action="{{ route('SendEmail') }}" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="fw-light">@lang('login.input-email')</label>
                        <input type="email" class="borderless-input mt-3  @error('email') is-invalid @enderror"
                            placeholder="@lang('login.input-email-placeholder')" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 mt-5">
                        <div class="mt-5 text-center">
                            <button type="submit" class=" btn-login btn-large ">
                                Recuperar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
