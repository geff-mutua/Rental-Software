@extends('frontend.layouts.main')
@section('title','Georental About Us')

@section('content')

<section class="page-header" style="background-image: url(assets/frontend/images/backgrounds/page-header_bg.jpg);">
  <div class="container">
      <div class="page-header-inner">
          <h2>About</h2>
          <ul class="thm-breadcrumb list-unstyled">
              <li><a href="/">Home</a></li>
              <li><span>/</span></li>
              <li>About</li>
          </ul>
      </div>
  </div>
</section>
<section class="about_page">
  <div class="container">
      <div class="row">
          <div class="col-xl-6 col-lg-6">
              <div class="about_page_left">
                  <div class="about_page_img">
                      <img src="assets/frontend/images/about/about_page_img_1.jpg" alt="">
                  </div>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6">
              <div class="about_page_right">
                  <div class="block-title text-left">
                      <h4>Find Your Properties</h4>
                      <h2>Who we are</h2>
                  </div>
                  <div class="about_page_right_text">
                      <p class="first_text">We are committed to see your business grow to the next level.</p>
                      <p class="second_text"> Georental is a designated brand from geocadict solutions that deals with property management and real estate.
                        It is developed with the main goal of providing solution for real estate agents to manage their properties.</p>
                  </div>
                  <ul class="about_page_list list-unstyled">
                      <li><i class="fa fa-check"></i>Customized Dashboards</li>
                      <li><i class="fa fa-check"></i>Multi-Properties management</li>
                      <li><i class="fa fa-check"></i>Integrations and Collections</li>
                      
                  </ul>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="are_you_ready jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
style="background-image: url(assets/frontend/images/backgrounds/are_you_ready_bg.jpg)">
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="are_you_ready_content">
                <div class="are_you_ready_shape"><img src="assets/frontend/images/backgrounds/are_you_ready_bg.png"
                        alt=""></div>
                <h2>Are You Ready to get <br> Started?</h2>
                <a href="listing-1.html" class="thm-btn">Get Started</a>
            </div>
        </div>
    </div>php
</div>
</section>

  {{-- <section id="about-us" class="about-us">
    <div class="container">

      <div class="row no-gutters">
        <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right"></div>
        <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
          <div class="content d-flex flex-column justify-content-center">
            <h3 data-aos="fade-up">Who we are.</h3>
            <p data-aos="fade-up">
             
            </p>
            <div class="row">
              <div class="col-md-6 icon-box" data-aos="fade-up">
                <i class="bx bx-receipt"></i>
                <h4></h4>
                <p>We develop a completely white labled solutions as per our clients requests.</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-cube-alt"></i>
                <h4>Integrations and Collections</h4>
                <p>We automate the payment and collections of revenues easily.</p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-images"></i>
                <h4>Data Security</h4>
                <p>We safeguard and keep your data in a secure lacation and providing backups. </p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-shield"></i>
                <h4></h4>
                <p>Our software is designed to manage more than one property, thus we go you covered incase you manage many properties</p> 
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End About Us Section --> --}}

@endsection