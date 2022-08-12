<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{route('home')}}"><span>Com</span>pany</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="{{route('home')}}" class="logo mr-auto"><img src="{{asset('/')}}frontend/assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class=" {{ Request::is('/') ? 'active' : '' }} "><a href="{{route('home')}}">Home</a></li>
{{--                <li><a href="services.html">Services</a></li>--}}
{{--                <li><a href="portfolio.html">Portfolio</a></li>--}}
                <li class=" {{ Request::is('contact-us') ? 'active' : '' }} "><a href="{{route('contact')}}">Contact</a></li>

            </ul>
        </nav><!-- .nav-menu -->

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
        </div>

    </div>
</header><!-- End Header -->
