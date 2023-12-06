@extends('Layout.app')
@section('content')
<main >
    <section>
<div class="container">
    <div class="about-container">
        <div class="about-item"> <h2>Discovering Gender and Growth </h2></div>
        <div class="about-item"><p>
            Welcome to our digital sanctuary, where technology meets the miracle of life. At Maternity Health Care System, we're on a mission to bring clarity and understanding to the beautiful journey of pregnancy.

            Our passion lies in harnessing cutting-edge technology to provide accurate gender predictions and comprehensive fetal growth assessments. We understand that every moment of this journey is precious, and our web application is designed to empower parents with insights that go beyond the ordinary.

            Embark on a transformative experience where science and compassion intertwine. Our commitment is to deliver more than just data; it's about offering reassurance, understanding, and a digital companion that stands with you through every heartbeat and milestone.

            Whether you're eager to unveil the gender of your little one or seeking in-depth insights into fetal growth, Maternity Health Care System is here to guide you. Join us on this extraordinary expedition into the realms of life, love, and technology.

            Your story begins here, and so does ours. Let's navigate this incredible journey together. </p>
       <div class="about-button"> <a href="about">  <button class="glow-on-hover" type="button">Our History</button></a> </div>
        </div>
    </div>
    <div class="services-container">
        <div class="service-item">
            <img src="{{ asset('graphics/gender.png')}}" alt="Gender Detection Image">
            <div class="overlay">
                <h2>Gender Detection</h2>
            </div>
        </div>
        <div class="service-item">
            <img src="{{ asset('graphics/growth.jpg')}}" alt="Growth Detection Image">
            <div class="overlay">
                <h2>Growth Detection</h2>
            </div>
        </div>

    </div></div>
    <div class="scrolling-background" style="background-image: url('{{ asset('graphics/ultrasound-scan.webp') }}');">
        <div class="overlay-text">
            <h1>Do You Want to Scan</h1>
            <div class="about-button">     <a href="scan"><button class="glow-on-hover" type="button" onclick="redirectToScanRoute()">Scan Now</button></a>
            </div>
        </div>
    </div>

</section>
</main>

@endsection

