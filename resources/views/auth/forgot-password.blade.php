@extends('Layout.app')
@section('content')
<main >
    <div class="container">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
  <form method="POST" action="{{ route('login') }}">
        @csrf <h2>Login First</h2>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
        </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />


            <a href="login" class="login-button"> Email Password Reset Link</a>
      <!-- Registration Link -->

    </form>
</div>

</main>

@endsection
