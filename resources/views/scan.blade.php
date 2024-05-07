@extends('Layout.app')
@section('title', 'Scan')

@section('content')

    <div class="form-area">
<div class="scan-container">
    @if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif
<div class="uploadwrapper">
    <div class="services-container">
        <div class="service-item">
            <img src="{{ asset('graphics/gender.png')}}" alt="Gender Detection Image">
            <div class="overlay">
                <a href="gender"><h2>Gender Detection</h2></a>
            </div>
        </div>

        <div class="service-item">
            <img src="{{ asset('graphics/growth.jpg')}}" alt="Growth Detection Image">
            <div class="overlay">
                <a href="growth">     <h2>Growth Detection</h2></a>
            </div>
        </div>

    </div>
</div>

</div>
</div>
@endsection

