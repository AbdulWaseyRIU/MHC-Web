@extends('Layout.app')
@section('content')
<main >
    <!-- Session Status -->
    <div class="main-container">
        <h2>Login First</h2>
    <div>
        <x-auth-session-status class="custom-session-status" :status="session('status')" />

</div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

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

            <button type="submit" class="login-button">Log in</button>
        </div>  <!-- Registration Link -->
        <div class="registration-link">
         <a href="{{ route('register') }}">Don't have an account? Register now!</a>
     </div>
    </form>
    </div>
</main>
@endsection
