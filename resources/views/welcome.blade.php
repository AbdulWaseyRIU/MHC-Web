@extends('Layout.app')
@section('content')
<main >
    <div class="main-container">
        <div class="row">
            <h2>About our software</h2>
        </div>
        <div class="row">
            <div class="text-column">
                <p>"Our software is a revolutionary solution designed to transform the way you manage maternity health care. With cutting-edge features and a user-friendly interface, it empowers healthcare professionals to streamline patient information, track fetal development, and ensure the well-being of both mother and child. Whether it's gender detection, fetal growth monitoring, or providing vital information to expectant parents, our software offers a comprehensive suite of tools to enhance healthcare practices. Experience a new era of maternity care with our innovative software, setting new standards for the industry."</p>
            </div>
            <div class="image-column">
                <img src="{{ asset('graphics/software.jpg')}}" alt="Image">
            </div>
        </div>
        <div class="row">
            <h2>How to Scan</h2>
        </div>
        <div class="row">

            <div class="image-column">
                <img src="{{ asset('graphics/upload.png')}}" alt="Image">
            </div>
            <div class="text-column">
                <p>" you can use our user-friendly website to upload your ultrasound image, and our sophisticated system will provide you with an accurate gender prediction. Embrace the joy of anticipation and let our technology make this special moment even more memorable. Discover the gender of your baby effortlessly – connect with us and celebrate the journey of parenthood!""</p>

                <a href="#" class="scan-link">Click here to scan</a>

            </div>
        </div>
    </div>

</main>
@endsection
