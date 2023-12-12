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
                <form method="POST" action="{{ route('Verify') }}" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="code" class="fw-light">Por favor, introduce el código.</label>
                        <input type="text" class="borderless-input mt-3"
                         name="code" value="{{ old('code') }}" required
                            autocomplete="CODE" autofocus>
                    </div>
                    <div class="mb-3 mt-5">
                        <div class="mt-5 text-center">
                            <button type="submit" class=" btn-login btn-large ">
                                Verificar
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 mt-5">
                            <a href="reset"  class="text-white xds">
                                <div class="mt-5 text-center btn-large btn-login">
                                    Reenviar  Código
                                </div>
                            </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
