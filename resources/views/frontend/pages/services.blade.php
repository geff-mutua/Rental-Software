@extends('frontend.layouts.main')
@section('title','Georental Services')


@section('content')
    <!-- ======= Breadcrumbs ======= -->

<section class="page-header" style="background-image: url(assets/frontend/images/backgrounds/page-header_bg.jpg);">
  <div class="container">
      <div class="page-header-inner pt-5">
          <h2>Our Services</h2>
          <ul class="thm-breadcrumb list-unstyled">
              <li><a href="/">Home</a></li>
              <li><span>/</span></li>
              <li>Services</li>
          </ul>
      </div>
  </div>
</section>

<section class="two_boxes">
  <div class="container">
      <div class="row">
          <div class="col-xl-6 col-lg-6 wow slideInLeft" data-wow-delay="100ms">
              <!--Two Boxes Single-->
              <div class="two_boxes_single">
                  <div class="two_boxes_iocn_and_content">
                      <div class="two_boxes_iocn">
                          <span class="icon-home-1"></span>
                      </div>
                      <div class="two_boxes_content">
                          <h3>Finding Apartments</h3>
                          <p>Our platform enables people looking for apartments get the best deals and offers. From the apartments sections, tenants are ble to browse and choose their locations and view
                            the apartment of their choice.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 wow slideInRight" data-wow-delay="100ms">
              <!--Two Boxes Single-->
              <div class="two_boxes_single">
                  <div class="two_boxes_iocn_and_content">
                      <div class="two_boxes_iocn">
                          <span class="icon-home-1"></span>
                      </div>
                      <div class="two_boxes_content">
                          <h3>Connecting with Client</h3>
                          <p>Our Online solutions help tenants to connect with their clients. We provide a platform to tenants to connect with their clients and also to view the apartment they are renting.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-lg-4 wow slideInRight" data-wow-delay="100ms">
            <!--Two Boxes Single-->
            <div class="two_boxes_single">
                <div class="two_boxes_iocn_and_content">
                    <div class="two_boxes_iocn">
                        <span class="icon-home-1"></span>
                    </div>
                    <div class="two_boxes_content">
                        <h3>Booking Apartments</h3>
                        <p>Clients are able to book apartments through our platform. Requests is sent to the landlord and the landlord is able to accept or reject the request thus preserving the apartment for the client.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 wow slideInRight" data-wow-delay="100ms">
          <!--Two Boxes Single-->
          <div class="two_boxes_single">
              <div class="two_boxes_iocn_and_content">
                  <div class="two_boxes_iocn">
                      <span class="icon-home-1"></span>
                  </div>
                  <div class="two_boxes_content">
                      <h3>Online Marketting</h3>
                      <p>The platform is capable of advertising on behalf of our clients the available and vacant rooms in the apartments, thus making it easier to get their available rooms occupied.</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-4 col-lg-4 wow slideInRight" data-wow-delay="100ms">
        <!--Two Boxes Single-->
        <div class="two_boxes_single">
            <div class="two_boxes_iocn_and_content">
                <div class="two_boxes_iocn">
                    <span class="icon-home-1"></span>
                </div>
                <div class="two_boxes_content">
                    <h3>Data Security and Protection</h3>
                    <p>Our hardware and performance testing, 24/7 ensuring that the system is running properly
                      . Data storage is encrypted and protected with the latest security technologies.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 wow slideInRight" data-wow-delay="100ms">
      <!--Two Boxes Single-->
      <div class="two_boxes_single">
          <div class="two_boxes_iocn_and_content">
              <div class="two_boxes_iocn">
                  <span class="icon-home-1"></span>
              </div>
              <div class="two_boxes_content">
                  <h3>Document Management</h3>
                  <p>We have a robust document management system that allows you to manage your documents and files in a secure and efficient manner to 
                    reduce your paper work.</p>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-6 col-lg-6 wow slideInRight" data-wow-delay="100ms">
    <!--Two Boxes Single-->
    <div class="two_boxes_single">
        <div class="two_boxes_iocn_and_content">
            <div class="two_boxes_iocn">
                <span class="icon-home-1"></span>
            </div>
            <div class="two_boxes_content">
                <h3>Reporting</h3>
                <p>Get a quick analysis of whats currently happening on your business
                  by use of a well consolidated reports and graphs.</p>
            </div>
        </div>
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
                <div class="are_you_ready_shape"><img src="assets/images/shapes/are_you_ready_shape.png"
                        alt=""></div>
                <h2>Register and manage <br> your businesses.</h2>
                <a href="/" class="thm-btn">Get Started</a>
            </div>
        </div>
    </div>
</div>
</section>
   
  
@endsection