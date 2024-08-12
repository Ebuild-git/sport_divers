@include('sweetalert::alert')
@php
    $config = DB::table('configs')->first();
    $service = DB::table('services')->get();
    $produit = DB::table('produits')->get();
@endphp
<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>MARIBELLE</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;700;900&amp;display=swap" />
    <link rel="shortcut icon" type="image/png" href="./assets/logo/icon.png" />
    <!--build:css assets/css/styles.min.css-->
    <link rel="stylesheet" href="/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="/assets/css/slick.min.css" />
    <link rel="stylesheet" href="/assets/css/fontawesome.css" />
    <link rel="stylesheet" href="/assets/css/jquery.modal.min.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-drawer.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Script.js"></script>


</head>

<body>
    <div class="header -one">

        <div class="menu -style-1">
            <div class="container p-0 ">
                <div class="menu__wrapper"><a class="menu-logo" href="{{ route('home') }}"><img
                            src="{{ Storage::url($config->logo) }}" alt="Logo" height="100" width="100" /></a>
                    <div class="navigator ">

                        <ul>
                            <li class="relative">
                                <a href="{{ route('home') }}">Accueil</a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">Shop</a>
                            </li>

                            <li><a href="{{ route('contact') }}">Contact</a></li>

                            @if (Auth()->user())
                                <li>
                                    <a href="{{ route('comptes') }}"> Mes commandes
                                    </a>
                                </li>
                            @endif
                            @guest

                                <li class="current">
                                    <a href="{{ route('register') }}">Inscription</a>
                                </li>

                                <li>
                                    <a href="{{ url('login') }}">Connexion</a>
                                </li>
                            @else
                                @if (auth()->user()->role != 'client')
                                    <li><a href="{{ url('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                                    </li>
                                @endif

                                <li>

                                <li class="nav-item dropdown  relative d-flex p-1 d-sm-inline-block d-inline-block">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>


                                        {{ Auth::user()->nom }}
                                    </a>
                                    <style>
                                        @media (max-width: 767px) {

                                            .nav-item.dropdown .dropdown-menu {
                                                display: none;

                                            }
                                        }
                                    </style>
                                    <ul class="dropdown-menu d-sm-block d-none">
                                        <li><a class="dropdown-item" href="{{ route('comptes') }}">
                                                <i class="bx bx-tachometer text-left"></i>
                                                <span>Mes commandes</span>
                                            </a>
                                        </li>
                                        <li> <a class="dropdown-item" href="{{ route('cart') }}">
                                                <i class="bx bx-tachometer"></i>
                                                <span>Mon panier</span>

                                            </a></li>
                                        <li><a class="dropdown-item" href="{{ route('favories') }}">
                                                <i class="bx bx-tachometer"></i>
                                                <span>Mes favoris</span>

                                            </a></li>
                                        <li> <a class="dropdown-item" href="{{ route('profile') }}">
                                                <i class="bx bx-tachometer"></i>
                                                <span>Paramètres</span>

                                            </a></li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>


                                </li>
                                </li>

                            @endguest





                        </ul>



                    </div>

                    <div class="menu-functions "><a class="menu-icon -search" href="#"> <img
                                src="/assets/images/header/search-icon.png" alt="Search icon" /></a>
                        <div class="search-box">

                            <form role="search" action="/shop" method="POST">
                                @csrf
                                <div class="sidebar__search-input-2">
                                    <input type="search" id="search_product" name="key"
                                        value="{{ $nom ?? '' }}" placeholder="Rechercher un produit" required>
                                    <button type="submit" value="Search">
                                        <img src="/assets/images/header/search-icon.png" alt="Search icon" />
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="menu-cart">
                            <a class="menu-icon -wishlist" href="{{ route('favories') }}">
                                <img src="/assets/images/header/wishlist-icon.png" alt="Wishlist icon" />

                            </a>


                        </div>
                        &nbsp;&nbsp;&nbsp;



                        <div class="menu-cart"><a class="menu-icon -cart" href="#"><img
                                    src="/assets/images/header/cart-icon.png" alt="Wishlist icon" /><span
                                    class="cart__quantity"></span></a>
                            <h5>Cart:<span id="count-panier-span"></span></h5>
                        </div><a class="menu-icon -navbar" href="#">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </a>
                    </div>


                </div>


            </div>
        </div>
    </div>





    <div class="drawer drawer-right slide" id="cart-drawer" tabindex="-1" role="dialog"
        aria-labelledby="drawer-demo-title" aria-hidden="true">
        <div class="drawer-content drawer-content-scrollable" role="document">
            <div class="drawer-body">
                <div class="cart-sidebar">
                    <div class="cart-items__wrapper">
                        <h2>Mon panier</h2>

                        <div class="cart-item row" id="list_content_panier">

                        </div>






                        <div class="cart-items__total">
                            <div class="cart-items__total__price">
                                <h5>Total</h5><span id="montant_total_panier">00</span>
                            </div>
                            <div class="cart-items__total__buttons"><a class="btn -dark"
                                    href="{{ url('cart') }}">Voir le panier
                                </a><a class="btn -red" href="{{ url('/commander') }}">Commander</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="drawer drawer-right slide" id="mobile-menu-drawer" tabindex="-1" role="dialog"
        aria-labelledby="drawer-demo-title" aria-hidden="true">
        <div class="drawer-content drawer-content-scrollable" role="document">
            <div class="drawer-body">
                <div class="cart-sidebar">
                    <div class="cart-items__wrapper">
                        <div class="navigation-sidebar">
                            <div class="search-box">
                                <form role="search" action="/shop" method="POST">
                                    @csrf
                                    <div class="sidebar__search-input-2">
                                        <input type="search" id="search_product" name="key"
                                            value="{{ $nom ?? '' }}" placeholder="Rechercher un produit" required>
                                        <button type="submit" value="Search">
                                            <img src="/assets/images/header/search-icon.png" alt="Search icon" />
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="navigator-mobile">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a>

                                    </li>


                                    <li><a href="{{ route('shop') }}">Shop</a></li>


                                    <li><a href="{{ route('contact') }}">Contact</a></li>

                                    @guest



                                        <li class="current">
                                            <a href="{{ route('register') }}">Inscription</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('login') }}">Connexion</a>
                                        </li>
                                    @else
                                        @if (auth()->user()->role != 'client')
                                            <li><a href="{{ url('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                                            </li>
                                        @endif

                                        <li
                                            class="nav-item dropdown  relative d-flex p-1 d-sm-inline-block d-inline-block">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>


                                                {{ Auth::user()->nom }}
                                            </a>
                                            <style>
                                                @media (max-width: 767px) {


                                                    .nav-item.dropdown .dropdown-menu {
                                                        display: none;

                                                    }
                                                }
                                            </style>
                                            <ul class="dropdown-menu d-sm-block d-none">
                                                <li><a class="dropdown-item" href="{{ route('comptes') }}">
                                                        <i class="bx bx-tachometer text-left"></i>
                                                        <span>Mes commandes</span>
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="{{ route('favories') }}">
                                                        <i class="bx bx-tachometer"></i>
                                                        <span>Mes favoris</span>

                                                    </a></li>
                                                <li> <a class="dropdown-item" href="{{ route('profile') }}">
                                                        <i class="bx bx-tachometer"></i>
                                                        <span>Paramètres</span>

                                                    </a></li>

                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                                                        Déconnexion
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>


                                        </li>
                                        </li>


                                    @endguest



                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <main>



        @yield('body')




    </main>

    <div class="footer-one">
        <div class="container">
            <div class="footer-one__header">

                <div class="footer-one__header__social">
                    <div class="social-icons -border">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-one__body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">

                        <div class="footer-one__header__logo"><a href="#"><img
                                    src="{{ Storage::url($config->logo) }}" alt="Logo" height="100"
                                    width="100" /></a></div>
                        <div class="footer__section -payment">

                            <h5 class="footer-title"></h5>
                            <p> {{ $config->description }}</p>

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="footer__section -links">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h5 class="footer-title">Mon compte</h5>
                                    <ul>
                                        @if (Auth()->user())
                                            <li><a href="{{ route('profile') }}">Me paramètres</a></li>
                                            <li><a href="{{ route('favories') }}">Mes favoris</a></li>
                                            <li><a href="{{ route('cart') }}">Mon panier</a></li>
                                            <li><a href="{{ route('comptes') }}">Mes commandes</a></li>
                                        @else
                                            <li class="current">
                                                <a href="{{ route('register') }}">Inscription</a>
                                            </li>

                                            <li>
                                                <a href="{{ url('login') }}">Connexion</a>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h5 class="footer-title">Nos liens</h5>
                                    <ul>
                                        <li><a href="{{ route('home') }}">Accueill</a></li>
                                        <li><a href="{{ route('shop') }}">Shop</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">

                        <div class="footer__section -info">
                            <h5 class="footer-title">Contact info</h5>
                            <p>Addresse:<span> {{ $config->addresse }}</span></p>
                            <p>Téléphone:<span> {{ $config->telephone }}</span></p>
                            <p>Email:<span> {{ $config->email }}</span></p>
                            <p>Horaire:<span>8.00am - 11.00.pm</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-one__footer">
            <div class="container">
                <div class="footer-one__footer__wrapper">
                    <div class="tp-copyright-text text-center">
                        <p class="text-white">
                            Copyright @ 2024 MARIBELLE.

                        </p>
                    </div>
                    <ul>
                        Build by
                        <a href="https://www.e-build.tn" style="color: #c71f17;">
                            <b> E-build </b>
                        </a>.
                    </ul>
                </div>
            </div>
        </div>
    </div>





    <!--build:js assets/js/main.min.js-->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/parallax.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/jquery.modal.min.js"></script>
    <script src="./assets/js/bootstrap-drawer.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/main.min.js"></script>
    <!--endbuild-->
</body>

</body>

</html>
