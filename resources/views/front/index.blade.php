@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
    <main>
     <!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        @php
            $config = DB::table('configs')->first();

        @endphp
        <style>
            .slide2 {
                background-size: cover;

                background-position: center;

                background-repeat: no-repeat;

            }
        </style>

        <style>
            
.rs-banner.home5banner {
    background-image: url('{{ asset('assets/contact/1.png') }}');

}
        </style>

<div id="rs-slider" class="rs-slider home-slider slider-navigation">

    <div class="slider-carousel owl-carousel">
        @foreach ($banners as $banner)
        <div class="single-slider slide2"
            style="background-image: url('{{ Storage::url($banner->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="container">
                <div class="image-part common">
                    {{-- <div class="image-wrap">
                        <img class="player animate5" src="{{ Storage::url($banner->image) }}" alt="">
                        <img class="ball animate6" src="{{ Storage::url($banner->image) }}" alt="">
                    </div> --}}
                </div>
                <div class="text-part common">
                    <h2 class="sub-title"> {{ $banner->titre ?? '' }}</h2>
                    <h1 class="title"><span class="primary-color">Sport</span> Divers</h1>
                    <div class="desc"> <br> {{ $banner->sous_titre ?? '' }}</div>
                    <div class="slider-btn">
                        <a class="readon" href="{{ route('contact') }}">Contactez nous</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
     {{-- 
     <div id="rs-banner" class="rs-banner home5banner">
        <div class="container">
            <div id="rs-banner-slide"> 
                @foreach($banners as $banner) 
                <div class="item" style="background-image: url('{{ asset('storage/' . $banner->image) }}'); background-size:cover; background-position: center; width: 800px; height: 800px;">
    
                    <div class="bl-meta">
                        <span class="cat"><a href="#">{{ $banner->titre }}</a></span>
                      
                    </div>
                    <div class="heading-block pb-25">
                        <h4 class="feature-title"><a href="#">{{ $banner->sous_titre }}</a></h4>
                    </div>
                </div>
                @endforeach
              
            </div>
        </div>
    </div> --}}
    
        <!-- Slider Section Start -->
       {{--   <div id="rs-slider" class="rs-slider home-slider slider-navigation">

            <div class="slider-carousel owl-carousel">
                @foreach ($banners as $banner)
                    <div class="single-slider slide2"
                        style="background-image: url('{{ Storage::url($banner->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <div class="container">
                            <div class="image-part common">
                                <div class="image-wrap">
                                    <img class="player animate5" src="{{ Storage::url($banner->image) }}" alt="">
                                    <img class="ball animate6" src="{{ Storage::url($banner->image) }}" alt="">
                                </div>
                            </div>
                            <div class="text-part common">
                                <h2 class="sub-title"> {{ $banner->titre ?? '' }}</h2>
                                <h1 class="title"><span class="primary-color">Sport</span> Divers</h1>
                                <div class="desc"> <br> {{ $banner->sous_titre ?? '' }}</div>
                                <div class="slider-btn">
                                    <a class="readon" href="{{ route('contact') }}">Contactez nous</a>
                                </div>
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
                @endforeach

            </div>
        </div>  --}}
        <!-- Slider Section End -->


        <!-- About Us Section Start -->
        <div class="rs-about pt-92 pb-78 md-pt-64 md-pb-58">
            <div class="container">
                <div class="row rs-vertical-middle">
                    <div class="col-lg-5 pl-40 col-padding-md md-mb-25">
                        <div class="contant-part">
                            <div class="title-style mb-14">
                                <div class="sub-title black-color mb-10"></div>
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
        <!-- About Us Section End -->
        <!-- About Us Section End -->
        <!-- Upcomming Match & Video Section Start -->
        <div class="couter-and-upcomming pt-100 md-pt-80 mb-30">
            <div class="container">

                <div class="row">


                    <style>
                        .rs-upcoming-match.bg1 {
                            background-image: url('{{ Storage::url($lastVideo->image ?? ' ') }}');
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;

                        }
                    </style>
                    <div class="col-lg-4 pr-0 col-padding-md md-mb-30">
                        <div class="rs-upcoming-match bg1 text-center">
                            <div class="title-style">
                                <h4 class="margin-0 white-color">Evènement à venir</h4>
                                <span class="line-bg pt-18 y-w"></span>
                            </div>

                            <div class="teams mt-25 md-mt-50">
                                <div class="row rs-vertical-middle">
                                    <div class="col-md-4 col-sm-4 col-4">
                                        <div class="team-logo">
                                            <img class="size-80" src="{{ Storage::url($lastVideo->image ?? ' ') }}"
                                                alt="Valencia">
                                            <div class="name white-color">{{ $lastVideo->titre ?? '' }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-8 pl-30 col-padding-md">
                        <div class="rs-video rs-upcoming-match big-space bg1 bdru-4 text-center">
                            <div class="video-contents">
                                <a class="popup-videos play-btn"
                                    onclick="playVideoInSmallPlayer('{{ Storage::url($lastVideo->video ?? '') }}')"><i
                                        class="fa fa-play"></i></a>
                                <h3 class="title white-color mt-18 mb-0">{{ $lastVideo->tittre ?? '' }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Petit Lecteur Vidéo Fixe -->
        <div id="smallVideoPlayer" class="small-video-player">
            <video id="smallVideo" controls></video>
            <button class="close-btn" onclick="closeSmallVideoPlayer()">X</button>
        </div>

        <script>
            function playVideoInSmallPlayer(videoUrl) {
                var player = document.getElementById('smallVideoPlayer');
                var video = document.getElementById('smallVideo');
                video.src = videoUrl;
                player.style.display = 'block';


                fetch(`/video/view/${videoId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF protection
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Update the view count on the page
                        document.getElementById(`views-${videoId}`).innerText = data.views + ' vues';
                    })
                    .catch(error => console.error('Error:', error));
            }



            function closeSmallVideoPlayer() {
                var player = document.getElementById('smallVideoPlayer');
                var video = document.getElementById('smallVideo');
                video.pause();
                video.src = '';
                player.style.display = 'none';
            }
        </script>

        <style>
            .small-video-player {
                display: none;
                position: fixed;
                bottom: 20px;
                width: 500px;
                /* Augmentation de la largeur */
                height: 300px;
                /* Augmentation de la hauteur */
                right: 20px;
                width: 300px;
                background-color: #000;
                border-radius: 10px;
                overflow: hidden;
                z-index: 1000;
            }

            .small-video-player video {
                width: 100%;
                height: 100%;
                /* S'assurer que la vidéo occupe toute la hauteur du lecteur */
            }

            .small-video-player .close-btn {
                position: absolute;
                top: 5px;
                right: 5px;
                background-color: red;
                color: white;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                width: 30px;
                height: 30px;
                text-align: center;
                line-height: 25px;
            }
        </style>

        <!-- Match Result Section Start -->
        <div class="rs-match-result style1 nav-style pb-100 md-pb-80">

            <style>
                .rs-carousel .owl-item {
                    margin-right: 0px;
                    /* Ajustez cette valeur selon vos besoins */
                    padding: 0;
                }

                .rs-carousel .items {
                    padding: 0;
                    margin: 0;
                }
            </style>
            <br><br>


            <div class="rs-match-result style1 nav-style pb-100 md-pb-80">
                <div class="container">
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                        data-autoplay="true" data-autoplay-timeout="8000" data-smart-speed="2000" data-dots="false"
                        data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false"
                        data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false"
                        data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false"
                        data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true"
                        data-md-device-dots="false">
                        @foreach ($latestVideos as $latestVideo)
                            {{--  <div class="rs-video big-space  bdru-4 text-center" style="background-image: url('{{ Storage::url($latestVideo->image ?? '') }}'); background-size: cover; background-position: center; width: 300px; height: 200px; padding: 0px;">
                    <div class="video-contents">
                        <a class="popup-videos play-btn"
                            onclick="playVideoInSmallPlayer('{{ Storage::url($latestVideo->video ?? '') }}')">
                            <i class="fa fa-play"></i>
                        </a>
                        <h3 class="title white-color mt-18 mb-0">{{ $latestVideo->titre ?? '' }}</h3>
                    </div>
                </div> --}}
                            <div class="rs-video   bdru-4 text-center p-10"
                                style="background-image: url('{{ Storage::url($latestVideo->image ?? '') }}'); background-size: cover; background-position: center; width: 400px; height: 300px; padding: 0px;">

                                <div class="video-contents">
                                    <a class="popup-videos play-btn"
                                        onclick="playVideoInSmallPlayer('{{ Storage::url($latestVideo->video ?? '') }}')">
                                        <i class="fa fa-play"></i>
                                    </a>
                                    <h3 class="title white-color">{{ $latestVideo->titre ?? '' }}</h3>
                                </div>
                            </div>

                          




                            {{-- <div id="views-{{ $latestVideo->id }}" class=" items" style="background-image: url('{{ Storage::url($latestVideo->image) }}'); background-size: 150%;  background-position: center; padding: 0;width: 400px; height: 300px;">
   
                <a id="views-{{ $latestVideo->id }}" onclick="playVideoInSmallPlayer('{{ Storage::url($latestVideo->video) }}')">
                  
                    <div class="stadium" id="views-{{ $latestVideo->id }}">{{ $latestVideo->titre }}
                    </div>
                    <div class="teams">
                        <div class="logo">
                            <img  id="views-{{ $latestVideo->id }}" class="size-80"  alt="">
                            <div class="name"></div>
                        </div>
                        <div class="score"></div>
                        <div class="logo">
                            <img  id="views-{{ $latestVideo->id }}"class="size-80" alt="">
                            <div class="name"></div>
                        </div>
                    </div>
                </a>
            </div> --}}
                        @endforeach

                    </div>
                </div>
            </div>
            <br>
            <br>
            <style>
                .rs-counter.bg5 {
                    background-image: url('/assets/counter/1.png');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    margin-top: -30px;
                    /* Réduction de l'espace avec le header */
                    padding-top: 50px;
                    padding-bottom: 30px;
                }
            </style>

            <div class="rs-counter bg5 style1 pt-103 pb-92 md-pt-80 md-pb-70 sm-pt-73">
                <div class="container">
                    <div class="rs-count">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 md-mb-30">
                                <div class="rs-counter-list text-center">
                                    <h2 class="counter-number primary-color">{{ $config->coach }}</h2>
                                    <h3 class="counter-text uppercase white-color"> Coachs</h3>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 md-mb-30">
                                <div class="rs-counter-list text-center">
                                    <h2 class="counter-number primary-color">{{ $config->seance }}</h2>
                                    <h3 class="counter-text uppercase white-color">Séances</h3>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="rs-counter-list text-center">
                                    <h2 class="counter-number primary-color">{{ $config->adherent }}</h2>
                                    <h3 class="counter-text uppercase white-color">Adhérents</h3>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="rs-counter-list text-center">
                                    <h2 class="counter-number primary-color">{{ $config->tounoir }}</h2>
                                    <h3 class="counter-text uppercase white-color">Tounoirs</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counter Section End -->


            <!-- Team Pyaler Section Start -->
            <div class="rs-team style1 nav-style pt-92 pb-100 md-pt-72 md-pb-80">
                <div class="container">
                    <div class="title-style text-center mb-50 md-mb-30">
                        <h2 class="margin-0 uppercase">Le coachs</h2>
                        <span class="line-bg y-b pt-10"></span>
                    </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                        data-autoplay="true" data-autoplay-timeout="8000" data-smart-speed="2000" data-dots="false"
                        data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false"
                        data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false"
                        data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false"
                        data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true"
                        data-md-device-dots="false">

                        @foreach ($coachs as $coach)
                            @if ($coachs)
                                <div class="player-item">
                                    {{--    <div class="player-img">
                        <img src="{{ Storage::url($coach->photo ?? ' ')  }}"  height="300" width="250" alt="">
                    </div> --}}
                                    <div class="player-img" style="width: 400px; height: 500px; overflow: hidden;">
                                        <img src="{{ $coach->photo ? Storage::url($coach->photo) : asset('images/default-avatar.png') }}"
                                            style="width: 100%; height: 100%; object-fit: cover;" alt="Photo du coach">
                                    </div>

                                    <div class="detail-wrap">
                                        <div class="person-details">
                                            <h3 class="player-title"><span class="squad-numbers"></span>
                                                <a href="#">{{ $coach->nom }} {{ $coach->prenom }}</a>
                                                <span class="player-position">Coach</span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                    </div>
                </div>
            </div>
            <!-- Team Pyaler Section End -->

            <div class="rs-gallery style1 pt-92 pb-100 md-pt-72 md-pb-80">
                <div class="container">
                    <div class="title-style text-center mb-50 md-mb-30">
                        <h2 class="margin-0 uppercase">Notre gallerie</h2>
                        <span class="line-bg y-b pt-10"></span>
                    </div>
                    <div class="row pl-15 pr-15">
                        @foreach ($images as $image)
                            <div class="col-lg-4 col-md-6 padding-0 sm-mb-30">
                                <div class="gallery-grid"
                                    style="background-image: url('{{ Storage::url($image->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                    <a class="image-popup view-btn" href="{{ Storage::url($image->image) }}">
                                        <i class="flaticon-add-circular-button"></i>
                                    </a>
                                </div>
                            </div>
                            <style>
                                .gallery-grid {
                                    position: relative;
                                    overflow: hidden;
                                    height: 250px;
                                    /* Vous pouvez ajuster cette hauteur selon vos besoins */
                                }

                                .view-btn {
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    color: white;
                                    font-size: 2px;
                                    /*  background-color: rgba(0, 0, 0, 0.6); */
                                    padding: 10px;
                                    border-radius: 50%;
                                    display: none;
                                }

                                .gallery-grid:hover .view-btn {
                                    display: block;
                                }
                            </style>
                        @endforeach





                    </div>
                </div>
            </div>


            <div class="rs-sponsor pb-35 md-pb-60 sm-pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                            <div class="row">
                                @foreach ($sponsors as $sponsor)
                                    @if ($sponsors)
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="logos">
                                                <a href="#"><img src="{{ Storage::url($sponsor->image) }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach




                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sponsor Logo Section End -->

    </main>


@endsection
