@extends('Layout.app')

@section('content')
<div class="form-area">
    <div class="main-container"> @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="error-message" id="emailError"></span>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                <span class="error-message" id="passwordError"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="login-button" >
                    {{ __('Login') }}
                </button>
            </div>

            <a class="forgot-password" href="/password/reset" style="text-decoration: none;">
                Forgot Your Password?
            </a>

            <div class="registration-link">
                <a href="{{ route('register') }}">Don't have an account? Register now!</a>
            </div>
        </form>
        </div>
        </div>
        @include('javascript.loginform-validation')
   @endsection
