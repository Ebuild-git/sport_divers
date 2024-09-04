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
                background-size: contain;
                /* Ajuste l'image pour qu'elle soit entièrement visible sans la découper */
                background-repeat: no-repeat;
                /* Empêche l'image de se répéter */
                background-position: center;
                /* Centre l'image dans l'élément */
                height: 300px;
                /* Ajustez cette valeur pour réduire la hauteur du conteneur */
                width: 100%;
                /* Assurez que l'élément prend toute la largeur disponible */
            }
        </style>

        <div class="rs-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <img src="assets/contact/2.png" height="1920" width="520" alt="Breadcrumbs Image">
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
                                                <a href="#"><img src="{{ Storage::url($event->image ?? ' ') }}"
                                                        height="1200" width="1000" alt=""></a>
                                            </div>
                                            <div class="all-meta">

                                                <div class="meta meta-date">
                                                    <span class="month-day">{{ $event->created_at->format('d') }}</span>
                                                    <span
                                                        class="month-name">{{ $event->created_at->translatedFormat('F') }}</span>
                                                </div>

                                                {{--  <div class="meta meta-date">
                                                     span class="month-day">25</span>
                                            <span class="month-name">May</span> 
                                                   
                                                </div> --}}
                                                {{--   <div class="meta meta-author">
                                            <i class="flaticon-user-1"></i>
                                            <span class="author">admin</span>
                                        </div> --}}
                                                <div class="meta meta-folder">
                                                    {{--   <i class="flaticon-folder"></i> --}}

                                                    {{-- <span class="author"><a href="#">Date fin évènement: {{ $event->end ?? ' ' }}</a></span> --}}
                                                    {{-- <span class="author">
                                                <a href="#" style="color: #2010f4;">Date fin évènement: {{ $event->end ? $event->end : 'En cours' }}</a>
                                            </span> --}}
                                                    {{--  @php
                                                        $now = \Carbon\Carbon::now(); 
                                                        $endDate = $event->end
                                                            ? \Carbon\Carbon::parse($event->end)
                                                            : null; 
                                                    @endphp

                                                    <span class="author">
                                                        @if ($endDate && $now->greaterThan($endDate))
                                                            <span style="color: red;">L'événement est terminé.</span>
                                                        @else
                                                            <a href="#" style="color: #ff0000;">Date fin évènement:
                                                                {{ $event->end ?? 'Not available' }}</a>
                                                        @endif
                                                    </span> --}}

                                                    @php
                                                        $now = \Carbon\Carbon::now(); // Obtient la date et l'heure actuelles
                                                        $startDate = $event->start
                                                            ? \Carbon\Carbon::parse($event->start)
                                                            : null; // Convertit la date de début en instance Carbon
                                                        $endDate = $event->end
                                                            ? \Carbon\Carbon::parse($event->end)
                                                            : null; // Convertit la date de fin en instance Carbon
                                                    @endphp

                                                    <span class="author">
                                                        @if ($startDate && $endDate && $now->between($startDate, $endDate))
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                transform="translate(0, 5)" width="26"
                                                                height="26"viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 10H4V19H20V10ZM15.0355 11.136L16.4497 12.5503L11.5 17.5L7.96447 13.9645L9.37868 12.5503L11.5 14.6716L15.0355 11.136ZM7 5H4V8H20V5H17V6H15V5H9V6H7V5Z">
                                                                </path>
                                                            </svg>
                                                            <span style="color: green;">L'événement est en cours.</span>
                                                        @elseif ($endDate && $now->greaterThan($endDate))
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                transform="translate(0, 5)" width="26" height="26"
                                                                viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M9 3V1H7V3H3C2.44772 3 2 3.44772 2 4V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V4C22 3.44772 21.5523 3 21 3H17V1H15V3H9ZM4 8H20V19H4V8ZM9.87852 9.9643L11.9999 12.0858L14.1211 9.96432L15.5354 11.3785L13.4141 13.5L15.5353 15.6211L14.1212 17.0354L11.9999 14.9142L9.87845 17.0354L8.46432 15.6211L10.5856 13.5L8.46426 11.3785L9.87852 9.9643Z">
                                                                </path>
                                                            </svg>
                                                            <span style="color: red;">L'événement est terminé.</span>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                transform="translate(0, 5)" width="26" height="26"
                                                                viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM11 13V17H6V13H11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
                                                                </path>
                                                            </svg>
                                                            <a href="#" style="color: #ff0000;">Date fin évènement:
                                                                {{ $event->end ?? 'Not available' }}</a>
                                                        @endif
                                                    </span>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="blog-title">
                                                <a href="#">{{ $event->titre ?? ' ' }}</a>
                                            </h3>
                                            <!-- Dans la vue Blade (par exemple, resources/views/event/show.blade.php) -->
                                            <style>
                                                .blog-desc {
                                                    text-align: justify;
                                                }
                                            </style>

                                            <div class="blog-desc"> {!! $event->description !!}</div>
                                          
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
                                        @foreach ($lastevents as $lastevent)
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
