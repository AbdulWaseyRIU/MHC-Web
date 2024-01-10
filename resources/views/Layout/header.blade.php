<header>
    <div class="slider-container">
        @if(request()->is('/'))
            <img src="{{ asset('graphics/slider.jpg')}}" alt="">
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
            @elseif(request()->is('changepassword'))
            <img src="{{ asset('graphics/login.webp')}}" alt="">
            <div class="slider-text">
                <h2>Change Password</h2>
            </div>
            @elseif(request()->is('profile'))
            <img src="{{ asset('graphics/login.webp')}}" alt="">
            <div class="slider-text">
                <h2>Profile</h2>
            </div>
            @elseif(request()->is('newpassword'))
            <img src="{{ asset('graphics/login.webp')}}" alt="">
            <div class="slider-text">
                <h2>Renew Password</h2>
            </div>
            @elseif(request()->is('register'))
            <img src="{{ asset('graphics/login.webp')}}" alt="">
            <div class="slider-text">
                <h2>Register here</h2>
            </div>
            @elseif(request()->is('privacy'))
            <img src="{{ asset('graphics/privacy.jpg')}}" alt="">
            <div class="slider-text">
                <h2>Privacy and policy</h2>
            </div>
            @elseif(request()->is('term'))
            <img src="{{ asset('graphics/terms.jpg')}}" alt="">
            <div class="slider-text">
                <h2>Terms of use</h2>
            </div>
            @elseif(request()->is('password/reset'))
            <img src="{{ asset('graphics/forget-password.jpg')}}" alt="">
            <div class="slider-text">
                <h2>Forget Password</h2>
            </div>
         @elseif(request()->is('email/verify'))
            <img src="{{ asset('graphics/email-v.webp')}}" alt="">
            <div class="slider-text">
                <h2>Verify Your Email</h2>
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
        @elseif(request()->is('forgot-password'))
            <img src="{{ asset('graphics/login.webp')}}" alt="">
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
            <a href="/about">About our Software</a>
            <a href="/login">Scan</a>
            <a href="/contact">Contact</a>

        @auth

         <!-- Profile icon and options -->
            <div class="profile-icon">
                <a href=""><i class="fa fa-fw fa-user"></i></a>
                <div class="profile-options">
                    <a href="profile">Profile</a>
                    <a href="/previousreport">Previous Reports</a>

                    <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </div>
            </div>  @endauth
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
