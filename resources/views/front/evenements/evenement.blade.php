@extends('front.fixe')
@section('titre', 'Contact')
@section('body')
    <main>

        @php
            $config = DB::table('configs')->first();

        @endphp

        <!--Preloader area End here-->


        <!--Full width header End-->

        <!-- Breadcrumbs Section Start -->

        <style>
            .rs-breadcrumbs .breadcrumbs-wrap {
            background-image: url('{{ asset('assets/contact/1.png') }}');
            background-size: contain; /* Ajuste l'image pour qu'elle soit entièrement visible sans la découper */
            background-repeat: no-repeat; /* Empêche l'image de se répéter */
            background-position: center; /* Centre l'image dans l'élément */
            height: 300px; /* Ajustez cette valeur pour réduire la hauteur du conteneur */
            width: 100%; /* Assurez que l'élément prend toute la largeur disponible */
        }
        
        </style>
        
        <div class="rs-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <img src="assets/contact/2.png"  height="1920" width="520"  alt="Breadcrumbs Image">
                <div class="breadcrumbs-inner">
                    <div class="container">
                        <div class="breadcrumbs-text">
                            <h1 class="breadcrumbs-title mb-17">Evènements</h1>
                            <div class="categories">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Evenements</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs Section End -->

        <!-- Blog Section Start -->
        <div class="rs-blog style2 sec-bg pt-100 md-pt-80 md-pb-80">
            <div class="container">
                <div class="pb-100 md-pb-74">
                    <div class="row">
                        <div class="col-lg-9 md-mb-50">
                            @foreach ($events as $event)
                                @if ($events)
                                    <div class="blog-item mb-70">
                                        <div class="blog-img">
                                            <div class="image-wrap">
                                                <a href="#"><img src="{{ Storage::url($event->image ?? ' ') }}"  height="740" width="1200"
                                                        alt=""></a>
                                            </div>
                                            <div class="all-meta">
                                                <div class="meta meta-date">
                                                    {{-- span class="month-day">25</span>
                                            <span class="month-name">May</span> --}}
                                                    {{ $event->created_at }}
                                                </div>
                                                {{--   <div class="meta meta-author">
                                            <i class="flaticon-user-1"></i>
                                            <span class="author">admin</span>
                                        </div> --}}
                                                {{--   <div class="meta meta-folder">
                                            <i class="flaticon-folder"></i>
                                            <span class="author"><a href="#">Latest News</a></span>
                                        </div> --}}
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="blog-title">
                                                <a href="#">{{ $event->titre ?? ' ' }}</a>
                                            </h3>
                                            <div class="blog-desc">{{ $event->description ?? ' ' }}</div>
                                           {{--  <div class="read-button">
                                                <a href="#">Continue Reading</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach



                        </div>
                        <div class="col-lg-3 pl-40 md-pl-15">
                            <div class="cl-sidebar">
                                <div class="cl-search">
                                    <form class="h-search">
                                        <input type="text" placeholder="Search...">
                                        <span>
                                            <button type="submit"><i class="flaticon-search"></i></button>
                                        </span>
                                    </form>
                                </div>

                                <div class="cl-recentpost mb-30">
                                    <h4 class="cl-widget-title">Les derniers évènements</h4>
                                    <ul>
                                        @foreach ($lastevents as $lastevent )
                                        @if ($lastevents)
                                        <li><a href="#">{{ $lastevent->titre ?? ' ' }}</a></li>
                                        @endif
                                       
                                        @endforeach
                                     
                                     
                                    </ul>
                                </div>






                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

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


    </main>
@endsection
