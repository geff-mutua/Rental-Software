@extends('frontend.layouts.main')
@section('title','Georental Pricing')

@section('content')


<section class="page-header" style="background-image: url(assets/frontend/images/backgrounds/page-header_bg.jpg);">
    <div class="container">
        <div class="page-header-inner pt-5">
            <h2>System Pricing</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="/">Home</a></li>
                <li><span>/</span></li>
                <li>Our Pricing Plans</li>
            </ul>
        </div>
    </div>
</section>

<section class="membership_plan two">
  <div class="container">
      <div class="block-title text-center">
          <h4>Choose the Right Plan</h4>
          <h2>Choose the best plan that suits you</h2>
      </div>
      <div class="row">
          <div class="col-xl-4 col-lg-4">
              <!--Membership Plan Single-->
              <div class="membership_plan_single wow fadeInUp" data-wow-delay="00ms">
                  <div class="membership_plan_icon">
                      <span class="icon-home-1"></span>
                  </div>
                  <div class="membership_plan_price">
                      <p>Starter Plan</p>
                      <h2>$10.00 </h2>
                      <p>Monthly</p>
                  </div>
                  <ul class="membership_plan_serivce_list list-unstyled">
                    <li><span class="fa fa-check"></span> Manage Up to 1 Property</li>
                    <li><span class="fa fa-check"></span> Unlimited Units Management</li>
                    <li><span class="fa fa-check"></span> Unlimited System Users</li>
                    <li><span class="fa fa-check"></span> Document Management</li>
                    <li><span class="fa fa-check"></span> Debt Control</li>
                    <li><span class="fa fa-check"></span> Data Security</li>
                    <li><span class="fa fa-check"></span> 24/7 Support</li>
        
                   
                 
                  </ul>
                  <div class="membership_plan_btn">
                      <a href="#" class="thm-btn">Choose Plan</a>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-lg-4">
              <!--Membership Plan Single-->
              <div class="membership_plan_single wow fadeInUp" data-wow-delay="200ms">
                  <div class="membership_plan_icon">
                      <span class="icon-house"></span>
                  </div>
                  <div class="membership_plan_price">
                      <p>Business Plan</p>
                      <h2>$19.00 </h2>
                      <p>Monthly</p>
                  </div>
                  <ul class="membership_plan_serivce_list list-unstyled">
                      <li><span class="fa fa-check"></span> Manage Upto 5 Properties</li>
                      <li><span class="fa fa-check"></span> Unlimited units management</li>
                      <li><span class="fa fa-check"></span> Unlimited System Users</li>
                      <li><span class="fa fa-check"></span> Document Management</li>
                      <li><span class="fa fa-check"></span> Debt Control</li>
                      <li><span class="fa fa-check"></span> Data Security</li>
                      <li><span class="fa fa-check"></span> 24/7 User Support</li>
                      <li><span class="fa fa-check"></span> Bulk Sms & Email</li>
                      <li><span class="fa fa-check"></span> E-Payments Mpesa/Bank integrations</li>
                      <li><span class="fa fa-check"></span> Receipting</li>
                      <li><span class="fa fa-check"></span> Marketing</li>
                      <li><span class="fa fa-check"></span> Tenant & Landlord Portal</li>
                  </ul>
                  <div class="membership_plan_btn">
                      <a href="#" class="thm-btn">Choose Plan</a>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-lg-4">
              <!--Membership Plan Single-->
              <div class="membership_plan_single wow fadeInUp" data-wow-delay="300ms">
                  <div class="membership_plan_icon">
                      <span class="icon-cityscape"></span>
                  </div>
                  <div class="membership_plan_price">
                      <p>Enterprise Plan</p>
                      <h2>$50.00</h2>
                      <p>Monthly</p>
                  </div>
                  <ul class="membership_plan_serivce_list list-unstyled">
                    <li><span class="fa fa-check"></span> Unlimited Properties</li>
                    <li><span class="fa fa-check"></span> Unlimited units management</li>
                    <li><span class="fa fa-check"></span> Unlimited System Users Users</li>
                    <li><span class="fa fa-check"></span> Document Management</li>
                    <li><span class="fa fa-check"></span> Debt Control</li>
                    <li><span class="fa fa-check"></span> Data Security</li>
                    <li><span class="fa fa-check"></span> 24/7 User Support</li>
                    <li><span class="fa fa-check"></span> Bulk Sms & Email</li>
                    <li><span class="fa fa-check"></span> E-Payments Mpesa/Bank integrations</li>
                    <li><span class="fa fa-check"></span> Receipting</li>
                    <li><span class="fa fa-check"></span> Marketing</li>
                    <li><span class="fa fa-check"></span> Tenant & Landlord Portal</li>
                    <li><span class="fa fa-check"></span> Accounting</li>
                    
                  </ul>
                  <div class="membership_plan_btn">
                      <a href="#" class="thm-btn">Choose Plan</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<section class="faqs">
  <div class="container">
      <div class="row">
          <div class="col-xl-6 col-lg-6">
              <div class="faqs_left">
                  <div class="block-title text-left">
                      <h4>Frequently Aksed Questions</h4>
                      <h2>Have Any Questions?</h2>
                  </div>
                  <div class="faqs_text">
                      <p>We are here to help you simulate your daily operations in an easier and more
                        efficient way.</p>
                  </div>
                  <div class="row">
                      <div class="col-xl-6 col-lg-6">
                          <div class="faqs_img_box">
                              <div class="faqs_img mar-30">
                                  <img src="{{asset('assets/frontend/images/resources/faq_img_1.jpg')}}" alt="">
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-6 col-lg-6">
                          <div class="faqs_img_box">
                              <div class="faqs_img">
                                  <img src="{{asset('assets/frontend/images/resources/faq_img_2.jpg')}}" alt="">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6">
              <div class="faq">
                  <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                      <div class="accrodion">
                          <div class="accrodion-title">
                              <h4>How do I get started with Georental Platform</h4>
                          </div>
                          <div class="accrodion-content">
                              <div class="inner">
                                  <p>Getting started begins by clicking the get started button that
                                    will walk you through the onboarding process and set up your account.
                                  </p>
                              </div><!-- /.inner -->
                          </div>
                      </div>
                      <div class="accrodion active">
                          <div class="accrodion-title">
                              <h4>Will my property be advertised?.</h4>
                          </div>
                          <div class="accrodion-content">
                              <div class="inner">
                                  <p>Yes. If you choose to advertise your premises, they will appear on the site
                                    and people will be able to view and talk to you from the contact details you will append.</p>
                              </div><!-- /.inner -->
                          </div>
                      </div>
                      <div class="accrodion">
                          <div class="accrodion-title">
                              <h4>Am I able to do auditing from the platform?</h4>
                          </div>
                          <div class="accrodion-content">
                              <div class="inner">
                                  <p>Yes. Our platform gives you ability to evaluate your business by managing all your
                                    revenues and expenses in one place.</p>
                              </div><!-- /.inner -->
                          </div>
                      </div>
                      <div class="accrodion">
                          <div class="accrodion-title bdr-b-n">
                              <h4>Can People book online?</h4>
                          </div>
                          <div class="accrodion-content">
                              <div class="inner">
                                  <p>Yes. If you have vacants on your property, people can book them online and you receive an email confirming the details
                                    of the customer and proceed with your arrangements.</p>
                              </div><!-- /.inner -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


<section class="cta_one">
  <div class="cta_one_bg" style="background-image: url(assets/frontend/images/backgrounds/cta_one_bg.png)"></div>
  <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="cta_one_inner">
                  <div class="cta_one_text">
                      <h2>We Help People and Homes Find Each Other</h2>
                      <p style="widows: 60%"> Fill in the details to get a request demo that you can use to view how our system operates and choose your appropriate plan to get you
                        started. We will respond to your request within 5 minutes upon successful request .
                    </p>
                  </div>
                  <div class="cta_one_btn">
                      <a href="listing-2.html" class="thm-btn">Request Demo</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
  @endsection