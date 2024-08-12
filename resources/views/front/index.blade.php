@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
    <main>

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

        <!-- Slider Section Start -->
        <div id="rs-slider" class="rs-slider home-slider slider-navigation">

            <div class="slider-carousel owl-carousel">
                @foreach ($banners as $banner)
                    <div class="single-slider slide2"
                        style="background-image: url('{{ Storage::url($banner->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <div class="container">
                            <div class="image-part common">
                                <div class="image-wrap">
                                    <img class="player animate5"src="{{ Storage::url($banner->image) }}" alt="">
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
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
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
                            background-image: url('{{ Storage::url($lastVideo->image) }}');
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
                                            <img class="size-80" src="{{ Storage::url($lastVideo->image) }}"
                                                alt="Valencia">
                                            <div class="name white-color">{{ $lastVideo->titre ?? '' }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    {{--  <div class="col-lg-8 pl-30 col-padding-md">
                        <div class="rs-video big-space bg2 bdru-4 text-center">
                            <div class="video-contents">
                               
                                <video id="current_video" class="w-100"
                                    poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg"
                                    id="plyr-video-player" playsinline controls>
                                    <source src="{{ Storage::url($lastVideo->video) }}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-lg-8 pl-30 col-padding-md">
                        <div class="rs-video rs-upcoming-match big-space bg1 bdru-4 text-center">
                            <div class="video-contents">
                                <a class="popup-videos play-btn"onclick="playVideoInSmallPlayer('{{ Storage::url($lastVideo->video) }}')"
                                    {{--  onclick="openModal('{{ Storage::url($lastVideo->video) }}')" --}} {{-- href="https://www.youtube.com/watch?v=t17O6JoU2Ew" --}}><i class="fa fa-play"></i></a>
                                <h3 class="title white-color mt-18 mb-0">{{ $lastVideo->tittre }}</h3>
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


            <div class="container">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
                    data-autoplay-timeout="8000" data-smart-speed="2000" data-dots="false" data-nav="true"
                    data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false"
                    data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false"
                    data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false"
                    data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true"
                    data-md-device-dots="false">
                    @foreach ($latestVideos as $latestVideo)
                        <div class="items"
                            style="background-image: url('{{ Storage::url($latestVideo->image ?? 'path/to/default-image.jpg') }}');padding:2px;  width: 200px;
    height: 150px; background-size: cover; background-position: center;">
                            <a onclick="playVideoInSmallPlayer('{{ Storage::url($latestVideo->video) }}')">
                                <div class="vanues">
                                    <div class="stadium" id="views-{{ $latestVideo->id }}">{{ $latestVideo->titre }}
                                    </div>
                                </div>
                                <div class="teams">
                                    <div class="logo">
                                        {{-- <img class="size-80"
                                            src="{{ Storage::url($latestVideo->image ?? 'path/to/default-image.jpg') }}"
                                            alt="Video Image"> --}}
                                    </div>
                                    <div class="logo">
                                        {{-- <img class="size-80"
                                            src="{{ Storage::url($latestVideo->image ?? 'path/to/default-image.jpg') }}"
                                            alt="Video Image"> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach




                </div>
            </div>
        </div>


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

        <!-- Match Gallery Start -->
        <div class="rs-gallery style1 pt-92 pb-100 md-pt-72 md-pb-80">
            <div class="container">
                <div class="title-style text-center mb-50 md-mb-30">
                    <h2 class="margin-0 uppercase">Notre gallerie</h2>
                    <span class="line-bg y-b pt-10"></span>
                </div>
                <div class="row pl-15 pr-15">
                    @foreach ($images as $image)
                        <div class="col-lg-4 col-md-6 padding-0 sm-mb-30">
                            <div class="gallery-grid">
                                <img src="{{ Storage::url($image->image) }}" width="200" height="200"
                                    alt="Gallery Image">
                                <a class="image-popup view-btn" href="{{ Storage::url($image->image) }}">
                                    <i class="flaticon-add-circular-button"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
        <!-- Match Gallery End -->


        <div class="rs-sponsor pb-35 md-pb-60 sm-pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                        <div class="row">
                            @foreach ($sponsors as $sponsor)
                                @if ($sponsors)
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="logos">
                                            <a href="#"><img src="{{ Storage::url($sponsor->image) }}"alt=""></a>
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
