@extends('layouts.frontend')
@section('content')
      <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1 overlay" style="background-image: url('https://source.unsplash.com/pSyfecRCBQA/1920x780')">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6">
                <h1>Kemana Anda akan Pergi</h1>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est magni perferendis fugit modi similique, suscipit, deserunt a iure.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- END .ftco-cover-1 -->
        <div class="ftco-service-image-1 pb-5">
          <div class="container">
            <div class="owl-carousel owl-all text-center">

              <div class="service text-center">
                <a href="/tiket/kereta"><img src="{{ asset('frontend/images/kereta2.png') }}" alt="Image" class="img-fluid border"></a>
              </div>
              <div class="service text-center">
                <a href="/tiket/pesawat"><img src="{{ asset('frontend/images/pesawat5.png') }}" alt="Image" class="img-fluid border"></a>
              </div>


            </div>
          </div>
        </div>

      </div>


      <div class="site-section" id="pricing-section">
        <div class="container">
          <div class="row mb-5 justify-content-center text-center">
            <div class="col-md-7">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                <h2>Promo</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="">
              <div class="pricing">
                <h3 class="text-center text-black">Basic</h3>
                <div class="price text-center mb-4 ">
                  <span><span>$47</span> / year</span>
                </div>
                <ul class="list-unstyled ul-check success mb-5">

                  <li>Officia quaerat eaque neque</li>
                  <li>Possimus aut consequuntur incidunt</li>
                  <li class="remove">Lorem ipsum dolor sit amet</li>
                  <li class="remove">Consectetur adipisicing elit</li>
                  <li class="remove">Dolorum esse odio quas architecto sint</li>
                </ul>
                <p class="text-center">
                  <a href="#" class="btn btn-secondary btn-md">Buy Now</a>
                </p>
              </div>
            </div>

            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="pricing">
                <h3 class="text-center text-black">Premium</h3>
                <div class="price text-center mb-4 ">
                  <span><span>$200</span> / year</span>
                </div>
                <ul class="list-unstyled ul-check success mb-5">

                  <li>Officia quaerat eaque neque</li>
                  <li>Possimus aut consequuntur incidunt</li>
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Consectetur adipisicing elit</li>
                  <li class="remove">Dolorum esse odio quas architecto sint</li>
                </ul>
                <p class="text-center">
                  <a href="#" class="btn btn-primary btn-md text-white">Buy Now</a>
                </p>
              </div>
            </div>

            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="pricing">
                <h3 class="text-center text-black">Professional</h3>
                <div class="price text-center mb-4 ">
                  <span><span>$750</span> / year</span>
                </div>
                <ul class="list-unstyled ul-check success mb-5">

                  <li>Officia quaerat eaque neque</li>
                  <li>Possimus aut consequuntur incidunt</li>
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Consectetur adipisicing elit</li>
                  <li>Dolorum esse odio quas architecto sint</li>
                </ul>
                <p class="text-center">
                  <a href="#" class="btn btn-secondary btn-md">Buy Now</a>
                </p>
              </div>
            </div>
          </div>


        </div>
      </div>



      <div class="block__73694 site-section border-top" id="why-us-section">
        <div class="container">
          <div class="row d-flex no-gutters align-items-stretch">

            <div class="col-12 col-lg-6 block__73422 order-lg-2" style="background-image: url({{ asset('frontend/images/cargo_sea_small.jpg') }});" data-aos="fade-left" data-aos-delay="">
            </div>



            <div class="col-lg-5 mr-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade-right" data-aos-delay="">
              <h2 class="mb-4 text-black">Why Us</h2>
              <h4 class="text-primary">We work quickly and efficiently!</h4>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>

              <ul class="ul-check primary list-unstyled mt-5">
                <li>Cargo express</li>
                <li>Secure Services</li>
                <li>Secure Warehouseing</li>
                <li>Cost savings</li>
                <li>Proven by great companies</li>
              </ul>

            </div>

          </div>
        </div>
      </div>
@endsection