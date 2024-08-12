@extends('front.fixe')
@section('titre', 'Shop')
@section('body')


    <main>
      
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
                                                class="fas fa-th"></i></a><a href="#"><i class="fas fa-bars"></i></a>
                                    </div>
                                    <h5 class="shop-header__page"></h5>
                                </div>
                          
                                <select class="customed-select" name="sort_by" id="sort_by"
                                    onchange="window.location.href=this.value;">
                                    <option value="{{ url('shop') }}">Default</option>
                                    <option value="{{ url('croissant') }}">Croissant</option>

                                    <option value="{{ url('decroissant') }}">Décroissant</option>
                                    
                                    
                                 
                                </select>
                            </div>
                            <br> <br>
                            <br><br>
                            <div class="shop-products">
                                <div class="shop-products__gird">
                                    <div class="row">
                                        @if($produits)
                                            
                                      
                                        @forelse ($produits as $key => $produit)
                                            <div class="col-12 col-sm-6 col-lg-4">
                                                <div class="product ">
                                                    <div class="product-type">
                                                     
                                                    </div>
                                                    <div class="product-thumb"><a class="product-thumb__image"
                                                          
                                                            href="{{ route('details-produits', ['id' => $produit->id, 'slug'=>Str::slug(Str::limit($produit->nom, 10))]) }}"
                                                           ><img
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

                                                            </div>
                                                            <div class="product-btn">
                                                                @if (Auth()->user())
                                                                <button type="button"
                                                                    class="btn product__actions__item -round"
                                                                    onclick="AddFavoris({{ $produit->id }})">
                                                                   
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
                                                    <div class="product-content">
                                                        <div class="product-content__header">

                                                       
                                                        </div><a class="product-name"
                                                          
                                                           
                                                            href="{{ route('details-produits', ['id' => $produit->id, 'slug'=>Str::slug(Str::limit($produit->nom, 10))]) }}"
                                                           >{{ $produit->nom }}</a>
                                                        <div class="product-content__footer">
                                                            <h5 class="product-price--main"
                                                                style="text-decoration-color: #8B0000">
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
                                                                        {{ $produit->getPrice() }} DT
                                                                @endif
                                                        </div>

                                                        </h5>
                                                        <div class="product-colors">
                                                          
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
                                <div class="row search-result">
                                    @if($produits)
                                        
                                 
                                    @forelse ($produits as $key => $produit)
                                        <div class="col-12">
                                            <div class="product-list">
                                                <div class="product-list-thumb">
                                                    <div class="product-type">
                                                      
                                                    </div>
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
                                                        </div>
                                                        <a class="product-name"
                                                          
                                                             href="{{ route('details-produits', ['id' => $produit->id, 'slug'=>Str::slug(Str::limit($produit->nom, 10))]) , }}">{{ $produit->nom }}
                                                            
                                                        </a>
                                                        <div class="product__price">
                                                            <div class="product__price__wrapper">
                                                                <h6 class="product-price--main">
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
                                                                </h6>
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
                                                                    <h5>Add to cart</h5>
                                                                </div>


                                                            </div>
                                                            <div class="product-btn">{{-- <a data-toggle="modal" data-target="#{{$produit->id}}" id="modal" title="Quick View"
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

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-one">


            <div class="modal" id="quick-view-modal">
            
                <div class="product-quickview">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="product-detail__slide-one">
                                <div class="slider-wrapper">
                                 
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product-detail__content">
                                <div class="product-detail__content__header">

                                </div>
                                <div class="product-detail__content__header__comment-block">
                                    
                                </div>
                                <h3>
                                 
                                </h3>
                                <div class="divider"></div>
                                <div class="product-detail__content__footer">
                                  
                                </div>
                                <div class="product-detail__controller">
                                    <div class="quantity-controller -border -round">
                                        <div class="quantity-controller__btn -descrease">-</div>
                                        <div class="quantity-controller__number">2</div>
                                        <div class="quantity-controller__btn -increase">+</div>
                                    </div>
                                   
                                    <div class="product-detail__controler__actions">
                                        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>


    </main>
@endsection
