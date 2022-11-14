<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/frontend/images/favicons/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/frontend/images/favicons/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/frontend/images/favicons/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('assets/frontend/images/favicons/site.webmanifest')}}">

  <!-- Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet">



  <!-- Css-->
  <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap-select.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/jarallax.css')}}">

  <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.mCustomScrollbar.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/vegas.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/nouislider.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/nouislider.pips.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/tolips.css')}}">
  <!-- Template styles -->
  <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">info@geocadict.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+254 795 451 228</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  @include('frontend.partials.header')

  @yield('hero')

  <main id="main">

    @yield('content')
    @include('frontend.partials.clients')
    
  </main>

  <footer id="footer">
    @include('frontend.partials.footer')

  </footer

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/frontend/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/frontend/vendor/php-email-form/validate.js')}}"></script>


  <script src="{{asset('assets/frontend/js/main.js')}}"></script>

</body>

</html>