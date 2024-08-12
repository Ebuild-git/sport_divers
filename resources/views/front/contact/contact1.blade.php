@extends('front.fixe')
@section('titre', "Contact")
@section('body')
    <main>

     
      
      <!-- Contact Us: Start -->
      <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
          <div class="text-center mb-4">
            <span class="badge bg-label-primary">Contactez-nous</span>
          </div>
          <h4 class="text-center mb-1">
            <span class="position-relative fw-extrabold z-1"
              >Travaillons 
              <img
                src="../../assets/img/front-pages/icons/section-title-icon.png"
                alt="laptop charging"
                class="section-title-img position-absolute object-fit-contain bottom-0 z-n1" />
            </span>
            ensemble
          </h4>
          <p class="text-center mb-12 pb-md-4">Une question ou une remarque ? écris-nous simplement un message</p>
          <div class="row g-6">
            <div class="col-lg-5">
              <div class="contact-img-box position-relative border p-2 h-100">
                <img
                  src="../../assets/img/front-pages/icons/contact-border.png"
                  alt="contact border"
                  class="contact-border-img position-absolute d-none d-lg-block scaleX-n1-rtl" />
                <img
                  src="../../assets/img/front-pages/landing-page/contact-customer-service.png"
                  alt="contact customer service"
                  class="contact-img w-100 scaleX-n1-rtl" />
                <div class="p-4 pb-2">
                  <div class="row g-4">
                    <div class="col-md-6 col-lg-12 col-xl-6">
                      <div class="d-flex align-items-center">
                        <div class="badge bg-label-primary rounded p-1_5 me-3"><i class="ti ti-mail ti-lg"></i></div>
                        <div>
                          <p class="mb-0">Email</p>
                          <h6 class="mb-0">
                            <a href="mailto:example@gmail.com" class="text-heading">{{$configs->email}}</a>
                          </h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">
                      <div class="d-flex align-items-center">
                        <div class="badge bg-label-success rounded p-1_5 me-3">
                          <i class="ti ti-phone-call ti-lg"></i>
                        </div>
                        <div>
                          <p class="mb-0">Téléphone</p>
                          <h6 class="mb-0"><a href="#" class="text-heading">{{ $configs->telephone }}</a></h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="card h-100">
                <div class="card-body">
                  <h4 class="mb-2">Envoyer un message</h4>
                  <p class="mb-6">
                    Si vous souhaitez discuter de tout ce qui concerne le paiement, le compte, les licences,<br
                      class="d-none d-lg-block" />
                      des partenariats ou si vous avez des questions avant-vente, vous êtes au bon endroit.
                  </p>
            

                  @livewire('Front.ContactForm')
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
