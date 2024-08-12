@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
    <main>

        @php
            $config = DB::table('configs')->first();
            $service = DB::table('services')->get();
            $produit = DB::table('produits')->get();
        @endphp

        <div id="content">
            {{-- Le hero page --}}
            <div class="slider -style-1 slider-arrow-middle">
                <div class="slider__carousel">
                    <div class="slider__carousel__item slider-1">
                        @foreach ($banners as $banner)
                            <div class="container">
                                <div class="slider-background"><img class="slider-background"
                                        src="{{ Storage::url($banner->image) }}" width="400" height="400"
                                        alt="Slider background" /></div>
                                <div class="slider-content">
                                    <h5 class="slider-content__subtitle" data-animation-in="fadeInUp"
                                        data-animation-delay="0.1">
                                        <div>
                                            <span>
                                                {{ $banner->titre ?? '' }}
                                            </span>
                                        </div>
                                    </h5>
                                    <h1 class="slider-content__title" data-animation-in="fadeInUp"
                                        data-animation-delay="0.2">
                                        <div>
                                            <p>
                                                {{ $banner->sous_titre ?? '' }}
                                            </p>
                                        </div>
                                    </h1>
                                    <div data-animation-in="fadeInUp" data-animation-out="fadeInDown"
                                        data-animation-delay="0.4"><a class="btn -red" href="/shop">Voir Shop</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endforeach

                </div>
            </div>


            {{-- fin Le hero page --}}


            {{-- Les categories --- --}}
            <div class="introduction-six">
                <div class="container">
                    <div class="section-title -center" style="margin-bottom: 1.875em">
                        <h2>catégories</h2><img src="assets/images/introduction/IntroductionOne/content-deco.png"
                            alt="Decoration" />
                    </div>
                    <div class="introduction-six__wrapper">

                        <div class="row">

                            @foreach ($categories as $key => $category)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="introduction-six__wrapper__item">
                                        <div class="introduction-six__wrapper__item__image"><img
                                                src="{{ Storage::url($category->photo) }}" width="200 " height="200 "
                                                alt="Rosehip Seed Oil" /></div>
                                        <div class="introduction-six__wrapper__item__content"><a
                                                href="/shop?id_categorie={{ $category->id }}" class="small"
                                                class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}">{{ $category->nom }}</a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin les categories}}

        {{-- A propos --}}
            <div class="introduction-eight">
                <div class="container">
                    <div class="row no-gutters align-items-center">
                        <div class="col-12 col-lg-4 order-lg-2">
                            <div class="introduction-eight__image"><img src="{{ Storage::url($config->logo) }}"
                                    width="200" height="200" alt="Introduction image" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 order-lg-1">
                            <div class="section-title " style="margin-bottom: 1.875em">
                                <h2>Pourquoi choisir Maribelle ?</h2><img
                                    src="assets/images/introduction/IntroductionOne/content-deco.png" alt="Decoration" />
                            </div>
                            <div class="introduction-eight__content">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="introduction-eight__content__item">
                                            <div class="introduction-eight__content__item__image"><img
                                                    src="assets/icons/organic.png" alt="100% Organic" /></div>
                                            <div class="introduction-eight__content__item__content">
                                                <h3>100% organique  </h3>
                                                <div>
                                                    <p>Nous croyons en une peau authentique et en un éclat naturel.</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="introduction-eight__content__item">
                                            <div class="introduction-eight__content__item__image"><img
                                                    src="assets/icons/skin.png" alt="No Synthetic Frangences" /></div>
                                            <div class="introduction-eight__content__item__content">
                                                <h3>Adapté à tous types de peau 
                                                </h3>
                                                <p>Nos produits conviennent à tous les types de peau, même les plus sensibles.
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="introduction-eight__content__item">
                                            <div class="introduction-eight__content__item__image"><img
                                                    src="assets/icons/artificial.png" alt="No Synthetic Colors" /></div>
                                            <div class="introduction-eight__content__item__content">
                                                <h3>Sans colorants synthétiques
                                                </h3>
                                                <p>Nous privilégions la transparence et utilisons la couleur pour mettre en valeur la pureté de nos produits naturels.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="introduction-eight__content__item">
                                            <div class="introduction-eight__content__item__image"><img
                                                    src="assets/icons/store.png" alt="No Animal Testing" /></div>
                                            <div class="introduction-eight__content__item__content">
                                                <h3>Fabriqué localement</h3>
                                                <p>Nos produits sont fabriqués localement pour soutenir l'économie locale et réduire notre empreinte carbone
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- fin a propos --}}

            {{-- Les produits --}}
            <div class="product-slide">
                <div class="container">
                    <div class="section-title -center" style="margin-bottom: 1.875em">
                        <h2>Nos produits</h2><img src="assets/images/introduction/IntroductionOne/content-deco.png"
                            alt="Decoration" />
                    </div>
                    <div class="product-slider">
                        <div class="product-slide__wrapper">


                            @if ($produits)


                                @foreach ($produits as $key => $produit)
                                    <div class="product-slide__item">
                                        <div class="product ">
                                            <div class="product-type"></div>
                                            <div class="product-thumb"><a class="product-thumb__image"
                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}"><img
                                                        src="{{ Storage::url($produit->photo) }}" width="300 "
                                                        height="300 " border-radius="8px" alt="Product image" /></a>
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
                                                                class="btn -white product__actions__item -round"
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


                                                </div> <a class="product-name"
                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}
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
                                                </a>
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
                                    </div>
                                @endforeach
                            @endif


                        </div>
                        <div class="text-center"><a class="btn -transparent -underline" href="{{ url('shop') }}">Voir
                                tous les produits</a>
                        </div>
                    </div>
                </div>
            </div>


            {{-- le modal pour les details produit - --}}


        </div>




        {{-- fin modat détail produits--- }}
    {{-- Fin Produits --}}



        {{-- Les services --}}
        <div class="cta -style-1" style="background-image: url(&quot;assets/images/cta/CTAOne/1.webp&quot;)">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 mx-auto">
                        <div class="cta__form">
                            <div class="section-title " style="margin-bottom: 1.875em">
                                <h1>Contactez nous</h1><img
                                    src="assets/images/introduction/IntroductionOne/content-deco.png" alt="Decoration" />
                            </div>

                            @if (session('message'))
                                <h6 class="alert alert-success">
                                    {{ session('message') }}
                                </h6>
                            @endif
                            <form class="cta__form__detail validated-form" method="post"
                                action="{{ route('contacts.store') }}">
                                @csrf
                                <div class="input-validator">
                                    <input type="text" placeholder="Votre nom" name="name" required="required" />
                                </div>
                                <div class="input-validator">
                                    <input type="text" placeholder="Votre Email" name="phone"
                                        required="required" />
                                </div>

                                <div class="input-validator">
                                    <input name="sujet" type="text" {{-- value="{{ old('sujet') }}" --}} placeholder="Sujet">
                                    @error('sujet')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                                <div class="input-validator">
                                    <textarea name="message" rows="10" cols="30" placeholder="Votre message"></textarea>
                                    @error('message')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <button class="btn -light-red">Envoyez
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <br><br>
        <br>
        <br><br>
        <br><br>


        <div class="mb-100">
            <div class="benefits">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="benefits__item">
                                <div class="benefits__item__icon"><img src="assets/images/benefits/1.png"
                                        alt="Free Shipping" /></div>
                                <div class="benefits__item__content">
                                    <h5>Livraison gratuite</h5>
                                    <p>Livraison gratuite sur toute commande</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="benefits__item">
                                <div class="benefits__item__icon"><img src="assets/images/benefits/2.png"
                                        alt="Valuable Gifts" /></div>
                                <div class="benefits__item__content">
                                    <h5>Cadeaux précieux</h5>
                                    <p>Cadeau gratuit toutes les 10 commandes</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="benefits__item">
                                <div class="benefits__item__icon"><img src="assets/images/benefits/3.png"
                                        alt="All Day Support" /></div>
                                <div class="benefits__item__content">
                                    <h5>Assistance toute la journée</h5>
                                    <p>Appelez-nous: {{ $config->telephone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="benefits__item">
                                <div class="benefits__item__icon"><img src="assets/images/benefits/4.png"
                                        alt="Seasonal Sale" /></div>
                                <div class="benefits__item__content">
                                    <h5>Vente saisonnière</h5>
                                    <p>Réductions jusqu'à 50% sur tout</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!--endbuild-->




    </main>


@endsection
