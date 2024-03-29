@extends('layouts.app')
@section('title', 'Echame La Mano - Registrar')
@section('content')
    <div class="row d-flex justify-content-center align-items-center " style="min-height: 100vh;">


        <div class="col p-3 bg-img">
            <img src="img/Frame -login.jpg" class="img-fluid text-center">
            <div class="bg-app p-5">
                <div class="text-right">
                    <h1 class="title-login">@lang('register.title')</h1>
                    @if($errors->any())
                    @foreach ($errors->all() as $error)

                        <p class="bg-light">{{ $error }}</p>
                    @endforeach
                   @endif
                </div>
                <form method="POST" action="{{ route('register') }}" class="mt-3">
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
                        <label for="password" class="fw-light">@lang('register.input-password')</label>
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
                    <div class="mb-3">
                        <label for="password" class="fw-light">@lang('register.input-passwordConfirm')</label>
                        <div class="input-group">
                            <input type="password" id="password-field2"
                                class="form-control mt-3 @error('password2') is-invalid @enderror" placeholder="@lang('register.input-password-placeholder')"
                                name="password_confirmation" value="{{ old('password2') }}" required autocomplete="current-password">
                            <button class="btn btn-outline-secondary" type="button" id="showPassword2">
                                <i id="eyeIcon2" class="far fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="fw-light">@lang('register.type')</label>
                        <div class="input-group">
                            <select name="type" id="" class="borderless-input" required>
                                <option value="1">cliente</option>
                                <option value="2">vendedor</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 mt-5">
                        <div class="mt-5 text-center">
                            <button type="submit" class=" btn-login btn-large ">
                                @lang('register.btn-register')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
