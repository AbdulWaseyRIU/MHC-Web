@extends('Layout.app')
@section('content')
<main>
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf
            <h2>Register First</h2>
            <!-- Name -->
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-input" />
                <x-input-error :messages="$errors->get('name')" class="input-error" />
            </div>

            <!-- Email Address -->
            <div class="form-group mt-4">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-input" />
                <x-input-error :messages="$errors->get('email')" class="input-error" />
            </div>

            <!-- Password -->
            <div class="form-group mt-4">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="form-input" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group mt-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-input" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}" class="login-link">Already registered?</a>

                <button type="submit" class="login-button">Register</button>
        </form>
    </div>
</main>
@endsection
