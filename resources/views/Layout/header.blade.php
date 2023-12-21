<header>
    <div class="slider-container">
        @if(request()->is('/'))
            <img src="{{ asset('graphics/scan.jpg')}}" alt="">
            <div class="slider-text">
                <h2>Welcome to Maternity Health Care System</h2>
            </div>
        @elseif(request()->is('about'))
            <img src="{{ asset('graphics/about.jpg')}}" alt="">
            <div class="slider-text">
                <h2>About Our Software</h2>
            </div>
        @elseif(request()->is('scan'))
            <img src="{{ asset('graphics/scan.webp')}}" alt="">
            <div class="slider-text">
                <h2>Scan Here</h2>
            </div>
        @elseif(request()->is('login'))
            <img src="{{ asset('graphics/login.webp')}}" alt="">
            <div class="slider-text">
                <h2>Login Here</h2>
            </div>
            @elseif(request()->is('contact'))
            <img src="{{ asset('graphics/contact.jpeg')}}" alt="">
            <div class="slider-text">
                <h2>Contact us</h2>
            </div>
            @elseif(request()->is('register'))
            <img src="{{ asset('graphics/login.webp')}}" alt="">
            <div class="slider-text">
                <h2>Register here</h2>
            </div>
        @elseif(request()->is('report') || request()->is('previousreport'))
            <img src="{{ asset('graphics/medical.png')}}" alt="">
            <div class="slider-text">
                @if(request()->is('report'))
                    <h2>Your Report has been Generated</h2>
                @elseif(request()->is('previousreport'))
                    <h2>Your Previous report</h2>
                @endif
            </div>
        @elseif(request()->is('page5'))
            <img src="{{ asset('graphics/slider_page5.jpg')}}" alt="">
            <div class="slider-text">
                <h2>Welcome to Maternity Health Care System</h2>
            </div>
        @endif
    </div>

    <div class="top-bar"> <div class="logo-container">
        <img id="logo" src="{{ asset('graphics/logo1-modified.png')}}" alt="">
        <div class="logo">Maternity Health Care System</div>
    </div>
    <div class="hamburger-icon" id="hamburger">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>

    </div>
        <nav class="nav">
            <a href="/">Home</a>
            <a href="about">About our Software</a>
            <a href="login">Scan</a>
            <a href="contact">Contact</a>

            <!-- Profile icon and options -->
            <div class="profile-icon">
                <a href=""><i class="fa fa-fw fa-user"></i></a>
                <div class="profile-options">
                    <a href="previousreport">Reports</a>
                    <a href="">Logout</a>
                </div>
            </div>
        </nav>
    </div>
</header>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var hamburgerIcon = document.getElementById('hamburger');
    var nav = document.querySelector('.nav');
    var icon = document.querySelector('.hamburger-icon');

    hamburgerIcon.addEventListener('click', function () {
        nav.classList.toggle('open');
        icon.classList.toggle('cross'); // Toggle the 'cross' class for the icon
    });
});

</script>
