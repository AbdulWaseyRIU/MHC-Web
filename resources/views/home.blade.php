@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @auth
                    <p>{{ __('You are logged in!') }}</p>
                    <p>User ID: {{ $user->uid }}</p>
                    <p>User Email: {{ $user->email }}</p>
                @else
                    <p>{{ __('You are not logged in.') }}</p>
                @endauth


            </div>
            </div>
        </div>
    </div>
</div>
@endsection
