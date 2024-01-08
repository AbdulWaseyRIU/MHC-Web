@extends('Layout.app')

@section('content')
<div class="custom-container">
    @if (session('resent'))
        <div class="custom-alert custom-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    @if(Session::has('error'))
        <p class="custom-alert pb-3 {{ Session::get('alert-class', 'custom-danger') }}">{{ Session::get('error') }}</p>
    @endif

    Before proceeding, please check your email for a verification link.
    If you did not receive the email
    <div class="custom-center">
        <form class="custom-form" method="POST" >
            @csrf
            <button type="submit" class="request-button">{{ __('Click here to request another') }}</button>
        </form>
    </div>
</div>

@endsection
