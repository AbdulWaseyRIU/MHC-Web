@extends('Layout.app')

@section('content')
<div class="form-area">
    <div class="main-container">

        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <span class="error-message" id="nameError"></span>
            </div>

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <span class="error-message" id="emailError"></span>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <span class="error-message" id="passwordError"></span>
            </div>


    <div class="form-group">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        <span class="error-message" id="confirmPasswordError"></span>
    </div>

            <div>
                <button type="submit" class="login-button">Register</button>
                <a class="already-registered" href="{{ route('login') }}" class="login-link">Already registered?</a>
            </div>
        </form>
    </div>
</div>
<script>
    function validateName() {
        var nameInput = document.getElementById('name');
        var nameError = document.getElementById('nameError');

        if (nameInput.value.trim() === '') {
            nameError.textContent = 'Name is required';
        } else {
            nameError.textContent = '';
        }
    }

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

        // Check if Confirm Password matches Password
        validateConfirmPassword();
    }

    function validateConfirmPassword() {
        var confirmPasswordInput = document.getElementById('password-confirm');
        var confirmPasswordError = document.getElementById('confirmPasswordError');
        var passwordInput = document.getElementById('password');

        if (confirmPasswordInput.value !== passwordInput.value) {
            confirmPasswordError.textContent = 'Passwords do not match';
        } else {
            confirmPasswordError.textContent = '';
        }
    }

    // Add keyup event listeners for validation
    document.getElementById('name').addEventListener('keyup', validateName);
    document.getElementById('email').addEventListener('keyup', validateEmail);
    document.getElementById('password').addEventListener('keyup', validatePassword);
    document.getElementById('password-confirm').addEventListener('keyup', validateConfirmPassword);
</script>
@endsection
