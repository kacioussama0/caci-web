@php
    $semesters = \App\Models\Semester::all();
@endphp
<!doctype html>
<html lang="fr" dir="ltr">
<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} |  @yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('imgs/logo.svg')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('imgs/logo.svg')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('imgs/logo.svg')}}">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Dependency Styles -->
    <link rel="stylesheet" href="{{asset('dependencies/bootstrap/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dependencies/fontawesome/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dependencies/swiper/css/swiper.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dependencies/wow/css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dependencies/simple-line-icons/css/simple-line-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dependencies/themify-icons/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dependencies/components-elegant-icons/css/elegant-icons.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dependencies/magnific-popup/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dependencies/slick-carousel/css/slick.css')}}" type="text/css">


    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600,700,800%7CPoppins:300,400,500,600,700,800" rel="stylesheet">

</head>




<body id="home-version-1" class="home-comminity" data-style="default">

<a href="#main_content" data-type="section-switch" class="return-to-top">
    <i class="fa fa-chevron-up"></i>
</a>

<div class="page-loader">
    <div class="page-loading-wrapper">
        <div class="loading loading07">
            <span data-text="C">C</span>
            <span data-text="A">A</span>
            <span data-text="C">C</span>
            <span data-text="I">I</span>
            <br>
            <span data-text="W">W</span>
            <span data-text="E">E</span>
            <span data-text="B">B</span>
        </div>
    </div>
</div>

<div id="main_content" class="main-content">

    <!-- Start Header -->

    <!--=========================-->
    <!--=        Navbar         =-->
    <!--=========================-->
    <header class="site-header  header-transparent header-fixed" data-header-fixed="true" data-mobile-menu-resolution="992">
        <div class="container">
            <div class="header-inner">

                <nav id="site-navigation" class="main-nav">

                    <div class="site-logo">
                        <a href="{{url('/')}}" class="logo">
                            <img src="{{asset('imgs/logo.svg')}}" alt="" width="50" class="main-logo">
                            <img src="{{asset('imgs/logo.svg')}}" alt="" width="50" class="logo-sticky">
                        </a>
                    </div>
                    <!-- /.site-logo -->

                    <div class="menu-wrapper main-nav-container canvas-menu-wrapper" id="mega-menu-wrap">
                        <div class="canvas-header">
                            <div class="mobile-offcanvas-logo">
                                <a href="index.html">
                                    <img src="{{asset('imgs/logo.svg')}}" alt="" width="50" class="logo-sticky">
                                </a>
                            </div>

                            <div class="close-menu" id="page-close-main-menu">
                                <i class="ti-close"></i>
                            </div>

                        </div>

                        <ul class="astriol-main-menu">

                            <li class="menu-item-depth-0">
                                <a href="{{url('/')}}">Accueil</a>
                            </li>
                            <li class="has-submenu menu-item-depth-0">
                                <a href="#">Semestres</a>
                                <ul class="sub-menu">
                                    @foreach($semesters as $semester)
                                        <li><a href="#">{{$semester->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="has-submenu menu-item-depth-0">
                                <a href="{{url('modules')}}">Modules</a>
                                <ul class="sub-menu">
                                    @foreach($semesters as $semester)
                                        @foreach($semester->modules as $module)
                                            <li class="d-flex align-items-center p-2">
                                                <img src="{{asset('storage/' . $module -> thumbnail)}}" width="30" alt="">
                                                <a href="#">{{$module -> title}}</a>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </li>


                            <li class=" menu-item-depth-0">
                                <a href="index.html">Livres</a>
                            </li>


                            <li class="menu-item-depth-0">
                                <a href="{{url('/')}}">Contacter Nous</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.menu-wrapper -->

                    <div class="nav-right border-0">
                        <a href="{{url('login')}}" class="gp-btn nav-btn mr-3 d-none"><i class="ei ei-icon_lock-open_alt"></i>Connexion</a>
                        <a class="gp-btn nav-btn btn-help d-none" href="{{route('register')}}" >S'inscrire</a>
                        <div class="astriol-burger-menu" id="mobile-menu-open">
                            <span class="bar-one"></span>
                            <span class="bar-two"></span>
                            <span class="bar-three"></span>
                        </div>
                    </div>

                </nav>
                <!-- /.site-nav -->
            </div>
            <!-- /.header-inner -->
        </div>
        <!-- /.container-full -->
    </header>
    <!-- /.site-header -->


    <!-- End Header -->




@yield('content')



    <!--=========================-->
    <!--=        Footer         =-->
    <!--=========================-->
    <footer id="footer-community" class="gp-site-footer">
        <div class="footer-inner">
            <div class="container">
                <div class="footer-widgets">
                    <div class="row justify-content-between">

                        <div class="col-sm-6">
                            <div class="widget widget-about">
                                <div class="footer-logo">
                                    <a href="#"><img src="{{asset('imgs/logo.svg')}}" alt="footer logo" width="50"></a>
                                </div>

                                <p class="footer-text">
                                    vous trouvez des leçons, des exercices

                                    <br> et tout ce qui est nouveau dans le développement Web
                                </p>

                                <h3 class="follow-title">Socials</h3>
                                <ul class="footer-social-two style-circle-sm">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <!-- /.footer-social -->
                            </div>
                            <!-- /.widget -->
                        </div>
                        <!-- /.col-xl-3 -->


                        <div class="col-sm-6">
                            <div class="widget contact-widget">
                                <h3 class="widget-title">Contacter Nous</h3>

                                <ul class="footer-contact-info">
                                    <li>
                                        <i class="ei ei-icon_pin"></i>
                                        <p>
                                            P5M5+2X4, Mohammadia
                                        </p>
                                    </li>

                                    <li class="phone">
                                        <i class="ei ei-icon_phone"></i>

                                        <p>
                                            +(213) 782022754
                                        </p>
                                    </li>

                                    <li class="email">
                                        <i class="fa fa-envelope"></i>

                                        <p>
                                            contact@caci-web.tech
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.widget -->
                        </div>
                        <!-- /.col-xl-3 -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.footer-widgets -->

                <div class="site-info text-center">
                    <p class="copyright-text">Tous les droits sont réservés Caci Web &copy; {{date('Y')}} Par <a href="https://github.com/kacioussama0">Kaci Oussama</a>. </p>
                </div>
                <!-- /.site-info -->
            </div>
            <!-- /.footer-inner -->
        </div>
        <!-- /.container -->
    </footer>
    <!-- /#footer-medical.gp-site-footer -->

</div>
<!-- /#site -->

<!-- Dependency Scripts -->
<script src="{{asset('dependencies/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dependencies/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dependencies/swiper/js/swiper.min.js')}}"></script>
<script src="{{asset('dependencies/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('dependencies/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('dependencies/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('dependencies/jquery.appear/jquery.appear.js')}}"></script>
<script src="{{asset('dependencies/wow/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
<script src="{{asset('dependencies/countUp.js/countUp.min.js')}}"></script>
<script src="{{asset('dependencies/bodymovin/lottie.min.js')}}"></script>
<script src="{{asset('dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js')}}"></script>
<script src="{{asset('dependencies/wavify/wavify.js')}}"></script>
<script src="{{asset('dependencies/jquery.marquee/js/jquery.marquee.js')}}"></script>
<script src="{{asset('assets/js/jarallax.min.js')}}"></script>
<script src="{{asset('dependencies/gmap3/js/gmap3.min.js')}}"></script>
<script src="{{asset('dependencies/slick-carousel/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.parallax.min.js')}}"></script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M'></script>


<!-- Site Scripts -->
<script src="{{asset('assets/js/header.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
@yield('scripts')

</body>
</html>
