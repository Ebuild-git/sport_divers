@extends('front.fixe')
@section('titre', 'Contact')
@section('body')
    <main>

        @php
            $config = DB::table('configs')->first();

        @endphp


        <!-- Breadcrumbs Section Start -->
        {{--    <div class="rs-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <img src="images/breadcrumbs/inner4.jpg" alt="Breadcrumbs Image">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title mb-17">A propos de nous</h1>
                            <div class="categories">
                                <ul>
                                    <li><a href="{{ route('home') }}">Accueil</a></li>
                                    <li class="active">Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Breadcrumbs Section End -->

        <!-- Contact Section Start -->
        <div class="rs-contact">


            <!-- About Us Section Start -->
            <div class="rs-about pt-92 pb-78 md-pt-64 md-pb-58">
                <div class="container">
                    <div class="row rs-vertical-middle">
                        <div class="col-lg-5 pl-40 col-padding-md md-mb-25">
                            <div class="contant-part">
                                <div class="title-style mb-14">
                                    <div class="sub-title black-color mb-10">Bienvenu a Sport Divers</div>
                                    <h2 class="margin-0 uppercase">{{ $config->titre_apropos }}</h2>
                                </div>
                                <div class="description">
                                    {{ $config->des_apropos }}
                                </div>

                                <div class="read-btn mt-39">
                                    <a class="readon" href="{{ route('contact') }}">Contact</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 margin-0 pl-50 col-padding-md">

                            <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="3000">
                                <div class="carousel-inner">
                                    @if ($config && $config->photos)
                                        @foreach (json_decode($config->photos, true) as $index => $photo)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img src="{{ Storage::url($photo) }}" class="d-block " alt="Image">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <p class="text-center">Aucune image disponible</p>
                                        </div>
                                    @endif
                                </div>
                                <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Précédent</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Suivant</span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>


            </div>


        </div>






    </main>
@endsection
