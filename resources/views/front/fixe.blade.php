@include('sweetalert::alert')
@php
    $config = DB::table('configs')->first();

@endphp
<!doctype html>


<head>

    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title> @yield('titre') - Sport Divers</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <link rel="icon" href="{{ Storage::url($config->icon) }}" type="image/png" />
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        {{-- <link rel="shortcut icon" type="image/x-icon" href="images/fav.png"> --}}
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <!-- Slick css -->
        <link rel="stylesheet" type="text/css" href="css/slick.css">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="css/off-canvas.css">
        <!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="fonts/flaticon.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css" href="css/rsmenu-main.css">
        <!-- swiper slider CSS -->
        <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="css/rsmenu-transitions.css">
        <!-- rsanimations CSS -->
        <link rel="stylesheet" type="text/css" href="css/rsanimations.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- rs-spaceing css -->
        <link rel="stylesheet" type="text/css" href="css/rs-spaceing.css">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
    </head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>



<body>
    <!--Preloader area start here-->
    <div id="loading" class="loading">
        <div class="rs-loader">
            <div class="rs-shadow"></div>
            <div class="rs-gravity">
                <div class="rs-ball"></div>
            </div>
        </div>
    </div>
    <!--Preloader area End here-->

    <!--Full width header Start-->
    <div class="full-width-header">
        <!--Header Start-->
        <header id="rs-header" class="rs-header homestyle">
            <!-- Menu Start -->
            <div class="menu-area menu-sticky">
                <div class="container-fluid">
                    <div class="row rs-vertical-middle">
                        <div class="col-lg-2">
                            <div class="logo-area"> <a class="menu-logo" href="{{ route('home') }}"><img
                                        src="{{ Storage::url($config->logoHeader ?? ' ') }}" alt="Logo" height="80"
                                        width="80" /></a>
                            </div>
                        </div>
                        <div class="col-lg-10 mobile-menu-area">
                            <div class="rs-menu-area display-flex-center">
                                <div class="main-menu">
                                    <a class="rs-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    <nav class="rs-menu">
                                        <div class="expand-btn">
                                            <span class="search-parent">
                                                <a class="hidden-xs rs-search" href="#">
                                                    <i class="flaticon-search"></i>
                                                </a>
                                                <div class="sticky_form">
                                                    <form role="search" class="bs-search search-form" method="get">
                                                        <div class="search-wrap">
                                                            <input class="search-input" type="text" name="fname"
                                                                placeholder="Search...">
                                                            <button type="submit" value="Search"><i
                                                                    class="flaticon-search"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </span>
                                            {{--  <span class="menu-cart-area mini-cart-active">
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <span class="icon-num">0</span>
                                                </a>
                                                <!-- woocommerce-mini -->
                                                <div class="woocommerce-mini-cart text-left">
                                                    <div class="cart-bottom-part">
                                                        <h2 class="widget-title">No products in the cart.</h2>
                                                    </div>
                                                </div> 
                                            </span> --}}
                                            <span>
                                                <a id="nav-expander" class="nav-expander">
                                                    <ul class="offcanvas-icon">
                                                        <li>
                                                            <span class="hamburger1"></span>
                                                            <span class="hamburger2"></span>
                                                            <span class="hamburger3"></span>
                                                        </li>
                                                    </ul>
                                                </a>
                                            </span>
                                        </div>
                                        <ul class="nav-menu text-right">
                                            <!-- Home -->
                                        <li class="current-menu-item current_page_item menu-item-has-children"> <a
                                                    href="{{ route('home') }}" class="home">Accueil</a>

                                            </li> 
                                            <!-- End Home -->

                                            <!--Contact Menu Start-->
                                            <li><a href="{{ route('evenements') }}">Evènements</a></li> 
                                              {{--  <li class="last-item"><a href="{{ route('about') }}">A propos</a></li>  --}}
                                            <li class="last-item"><a href="{{ route('contact') }}">Contact</a></li>
                                            <li class="last-item"><a href="{{ route('inscription') }}">Inscription</a></li>

                                            <!--Contact Menu End-->

                                            @guest


                                                {{-- <li>
                                                    <a href="{{ url('login') }}">Connexion</a>
                                                </li> --}}
                                            @else
                                                @if (auth()->user()->role != 'client')
                                                    <li><a href="{{ url('dashboard') }}"
                                                            class="nav-item nav-link">Dashboard</a>
                                                    </li>
                                                @endif

                                            @endguest

                                        </ul> <!-- //.nav-menu -->
                                    </nav>
                                </div> <!-- //.main-menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->

            <!-- Canvas Menu start -->
            <nav class="right_menu_togle hidden-md">
                <div class="close-btn"><span id="nav-close" class="text-center"><i
                            class="flaticon-cross"></i></span></div>
                <div class="canvas-logo">
                    <a href="{{ route('home') }}"><img src="{{ Storage::url($config->logo ?? ' ') }}" alt="logo"></a>
                </div>
                <div class="sidebarnav_menu">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">Accueil</a></li> 

                        <li><a href="{{ route('evenements') }}">Evènements</a></li> 
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="canvas-contact">
                    <h5 class="canvas-contact-title">Contact Info</h5>
                    <ul class="contact">
                        <li><i class="fa fa-globe"></i>{{ $config->addresse }}</li>
                        <li><i class="fa fa-phone"></i><a href="#">{{ $config->telephone }}</a></li>
                        <li><i class="fa fa-envelope"></i><a href="#">{{ $config->email }}</a></li>
                    </ul>
                    <ul class="social">
                        <li><a href="{{ $config->facebook }}"><i class="fa fa-facebook"></i></a></li>



                        <li><a href="{{ $config->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ $config->youtube }}"><i class="fa fa-youtube"></i></a></li>


                    </ul>
                </div>
            </nav>
            <!-- Canvas Menu end -->
        </header>
        <!--Header End-->
    </div>
    <!--Full width header End-->





    <main>



        @yield('body')




    </main>
    <footer id="rs-footer" class="rs-footer home5-footer pt-137 md-pt-70 sm-pt-65">
        <div class="footer-top position-relative overflow-hidden z-1">

            <div class="container">
                <div class="row gx-0 gy-6 g-lg-10">
                    <div class="col-lg-5">
                        <style>
                            .app-brand-link img {
                                height: 100px;
                                width: 100px;
                                margin-top: -20px;
                            }
                        </style>
                        <a href="{{ route('home') }}" class="app-brand-link mb-3">
                            <img src="{{ Storage::url($config->logo ?? ' ') }}" alt="Logo" height="100"
                                width="100" />

                        </a>
                        <p class="footer-text footer-logo-description mb-3">
                            Téléphone: {{ $config->telephone }}
                        </p>
                        <p class="footer-text footer-logo-description mb-3">
                            E-mail: {{ $config->email }}
                        </p>
                        <p class="footer-text footer-logo-description mb-3">
                            Adresse: {{ $config->addresse }}
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <h6 class="footer-title mb-3 footer-link">Pages</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('home') }}" target="_blank"
                                    class="footer-link">Accueil</a></li>
                            <li class="mb-2"><a href="{{ route('evenements') }}" target="_blank"
                                    class="footer-link">Evènements</a></li>
                            <li class="mb-2"><a href="{{ route('contact') }}" target="_blank"
                                    class="footer-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <h6 class="footer-title mb-3 footer-link">Nos liens</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ $config->facebook }}" class="footer-link">Facebook</a>
                            </li>
                            <li class="mb-2"><a href="{{ $config->instagram }}" class="footer-link">Instagram</a>
                            </li>
                            <li class="mb-2"><a href="{{ $config->tiktok }}" class="footer-link">TikTok</a></li>
                            <li class="mb-2"><a href="{{ $config->youtube }}" class="footer-link">YouTube</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <h6 class="footer-title mb-3 footer-link">Téléchargez notre application sur :</h6>
                        <a href="javascript:void(0);" class="d-block mb-2"><img
                                src="../../assets/img/front-pages/landing-page/apple-icon.png" alt="apple icon" /></a>
                        <a href="javascript:void(0);" class="d-block"><img
                                src="../../assets/img/front-pages/landing-page/google-play-icon.png"
                                alt="google play icon" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-0 py-md-1">
            <div class="footer-bootom">
                <div class="container custom">
                    <div class="row rs-vertical-middle">
                        <div class="col-md-7">
                            <div class="copyright">
                                <p>© 2024 Sport Divers. All Rights Reserved. Designed by <a
                                        href="https://www.e-build.tn" target="_blank"
                                        style="color: #c71f17;">E-build</a></p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="footer-share text-right">
                                <ul>
                                    <li><a href="{{ $config->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{ $config->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{ $config->youtube }}"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <style>
        .footer-text {
            margin-bottom: 0.5rem;
            padding: 0;
            color: white;
            font-size: 16px;
            text-align: justify;
        }


        .col-lg-2,
        .col-md-4,
        .col-sm-6 {
            margin-bottom: 1rem;
        }

        .footer-top {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .footer-link {
            color: white;
            text-decoration: none;
        }

        .footer-link:hover {
            color: #f1f1f1;
        }

        .rs-footer {
            padding-top: 1rem;
        }
    </style>
    <!-- Footer End -->

    <!-- Scrool to Top Start -->
    <div id="scrollUp">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scrool to Top End -->

    <!-- Search Modal Start -->
    <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="flaticon-cross"></span>
        </button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group">
                            <input class="form-control" placeholder="Search Here.." type="text">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->
 
      
        <script src="js/modernizr-2.8.3.min.js"></script>
        
        <script src="js/jquery.min.js"></script>
        
        <script src="js/bootstrap.min.js"></script>
        
        <script src="js/owl.carousel.min.js"></script>
        
        <script src="js/slick.min.js"></script>
        
        <script src="js/isotope.pkgd.min.js"></script>
        
        <script src="js/imagesloaded.pkgd.min.js"></script>
        
        <script src="js/wow.min.js"></script>
      
        <script src="js/jquery.magnific-popup.min.js"></script>
       
        <script src="js/rsmenu-main.js"></script>
        
        <script src="js/plugins.js"></script>
       
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        
       
        <script src="js/swiper.min.js"></script>
       
        <script src="js/main.js"></script>


</body>

</html>
