@extends('front.fixe')
@section('titre', $produit->nom)
@section('body')

    <head>
    @section('header')
        <meta name="author" content="beautyars.shop">
        <meta property="og:title" content="{{ $produit->nom }}">
        <meta property="og:description" content="{{ $produit->description ?? '' }}">
        <meta property="og:image" content="{{ $produit->photo }}">
        <meta property="og:type" content="product">
        <meta property="og:price:amount" content="{{ $produit->prix }} DT">

        <meta property="og:availability" content="{{ $produit->statut }}">

        <meta property="product:price:amount" content="{{ $produit->prix }} DT">

        <meta property="product:availability" content="{{ $produit->statut }}">
        <meta name="robots" content="index, follow">
    @endsection
</head>

<main>



    <div id="content">
        <div class="breadcrumb">
            <div class="container">
                <h2>Shop</h2>
                <ul>
                    <li>Home</li>
                    <li>Shop</li>
                    <li class="active">Détail sur le produit</li>
                </ul>
            </div>
        </div>
        <div class="shop">
            <div class="container">
                <div class="product-detail__wrapper">
                    @if($produit)
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="product-detail__slide-two">
                                <div class="product-detail__slide-two__big">
                                    <div class="slider__item">
                                        <img src="{{ Storage::url($produit->photo) }}" width="300 " height="300 "
                                            border-radius="8px" alt="Product image" />


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

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="product-detail__content">
                                <div class="product-detail__content">
                                    <div class="product-detail__content__header">

                                        <h2>{{ $produit->nom }}</h2>
                                    </div>
                                    <div class="product-detail__content__header__comment-block">

                                    </div>
                                    <h3>
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
                                    </h3>
                                    <div class="divider"></div>
                                    <div class="product-detail__content__footer">


                                        <ul>
                                            @if ($produit->stock > 0)
                                                <label class="badge bg-success"> Stock disponible</label>
                                            @else
                                                <label class="badge bg-danger"> Stock non disponible</label>
                                            @endif
                                             
                                            <li>Categorie:<span> {{ Str::limit($produit->categories->nom, 30) }}</span>
                                            </li>
                                        </ul>

                                    </div>
                                    <style>
                                        input {

                                            left: 10px;
                                            top: 10px;
                                            width: 50px;
                                            height: 20px;

                                            padding: 2px;
                                            font-size: 12pt;
                                            border: solid 0px #f7f4f4;
                                            z-index: 1;
                                            text-align: left;
                                        }
                                    </style>
                                    <div class="product-detail__controller">
                                        <div class="quantity-controller -border -round">
                                            <div class="quantity-controller__btn -descrease tp-cart-minus">-</div>
                                            <div class="quantity-controller__number">
                                                <input type="text" value="1" id="qte-{{ $produit->id }}">

                                            </div>
                                            <div class="quantity-controller__btn -increase tp-cart-plus">+</div>
                                        </div>
                                        <div class="add-to-cart -dark">
                                            <button type="button" class="btn -round -red"
                                                onclick="AddToCart( {{ $produit->id }} )">
                                                <i class="fas fa-shopping-bag"></i>
                                            </button>
                                            <h5>Ajouter au panier</h5>
                                        </div>
                                        <script>
                                            $('.tp-cart-minus').on('click', function() {
                                                var $input = $(this).parent().find('input');
                                                var count = parseInt($input.val()) - 1;
                                                count = count < 1 ? 1 : count;
                                                $input.val(count);
                                                $input.change();
                                                return false;
                                            });

                                            $('.tp-cart-plus').on('click', function() {
                                                var $input = $(this).parent().find('input');
                                                $input.val(parseInt($input.val()) + 1);
                                                $input.change();
                                                return false;
                                            });
                                        </script>


                                        <div class="product-detail__controler__actions"></div>
                                        @if (Auth()->user())
                                            <button type="button" class="btn -round -white"
                                                onclick="AddFavoris({{ $produit->id }})">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                                </svg>

                                            </button>
                                        @endif



                                    </div>
                                    <div class="divider"></div>
                                    <div class="product-detail__content__tab">
                                        <ul class="tab-content__header">
                                            <li class="tab-switcher" data-tab-index="0" tabindex="0">Description</li>

                                        </ul>
                                        <div id="allTabsContainer">
                                            <div class="tab-content__item -description" data-tab-index="0">
                                                <p>{{ $produit->description }}</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                  
                </div>
            </div>
        </div>
    </div>


</main>
@endsection
