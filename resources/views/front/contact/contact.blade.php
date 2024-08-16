@extends('front.fixe')
@section('titre', 'Contact')
@section('body')
    <main>

        @php
            $config = DB::table('configs')->first();

        @endphp


        <!-- Breadcrumbs Section Start -->
     
<!-- Breadcrumbs Start -->
 {{-- <div class="rs-breadcrumbs" style="margin-top: -30; padding-top: 0px;">
    <div class="breadcrumbs-wrap" style="padding-top: 10px;">
        <img src="/assets/contact/1.png" width="100" height="100" alt="Breadcrumbs Image">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="breadcrumbs-text">
                    <h1 class="breadcrumbs-title mb-17">Contact</h1>
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
</div>  --}}

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
                    <h1 class="breadcrumbs-title mb-17">Contact</h1>
                    <div class="categories">
                        <ul>
                            <li><a href="{{  route('home') }}">Accueil</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>                
</div>
        <!-- Breadcrumbs Section End -->

        <!-- Contact Section Start -->
        <div class="rs-contact ">
            <!-- Contact Icon Start -->
      <style>
        .single-icon {
    background-image: url('/assets/counter/2.png');
    background-size: cover; /* Assure que l'image couvre toute la zone */
    background-position: center; /* Centre l'image dans l'élément */
}

      </style>
            <div class="rs-contact-icon pt-50 pb-50 md-pb-40 md-pt-40" style="margin-top: 0; margin-bottom: 0;">
                <div class="container" style="padding: 0;">
                    <div class="row justify-flex" style="margin: 0;">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 md-mb-30">
                            <div class="single-icon text-center custom-background">
                                <div class="icon-part">
                                    <i class="flaticon-phone"></i>
                                </div>
                                <div class="icon-text justify-text">
                                    <h3 class="icon-title">Téléphone</h3>
                                    <br>
                                    <a class="icon-info" href="#">{{ $config->telephone }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 md-mb-30">
                            <div class="single-icon text-center">
                                <div class="icon-part">
                                    <i class="flaticon-email"></i>
                                </div>
                                <div class="icon-text">
                                    <h3 class="icon-title">E-mail</h3>
                                    <br>
                                    <a class="icon-info" href="mailto:support@rstheme.com">{{ $config->email }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-icon text-center">
                                <div class="icon-part">
                                    <i class="flaticon-location"></i>
                                </div>
                                <div class="icon-text after-none">
                                    <h3 class="icon-title">Addresse</h3>
                                    <span>{{ $config->addresse }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- Contact Icon End -->

            <!-- Contact Form And Map Start -->
            <div class="contact-part sec-bg pt-100 pb-100 md-pt-80 md-pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 md-mb-30">
                            <div class="g-map">
                                <img src="{{ Storage::url($config->logocontact) }}" alt="">

                            </div>
                        </div>
                        <div class="col-lg-6 pl-50 md-pl-15">
                            <div class="contact-area">
                                <div class="title-style mb-50">
                                    <h2 class="margin-0 uppercase">Entrez en contact avec nous</h2>
                                    <span class="line-bg left-line pt-10 y-b"></span>
                                </div>
                                <div id="form-messages"></div>
                                @livewire('Front.ContactForm')

                         

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Form And Map End -->


        </div>
        <!-- Contact Section End -->



    </main>
@endsection
