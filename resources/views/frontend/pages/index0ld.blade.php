@extends('frontend.layouts.main')
@section('title','Georental Home')

@section('content')

<section id="cta" class="cta">
    <div class="container">

      <div class="row">
        <div class="col-lg-9 text-center text-lg-left">
          <h3>All your rentals properties in one software <span> Being Managed</span></h3>
          <p> 
            We understand that tracking of your tenants payments and statement records can be hectic. Georental property management system brings in professionalism
            and efficient way to close the gap and ensure smooth running of the business.
          </p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="#">Request a quote</a>
        </div>
      </div>

    </div>
  </section><!-- End Cta Section -->


  <section id="services" class="services">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href="">Online Based</a></h4>
            <p class="description">
                We offer online based software that can be used by any type of business with any computing device. Our system runs all through to ensure that
                you can access it anywhere and anytime.
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a href="">Online Rent Processing</a></h4>
            <p class="description">
                Collect rent faster by taking advantage of integrations to your paybill and bank accounts. Rent is received automatically and receipt sent to the tenant via sms and email in real time.
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-bar-chart"></i></div>
            <h4 class="title"><a href="">Bulk sms & Email</a></h4>
            <p class="description">
                Our platform is designed to send bulk sms and email to your tenants, stake holders, generating payment receipts and much more.
                
            </p>
        </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="title"><a href="">Secure</a></h4>
            <p class="description">
                Our hardware and performance testing, 24/7 ensuring that the system is running properly
                . Data storage is encrypted and protected with the latest security technologies.
            </p>
          
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bi bi-brightness-high"></i></div>
            <h4 class="title"><a href="">Document Management</a></h4>
            <p class="description">
                We have a robust document management system that allows you to manage your documents and files in a secure and efficient manner to 
                reduce your paper work.
            </p>
        </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
            <h4 class="title"><a href="">Reports</a></h4>
            <p class="description">
                Get a quick analysis of whats currently happening on your business
                 by use of a well consolidated reports and graphs.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Services Section -->


  <section id="clients" class="clients">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Our <strong>Integrations</strong></h2>
        <p>We Automate the payment process by integrating the system with the common financial institution..</p>
      </div>

      <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="{{asset('assets/frontend/img/icons/mpesa_logo.png')}}" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="{{asset('assets/frontend/img/icons/coop.png')}}" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo">
            <img src="{{asset('assets/frontend/img/icons/equity.jpg')}}" class="img-fluid" alt="">
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{asset('assets/frontend/img/icons/kcb.png')}}" class="img-fluid" alt="">
            </div>
          </div>
       

      </div>

    </div>
  </section><!-- End Our Clients Section -->


@endsection
