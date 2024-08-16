@extends('front.fixe')
@section('titre', 'Shop')
@section('body')


    <main>

        <body>

            <div id="content">
                <div class="breadcrumb">
                    <div class="container">
                        <h2>Shop</h2>
                        <ul>
                            <li>Accueil</li>
                            <li class="active">Shop</li>
                        </ul>
                    </div>
                </div>
                <div class="shop">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="shop-sidebar">
                                    <div class="shop-sidebar__content">
                                        <div class="shop-sidebar__section -categories">
                                            <div class="section-title -style1 -medium" style="margin-bottom:1.875em">
                                                <h2>Categories</h2><img
                                                    src="assets/images/introduction/IntroductionOne/content-deco.png"
                                                    alt="Decoration" />
                                            </div>
                                            <ul>
                                                @foreach ($categories as $category)
                                                    <li>
                                                        <a href="/shop?id_categorie={{ $category->id }}" class="small"
                                                            class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}">
                                                            {{ Str::limit($category->nom, 25) }}
                                                        </a>

                                                    </li>

                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="shop-sidebar__section -refine">
                                            <div class="section-title -style1 -medium" style="margin-bottom:1.875em">
                                                
                                            </div>
                                            <div class="shop-sidebar__section__item">
                                                
                                            </div>
                                            <div class="shop-sidebar__section__item">
                                                
                                                <ul>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="shop-header">
                                    <div class="shop-header__view">
                                        <div class="shop-header__view__icon"><a class="active" href="#"><i
                                                    class="fas fa-th"></i></a><a href="#"><i
                                                    class="fas fa-bars"></i></a></div>
                                        <h5 class="shop-header__page"></h5>
                                    </div>
                                    <select class="customed-select" name="sort_by" id="sort_by"
                                        onchange="window.location.href=this.value;">
                                        <option value="{{ url('shop') }}">Default</option>
                                        <option value="{{ url('croissant') }}">Croissant</option>

                                        <option value="{{ url('decroissant') }}">Décroissant</option>



                                    </select>
                                </div>
                                <div class="shop-products">
                                    <div class="shop-products__gird">
                                        <div class="row">
                                            @if ($produits)


                                                @forelse ($produits as $key => $produit)
                                                    <div class="col-12 col-sm-6 col-lg-4">
                                                        <div class="product ">
                                                            {{-- <div class="product-type"><h5 class="-new">ff</h5></div> --}}
                                                            <div class="product-thumb">
                                                                <a class="product-thumb__image"
                                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}"><img
                                                                        src="{{ Storage::url($produit->photo) }}"
                                                                        width="200 " height="200 " border-radius="8px"
                                                                        alt="Product image" />



                                                                    <style>
                                                                        .top-left {
                                                                            position: absolute;
                                                                            top: 8px;
                                                                            left: 16px;
                                                                            color: red;
                                                                        }

                                                                        .top-right {
                                                                            position: absolute;
                                                                            top: 8px;
                                                                            right: 16px;
                                                                            color: red;
                                                                        }
                                                                    </style>
                                                                    <div class="top-left">
                                                                        @if ($produit->inPromotion())
                                                                            <span class="badge rounded-pill text-bg-danger">

                                                                                <div class="product-type">
                                                                                    <h5 class="-sale">
                                                                                        -{{ $produit->inPromotion()->pourcentage }}%
                                                                                    </h5>
                                                                                </div>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="top-right">

                                                                    </div>

                                                                </a>
                                                                <div class="product-thumb__actions">
                                                                    <div class="product-btn">
                                                                        <button type="button"
                                                                            class="btn -white product__actions__item -round product-atc"
                                                                            onclick="AddToCart( {{ $produit->id }} )">
                                                                            <i class="fas fa-shopping-bag"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="product-btn">
                                                                        {{--  <a class="btn -white product__actions__item -round product-qv" href="#"><i class="fas fa-eye"></i>
                                            </a> --}}
                                                                    </div>
                                                                    <div class="product-btn">
                                                                        @if (Auth()->user())
                                                                            <button type="button"
                                                                                class="btn product__actions__item -round"
                                                                                onclick="AddFavoris({{ $produit->id }})">

                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="red" class="bi bi-heart-fill"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                                                                </svg>


                                                                            </button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-content">
                                                                <div class="product-content__header">
                                                                    <div class="product-category"></div>
                                                                    <div class="rate">{{-- 
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                           --}} </div>
                                                                </div>
                                                                <a class="product-name"
                                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a>
                                                                <div class="product-content__footer">
                                                                    <h5 class="product-price--main">

                                                                        @if ($produit->inPromotion())
                                                                            <div class="row">
                                                                                <div class="col-sm-6">

                                                                                    <b class="text-success"
                                                                                        style="color: #4169E1">
                                                                                        {{ $produit->getPrice() }} DT
                                                                                    </b>
                                                                                </div>
                                                                                <div class="col-sm-2">

                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <strike>


                                                                                        <span class="text-danger small">
                                                                                            {{ $produit->prix }}DT
                                                                                        </span>


                                                                                    </strike>
                                                                                </div>
                                                                            @else
                                                                                {{ $produit->getPrice() }} DT
                                                                        @endif
                                                                    </h5>
                                                                    <div class="product-colors">{{-- 
                                          <div class="product-colors__item" style="background-color: #8B0000"></div>
                                          <div class="product-colors__item" style="background-color: #4169E1"></div>
                                        --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif


                                        </div>
                                    </div>
                                    <div class="shop-products__list">
                                        <div class="row">
                                            @if ($produits)


                                            @forelse ($produits as $key => $produit)
                                            <div class="col-12">
                                                <div class="product-list">
                                                    <div class="product-list-thumb">
                                                        {{-- <div class="product-type">
                                                            <h5 class="-new">New</h5>
                                                        </div> --}}
                                                        <a class="product-list-thumb__image"
                                                     
                                                        href="{{ route('details-produits', ['id' => $produit->id, 'slug'=>Str::slug(Str::limit($produit->nom, 10))]) , }}"><img
                                                            src="{{ Storage::url($produit->photo) }}" width="200 "
                                                            height="200 " border-radius="8px" alt="Product image" />

                                                        <style>
                                                            .top-left {
                                                                position: absolute;
                                                                top: 8px;
                                                                left: 16px;
                                                                color: red;
                                                            }

                                                            .top-right {
                                                                position: absolute;
                                                                top: 8px;
                                                                right: 16px;
                                                                color: red;
                                                            }

                                                            .promo {


                                                                color: red;
                                                            }
                                                        </style>
                                                        <div class="top-left">
                                                            @if ($produit->inPromotion())
                                                                <span class="badge rounded-pill text-bg-danger">
                                                                    <div class="product-type">
                                                                        <h5 class="-sale">
                                                                            -{{ $produit->inPromotion()->pourcentage }}%
                                                                        </h5>
                                                                    </div>
                                                                      </span>
                                                            @endif
                                                        </div>
                                                        <div class="top-right">
                                                         
                                                        </div>


                                                    </a>
                                                    </div>
                                                    <div class="product-list-content">
                                                        <div class="product-list-content__top">
                                                            <div class="product-category__wrapper">
                                                                {{-- <h5 class="product-category">eyes</h5>
                                                                <div class="rate"><i class="fas fa-star"></i><i
                                                                        class="fas fa-star"></i><i
                                                                        class="fas fa-star"></i><i
                                                                        class="fas fa-star"></i><i
                                                                        class="far fa-star"></i></div> --}}
                                                            </div>
                                                            <a class="product-name"
                                                          
                                                             href="{{ route('details-produits', ['id' => $produit->id, 'slug'=>Str::slug(Str::limit($produit->nom, 10))]) , }}">{{ $produit->nom }}
                                                            
                                                        </a>
                                                            <div class="product__price">
                                                                <div class="product__price__wrapper">
                                                                    <h5 class="product-price--main">

                                                                        @if ($produit->inPromotion())
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                
                                                                                <b class="text-success" style="color: #4169E1">
                                                                                    {{ $produit->getPrice() }} DT
                                                                                </b>
                                                                            </div>
                                                                           <div class="col-sm-2">
    
                                                                           </div>
                                                                            <div class="col-sm-4">
                                                                                <strike>
                                                                                  
                                                                                       
                                                                                            <span class="text-danger small">
                                                                                                {{ $produit->prix }}DT
                                                                                            </span>
                                                                                       
                                                                                       
                                                                                </strike>
                                                                            </div>
                                                                        @else
                                                                            {{ $produit->getPrice() }}DT
                                                                        @endif
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-list-content__bottom">
                                                            <p class="product-description">
                                                                {{ Str::limit($produit->description, 50) }} </p>
                                                            <div class="product-actions">
                                                                <div class="product-btn">
                                                                    <div class="add-to-cart ">
                                                                        <button type="button" class="btn -round -red"
                                                                        onclick="AddToCart( {{ $produit->id }} )">
                                                                        <i class="fas fa-shopping-bag"></i>
                                                                    </button>
                                                                    <h5>Ajouter au panier</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="product-btn">
                                                                   {{--  <a
                                                                        class="btn -white product__actions__item -round"
                                                                        href="#"><i class="fas fa-eye"></i></a> --}}
                                                                </div>
                                                                <div class="product-btn">
                                                                    @if (Auth()->user())
                                                                    <button type="button"
                                                                        class="btn -white product__actions__item -round"
                                                                        onclick="AddFavoris({{ $produit->id }})">
                                                                        {{--   <i class="fas fa-heart"></i> --}}
                                                                        {{--  <i class="ri-heart-3-line"></i> --}}
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                            height="16" fill="red"
                                                                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                                                        </svg>
    
    
                                                                    </button>
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                          
                                          
                                           
                                        </div>
                                    </div>
                                </div>
                                <ul class="paginator">
                                {{--     <li class="page-item active">
                                        <button class="page-link">1</button>
                                    </li>
                                    <li class="page-item">
                                        <button class="page-link">2</button>
                                    </li>
                                    <li class="page-item">
                                        <button class="page-link"><i class="far fa-angle-right"></i></button>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

              {{--   <div class="footer-one">
                    <div class="container">
                        <div class="footer-one__header">
                            <div class="footer-one__header__logo"><a href="/homepages/homepage1"><img
                                        src="assets/images/logo.png" alt="Logo" /></a></div>
                            <div class="footer-one__header__newsletter"><span>Subscribe Newletter:</span>
                                <div class="footer-one-newsletter">
                                    <div class="subscribe-form">
                                        <div class="mc-form">
                                            <input type="text" placeholder="Enter your email" />
                                            <button class="btn "><i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-one__header__social">
                                <div class="social-icons -border">
                                    <ul>
                                        <li><a href="https://www.facebook.com/" style="'color: undefined'"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com" style="'color: undefined'"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://instagram.com/" style="'color: undefined'"><i
                                                    class="fab fa-instagram"> </i></a></li>
                                        <li><a href="https://www.youtube.com/" style="'color: undefined'"><i
                                                    class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footer-one__body">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="footer__section -info">
                                        <h5 class="footer-title">Contact info</h5>
                                        <p>Address:<span>2168 S Archer Ave, Chicago, IL 60616, US</span></p>
                                        <p>Phone:<span>+1 312-808-1999</span></p>
                                        <p>Email:<span>Beatycosmetics@gmail.com</span></p>
                                        <p>Opentime:<span>8.00am - 11.00.pm</span></p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="footer__section -links">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <h5 class="footer-title">Account</h5>
                                                <ul>
                                                    <li><a href="#">My account</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="cart">Cart</a></li>
                                                    <li><a href="fullwidth-4col">Shop</a></li>
                                                    <li><a href="checkout">Checkout</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <h5 class="footer-title">Infomation</h5>
                                                <ul>
                                                    <li><a href="about.html">About us</a></li>
                                                    <li><a href="contact.html">Careers</a></li>
                                                    <li><a href="contact.html">Delivery Information</a></li>
                                                    <li><a href="contact.html">Privacy Policy</a></li>
                                                    <li><a href="contact.html">Terms &amp; Condition</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="footer__section -payment">
                                        <h5 class="footer-title">Payment methods</h5>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit gravida facilisis.</p>
                                        <div class="payment-methods"><img src="assets/images/footer/payment.png"
                                                alt="Payment methods" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-one__footer">
                        <div class="container">
                            <div class="footer-one__footer__wrapper">
                                <p>© Copyright 2020 Beauty</p>
                                <ul>
                                    <li><a href="contact.html">Privacy Policy</a></li>
                                    <li><a href="contact.html">Terms &amp; Condition</a></li>
                                    <li><a href="contact.html">Site map</a></li>
                                </ul>
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
                                    <h2>Shopping cart</h2>
                                    <div class="cart-item">
                                        <div class="cart-item__image"><img src="assets/images/product/1.png"
                                                alt="Product image" /></div>
                                        <div class="cart-item__info"><a href="/product-detail.html">The expert
                                                mascaraa</a>
                                            <h5>$35.00</h5>
                                            <p>Quantity:<span> 1</span></p>
                                        </div><a class="cart-item__remove" href="#"><i
                                                class="fal fa-times"></i></a>
                                    </div>
                                    <div class="cart-item">
                                        <div class="cart-item__image"><img src="assets/images/product/3.png"
                                                alt="Product image" /></div>
                                        <div class="cart-item__info"><a href="/product-detail.html">Velvet Melon High
                                                Intensity</a>
                                            <h5>$38.00</h5>
                                            <p>Quantity:<span> 1</span></p>
                                        </div><a class="cart-item__remove" href="#"><i
                                                class="fal fa-times"></i></a>
                                    </div>
                                    <div class="cart-items__total">
                                        <div class="cart-items__total__price">
                                            <h5>Total</h5><span>$73.00</span>
                                        </div>
                                        <div class="cart-items__total__buttons"><a class="btn -dark"
                                                href="cart.html">View cart</a><a class="btn -red"
                                                href="checkout.html">Checkout</a>
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
                                            <form>
                                                <input type="text" placeholder="What are you looking for?" />
                                                <button><img src="assets/images/header/search-icon.png"
                                                        alt="Search icon" /></button>
                                            </form>
                                        </div>
                                        <div class="navigator-mobile">
                                            <ul>
                                                <li class="relative"><a class="dropdown-menu-controller"
                                                        href="#">Home<span class="dropable-icon"><i
                                                                class="fas fa-angle-down"></i></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="homepages/homepage1.html">Beauty Salon</a></li>
                                                        <li><a href="homepages/homepage2.html">Makeup Salon</a></li>
                                                        <li><a href="homepages/homepage3.html">Natural Shop</a></li>
                                                        <li><a href="homepages/homepage4.html">Spa Shop</a></li>
                                                        <li><a href="homepages/homepage5.html">Mask Shop</a></li>
                                                        <li><a href="homepages/homepage6.html">Skincare Shop</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a class="dropdown-menu-controller" href="#">Shop<span
                                                            class="dropable-icon"><i
                                                                class="fas fa-angle-down"></i></span></a>
                                                    <ul class="dropdown-menu">
                                                        <ul class="dropdown-menu__col">
                                                            <li><a href="shop-fullwidth-4col.html">Shop Fullwidth 4
                                                                    Columns</a></li>
                                                            <li><a href="shop-fullwidth-5col.html">Shop Fullwidth 5
                                                                    Columns</a></li>
                                                            <li><a href="shop-fullwidth-left-sidebar.html">Shop Fullwidth
                                                                    Left Sidebar</a></li>
                                                            <li><a href="shop-fullwidth-right-sidebar.html">Shop Fullwidth
                                                                    Right Sidebar</a></li>
                                                        </ul>
                                                        <ul class="dropdown-menu__col">
                                                            <li><a href="shop-grid-4col.html">Shop grid 4 Columns</a></li>
                                                            <li><a href="shop-grid-3col.html">Shop Grid 3 Columns</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Shop Grid Sideber</a></li>
                                                            <li><a href="shop-list-sidebar.html">Shop List Sidebar</a></li>
                                                        </ul>
                                                        <ul class="dropdown-menu__col">
                                                            <li><a href="#">Product Detail</a></li>
                                                            <li><a href="cart.html">Shopping cart</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="wishlist.html">Wish list</a></li>
                                                        </ul>
                                                        <ul class="dropdown-menu__col -banner"><a
                                                                href="shop-fullwidth-4col.html"><img
                                                                    src="assets/images/header/dropdown-menu-banner.png"
                                                                    alt="New product banner.html" /></a></ul>
                                                    </ul>
                                                </li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                            </ul>
                                        </div>
                                        <div class="navigation-sidebar__footer">
                                            <select class="customed-select -borderless" name="currency">
                                                <option value="usd">USD</option>
                                                <option value="vnd">VND</option>
                                                <option value="yen">YEN</option>
                                            </select>
                                            <select class="customed-select -borderless" name="currency">
                                                <option value="en">EN</option>
                                                <option value="vi">VI</option>
                                                <option value="jp">JP</option>
                                            </select>
                                        </div>
                                        <div class="social-icons ">
                                            <ul>
                                                <li><a href="https://www.facebook.com/" style="'color: undefined'"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="https://twitter.com" style="'color: undefined'"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="https://instagram.com/" style="'color: undefined'"><i
                                                            class="fab fa-instagram"> </i></a></li>
                                                <li><a href="https://www.youtube.com/" style="'color: undefined'"><i
                                                            class="fab fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" id="quick-view-modal">
                    <div class="product-quickview">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="product-detail__slide-one">
                                    <div class="slider-wrapper">
                                        <div class="slider-item"><img src="assets/images/product/1.png"
                                                alt="Product image" /></div>
                                        <div class="slider-item"><img src="assets/images/product/2.png"
                                                alt="Product image" /></div>
                                        <div class="slider-item"><img src="assets/images/product/3.png"
                                                alt="Product image" /></div>
                                        <div class="slider-item"><img src="assets/images/product/4.png"
                                                alt="Product image" /></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="product-detail__content">
                                    <div class="product-detail__content__header">
                                        <h5>eyes</h5>
                                        <h2>The expert mascaraa</h2>
                                    </div>
                                    <div class="product-detail__content__header__comment-block">
                                        <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="far fa-star"></i></div>
                                        <p>03 review</p><a href="#">Write a reviews</a>
                                    </div>
                                    <h3>$35.00</h3>
                                    <div class="divider"></div>
                                    <div class="product-detail__content__footer">
                                        <ul>
                                            <li>Brand:gucci
                                            </li>
                                            <li>Product code: PM 01
                                            </li>
                                            <li>Reward point: 30
                                            </li>
                                            <li>Availability: In Stock</li>
                                        </ul>
                                        <div class="product-detail__colors"><span>Color:</span>
                                            <div class="product-detail__colors__item" style="background-color: #8B0000">
                                            </div>
                                            <div class="product-detail__colors__item" style="background-color: #4169E1">
                                            </div>
                                        </div>
                                        <div class="product-detail__controller">
                                            <div class="quantity-controller -border -round">
                                                <div class="quantity-controller__btn -descrease">-</div>
                                                <div class="quantity-controller__number">2</div>
                                                <div class="quantity-controller__btn -increase">+</div>
                                            </div>
                                            <div class="add-to-cart -dark"><a class="btn -round -red" href="#"><i
                                                        class="fas fa-shopping-bag"></i></a>
                                                <h5>Add to cart</h5>
                                            </div>
                                            <div class="product-detail__controler__actions"></div><a
                                                class="btn -round -white" href="#"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="modal" id="quick-view-modal">
                <div class="product-quickview">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-detail__slide-one">
                        <div class="slider-wrapper">
                          <div class="slider-item"><img src="assets/images/product/1.png" alt="Product image"/></div>
                          <div class="slider-item"><img src="assets/images/product/2.png" alt="Product image"/></div>
                          <div class="slider-item"><img src="assets/images/product/3.png" alt="Product image"/></div>
                          <div class="slider-item"><img src="assets/images/product/4.png" alt="Product image"/></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                            <div class="product-detail__content">
                              <div class="product-detail__content__header">
                                <h5>eyes</h5>
                                <h2>The expert mascaraa</h2>
                              </div>
                              <div class="product-detail__content__header__comment-block">
                                      <div class="rate"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                                <p>03 review</p><a href="#">Write a reviews</a>
                              </div>
                              <h3>$35.00</h3>
                              <div class="divider"></div>
                              <div class="product-detail__content__footer">
                                <ul>
                                  <li>Brand:gucci
                                  </li>
                                  <li>Product code: PM 01
                                  </li>
                                  <li>Reward point: 30
                                  </li>
                                  <li>Availability: In Stock</li>
                                </ul>
                                <div class="product-detail__colors"><span>Color:</span>
                                  <div class="product-detail__colors__item" style="background-color: #8B0000"></div>
                                  <div class="product-detail__colors__item" style="background-color: #4169E1"></div>
                                </div>
                                <div class="product-detail__controller">
                                        <div class="quantity-controller -border -round">
                                          <div class="quantity-controller__btn -descrease">-</div>
                                          <div class="quantity-controller__number">2</div>
                                          <div class="quantity-controller__btn -increase">+</div>
                                        </div>
                                        <div class="add-to-cart -dark"><a class="btn -round -red" href="#"><i class="fas fa-shopping-bag"></i></a>
                                          <h5>Add to cart</h5>
                                        </div>
                                  <div class="product-detail__controler__actions"></div><a class="btn -round -white" href="#"><i class="fas fa-heart"></i></a>
                                </div>
                              </div>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </body>

        </html>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>


    </main>
@endsection
