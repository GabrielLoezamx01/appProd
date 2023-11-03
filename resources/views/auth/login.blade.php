@extends('layouts.app')
@section('title', 'Echame La Mano - Login')
@section('content')
    <div class="row d-flex justify-content-center align-items-center " style="min-height: 100vh;">

        <div class="col p-5 m-4 bg-img">
                <img src="img/Frame -login.jpg" class="img-fluid text-center">
            <div class="bg-app p-5 ">
                <div class="text-right">
                    <h1 class="title-login">@lang('login.title')</h1>
                    <p class="text-login mt-3">@lang('login.title-p')</p>
                </div>
                <form method="POST" action="{{ route('login') }}" class="mt-5">
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
                    <div class="mb-3">
                        <label for="password" class="fw-light">@lang('login.input-password')</label>
                        <div class="input-group">
                            <input type="password" id="password-field"" class="form-control mt-3 @error('password') is-invalid @enderror"
                            placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="current-password">
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

                        {{-- <div class="mb-3">

                            <div class="input-group">
                                <input type="password" id="passwordInput" class="borderless-input mt-3 @error('password') is-invalid @enderror"
                                    placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="current-password" id="password-field">
                                <div class="input-group-append">
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon field-icon-hidden toggle-password"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                    <div class="mb-3">
                        @if (Route::has('password.request'))
                            <a class="mt-3 btn-reset fs-6" href="{{ route('password.request') }}">
                                @lang('login.a-reset-password')
                            </a>
                        @endif
                        <div class="mt-5 text-center">
                            <button type="submit" class=" btn-login btn-large ">
                                @lang('login.btn-login')
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-5 text-start">
                                <hr>
                            </div>
                            <div class="col-md-2 text-center">
                                <p>O</p>
                            </div>
                            <div class="col-md-5 text-end">
                                <hr>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6 text-center p-2">
                            <button class="btn-social">
                                <img src="svg/login-google.svg" class="img-button">
                                Google
                            </button>
                        </div>
                        <div class="col-md-6 text-center p-2">
                            <button class="btn-social">
                                <img src="svg/login-facebook.svg" class="img-button">
                                Facebook
                            </button>
                        </div>
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        @lang('login.p-create')
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <a href="register" class="btn-reset">
                                        @lang('login.Login')
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
