<!doctype html>
<html lang="en">

  <head>
    <title>Cargo &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/home.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('frontend/table/datatables-bs4/css/dataTables.bootstrap4.css') }}">

      <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    @yield('css')

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="site-logo" style="position: inherit;">
              <a href="#" class="text-black"><span class="text-primary">Cargo</a>
            </div>
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>

                  <li class="has-children">
                    <a class="nav-link">Tiket</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="{{ route('tiket', ['tipe'=> 'kereta']) }}" class="nav-link">Kereta</a></li>
                      <li><a href="{{ route('tiket', ['tipe'=> 'pesawat']) }}" class="nav-link">Pesawat</a></li>
                    </ul>
                  </li>
                  <!-- <li><a href="{{ route('tiket', ['tipe'=> 'kereta']) }}" class="nav-link">Kereta</a></li>
                  <li><a href="{{ route('tiket', ['tipe'=> 'pesawat']) }}" class="nav-link">Pesawat</a></li> -->
                  <li><a href="{{ route('milikmu') }}" class="nav-link">Milikmu</a></li>
                </ul>
            </nav>
            <div class="dropdown ml-auto" style="margin-right: 28px;">
              <a class="nav-link" data-toggle="dropdown" href="#" style="color: #000;">
                <i class="far fa-user"></i>
                <span class="username">{{ Auth::user()->name }}</span>
              </a>

              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="color: #000; min-width: 350px;">
                <div class="dropdown-item">
                  <div class="media">
                    <div class="media-body" style="font-size: 14px; font-weight: 600;">
                      {{ Auth::user()->name }}
                    </div>
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="text-center my-4">
                  <div style="font-size: 12px;">Saldo:</div>
                  <div style="font-size: 20px;" class="text-primary">Rp.{{ Auth::user()->saldo }},-</div>
                </div>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-center" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </div>
            <div class="toggle-button d-inline-block d-lg-none">
              <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black">
                <span class="icon-menu h3"></span>
              </a>
            </div>
          </div>
        </div>
    </header>



@yield('content')


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-4 ml-auto">

            <div class="mb-5">
              <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
              <form action="#" method="post" class="footer-suscribe-form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                  </div>
                </div>
            </div>


            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>
  
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>

    <script src="{{ asset('frontend/js/main.js') }}"></script>


    @yield('js')
    <!-- table -->

    <script src="{{ asset('frontend/table/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('frontend/table/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
    </script>


  </body>

</html>
