
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
                <form method="POST" action="{{ route('updatePassword') }}" class="mt-3">
                    @csrf
                    <input type="hidden" name="user_id"  value="{{ $user_id }}">
                    <div class="mb-3">
                        <label for="password" class="fw-light">Nueva Contraseña</label>
                        <div class="input-group">
                            <input type="password" id="password-field"
                                class="form-control mt-3 @error('password') is-invalid @enderror"  placeholder="@lang('register.input-password-placeholder')"
                                name="password" value="{{ old('password') }}" required autocomplete="current-password">
                            <button class="btn btn-outline-secondary" type="button" id="showPassword">
                                <i id="eyeIcon" class="far fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 mt-5">
                        <div class="mt-5 text-center">
                            <button type="submit" class=" btn-login btn-large ">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
