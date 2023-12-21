@extends('Layout.app')
@section('content')
<main >
    <div class="container">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf <h2>Login First</h2>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="remember-me">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Remember me</label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot your password?</a>
            @endif

            <a href="scan" class="login-button">Log in</a>
        </div>  <!-- Registration Link -->
        <div class="registration-link">
         <a href="{{ route('register') }}">Don't have an account? Register now!</a>
     </div>
    </form>
    <form method="POST" action="/">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</main>

@endsection
