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

    <div class="preloader">
        <img src="{{asset('assets/frontend/images/icon.jpeg')}}" width="200" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <div class="site-header__header-one-wrap two clearfix">

            @include('frontend.partials.header')
            
        </div>
        @yield('content')
  
        <!--Site Footer One Start-->
        <footer class="site_footer" style="background-image: url(assets/frontend/images/resources/site_footer_top_bg.jpg)">
          @include('frontend.partials.footer')
        </footer>
        <!--Site Footer One End-->

        <!--Site Footer Bottom Start-->
        <div class="site_footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="site_footer_inner">
                            <div class="site_footer_left">
                                <p>© Copyright {{date('Y')}} by <a href="#">Geocadict.com</a></p>
                            </div>
                            <div class="site_footer__social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Site Footer Bottom End-->




    </div><!-- /.page-wrapper -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>




    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay side-menu__toggler mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close side-menu__toggler mobile-nav__toggler">
                <i class="fa fa-times"></i>
            </span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image">
                    <img src="assets/images/resources/logo-2.png" alt="" />
                </a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container clearfix"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="icon-message"></i>
                    <a href="mailto:info@geocadict.com">info@geocadict.com</a>
                </li>
                <li>
                    <i class="icon-phone-call"></i>
                    <a href="tel:+254795451228">+254 795 451 228</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="facebook"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" aria-label="pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->
        </div>
    </div>



    <div class="search-popup">
        <div class="search-popup__overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.search-popup__overlay -->
        <div class="search-popup__inner">
            <form action="#" class="search-popup__form">
                <input type="text" name="search" placeholder="Type here to Search....">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>



    <script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/wow.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/swiper.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/typed-2.0.11.js')}}"></script>
    <script src="{{asset('assets/frontend/js/vegas.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/countdown.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/nouislider.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/isotope.js')}}"></script>
    <script src="{{asset('assets/frontend/js/appear.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jarallax.js')}}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>


    <!-- template scripts -->
    <script src="{{asset('assets/frontend/js/theme.js')}}"></script>


</body>

</html>