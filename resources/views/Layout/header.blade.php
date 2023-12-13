

    <header>
        <div class="slider-container">
            <img src="{{ asset('graphics/slider.jpg')}}" alt="">
         <div class="slider-text">
                <h2>Welcome to Maternity Health Care System</h2>

            </div>
        </div>

        <div class="top-bar">
            <div class="logo">Maternity Health Care System</div>


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
        document.getElementById("menu-toggle").addEventListener("change", function () {
            document.body.classList.toggle("menu-open", this.checked);
        });
    </script>
