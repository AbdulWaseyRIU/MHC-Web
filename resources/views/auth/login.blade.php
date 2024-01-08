@extends('Layout.app')

@section('content')
<div class="form-area">
    <div class="main-container">
        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" >
                <span class="error-message" id="emailError"></span>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                <span class="error-message" id="passwordError"></span>
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

        <script>
        function validateEmail() {
            var emailInput = document.getElementById('email');
            var emailError = document.getElementById('emailError');
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(emailInput.value)) {
                emailError.textContent = 'Enter a valid email address';
            } else {
                emailError.textContent = '';
            }
        }

        function validatePassword() {
            var passwordInput = document.getElementById('password');
            var passwordError = document.getElementById('passwordError');

            if (passwordInput.value.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters';
            } else {
                passwordError.textContent = '';
            }
        }

        // Add keyup event listeners to trigger validation on keypress
        document.getElementById('email').addEventListener('keyup', validateEmail);
        document.getElementById('password').addEventListener('keyup', validatePassword);
        </script>


    @endsection
