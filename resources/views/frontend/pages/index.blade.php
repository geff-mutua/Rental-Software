@extends('frontend.layouts.main')

@section('content')

@include('frontend.partials.hero-main')


<section class="latest_properties">
    <div class="container">
        <div class="block-title text-center">
            <h4>What we offer</h4>
            <h2>Our Services</h2>
            <p> We understand that tracking of your tenants payments and statement records can be hectic. Georental property management system brings in professionalism
                and efficient way to close the gap and ensure smooth running of the business.</p>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="thm-swiper__slider swiper-container thm-swiper__slider-pause-hover"
                    data-swiper-options='{"spaceBetween": 100, "slidesPerView": 4, "autoplay": { "delay": 5000 }, "pagination": {
                        "el": "#latest_properties_pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "navigation": {
                        "nextEl": ".latest_properties_next",
                        "prevEl": ".latest_properties_prev",
                        "clickable": true
                    },
                    "breakpoints": {
                        "0": {
                            "spaceBetween": 30,
                            "slidesPerView": 1
                        },
                        "425": {
                            "spaceBetween": 30,
                            "slidesPerView": 1
                        },
                        "575": {
                            "spaceBetween": 30,
                            "slidesPerView": 1
                        },
                        "767": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "991": {
                            "spaceBetween": 20,
                            "slidesPerView": 2
                        },
                        "1289": {
                            "spaceBetween": 30,
                            "slidesPerView": 3
                        },
                        "1440": {
                            "spaceBetween": 30,
                            "slidesPerView": 3
                        }
                    }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="latest_properties_single">
                                <div class="latest_properties_img_carousel owl-theme owl-carousel">
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_1.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">

                                            <a href="#" class="sale_btn">For Sale</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_2.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">

                                            <a href="#" class="sale_btn">For Sale</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_3.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">

                                            <a href="#" class="sale_btn">For Sale</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest_properties_content">
                                    <div class="latest_properties_top_content">
                                        <h4><a href="">Online Based Platform</a></h4>
                                        <p>   We offer online based software that can be used by any type of business with any computing device. Our system runs all through to ensure that
                                            you can access it anywhere and anytime.</p>
                                      
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="latest_properties_single">
                                <div class="latest_properties_img_carousel owl-theme owl-carousel">
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_2.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_3.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_1.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest_properties_content">
                                    <div class="latest_properties_top_content">
                                        <h4><a href="/">Online Rent Processing</a></h4>
                                        <p>Collect rent faster by taking advantage of integrations to your paybill and bank accounts. Rent is received automatically and receipt sent to the tenant via sms and email in real time.</p>
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="latest_properties_single">
                                <div class="latest_properties_img_carousel owl-theme owl-carousel">
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_3.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">

                                            <a href="#" class="sale_btn">For Sale</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_1.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">

                                            <a href="#" class="sale_btn">For Sale</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_2.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">

                                            <a href="#" class="sale_btn">For Sale</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest_properties_content">
                                    <div class="latest_properties_top_content">
                                        <h4><a href="listing-details.html">Bulk sms And Emailing</a></h4>
                                        <p> Our platform is designed to send bulk sms and email to your tenants, stake holders, generating payment receipts and much more.</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="latest_properties_single">
                                <div class="latest_properties_img_carousel owl-theme owl-carousel">
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_1.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_2.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_3.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest_properties_content">
                                    <div class="latest_properties_top_content">
                                        <h4><a href="listing-details.html">Security</a></h4>
                                        <p> Our hardware and performance testing, 24/7 ensuring that the system is running properly
                                            . Data storage is encrypted and protected with the latest security technologies.</p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="latest_properties_single">
                                <div class="latest_properties_img_carousel owl-theme owl-carousel">
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_2.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_3.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                    <div class="latest_properties_img">
                                        <img src="assets/images/resources/latest_properties_img_1.jpg" alt="">
                                        <div class="latest_properties_icon">
                                            <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="featured_and_sale_btn">
                                            <a href="#" class="featured_btn">Featured</a>
                                            <a href="#" class="sale_btn">For Rent</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="latest_properties_content">
                                    <div class="latest_properties_top_content">
                                        <h4><a href="listing-details.html">Document Management</a></h4>
                                        <p> We have a robust document management system that allows you to manage your documents and files in a secure and efficient manner to 
                                            reduce your paper work.</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination" id="latest_properties_pagination"></div>
    </div>
</section>

<section class="why_choose_one jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
style="background-image: url(assets/frontend/images/backgrounds/why_choose_one_bg.jpg)" >
<div class="container">
    <div class="why_choose_one_title">
        <h2>Why Choose Us</h2>
    </div>
    <div class="why_choose_one_shape_one"
        style="background-image: url(assets/frontend/images/shapes/why_choose_one_shape_1.png)"></div>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6">
            <!--Why Choose One Single-->
            <div class="why_choose_one_single wow fadeInUp">
                <div class="why_choose_one_icon">
                    <span class="icon-town"></span>
                </div>
                <h3>Easy to track your tenant payments</h3>
                <p>Our solution helps to manage the rental financial all time.</p>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <!--Why Choose One Single-->
            <div class="why_choose_one_single wow fadeInUp" data-wow-delay="100ms">
                <div class="why_choose_one_icon">
                    <span class="icon-agent"></span>
                </div>
                <h3>Personalized <br>Reports</h3>
                <p>Our platform offers ability to create reports based on your creteria.</p>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <!--Why Choose One Single-->
            <div class="why_choose_one_single wow fadeInUp" data-wow-delay="200ms">
                <div class="why_choose_one_icon">
                    <span class="icon-assets"></span>
                </div>
                <h3>Customized<br> Dashboards</h3>
                <p>We offer customized dashboards as per your preferences</p>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <!--Why Choose One Single-->
            <div class="why_choose_one_single wow fadeInUp" data-wow-delay="300ms">
                <div class="why_choose_one_icon">
                    <span class="icon-rent"></span>
                </div>
                <h3>Marketting <br>and Advertisement</h3>
                <p>We make your property known allover the country and easily get customers.</p>
            </div>
        </div>
    </div>
</div>
</section>


<section class="cta_one">
    <div class="cta_one_bg" style="background-image: url(assets/images/backgrounds/cta_one_bg.png)"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="cta_one_inner">
                    <div class="cta_one_text">
                        <h2>We Help People and Homes Find Each Other</h2>
                    </div>
                    <div class="cta_one_btn">
                        <a href="listing-1.html" class="thm-btn">Browse Property</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--CTA One End-->

<!--Featured Properties Start-->
<section class="featured_properties jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
    style="background-image: url(assets/frontend/images/backgrounds/featured_properties_bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="featured_properties_left wow slideInLeft" data-wow-delay="100ms">
                    <div class="featured_properties_img">
                        <img src="{{asset('assets/frontend/images/resources/featured_properties_img.jpg')}}" alt="">
                        <div class="featured_and_sale_btn">
                            <a href="#" class="featured_btn">Featured</a>
                            <a href="#" class="sale_btn">For Rent</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="featured_properties_right">
                    <div class="block-title text-left">
                        <h4>What we offer</h4>
                        <h2>System Features</h2>
                    </div>
                    <div class="featured_properties_text">
                        <p>Some of the features that come along with the platform include.
                        </p>
                    </div>
                    <ul class="featured_properties_right_list list-unstyled">
                        <li><span class="icon-confirmation"></span>Integrations with banks for easy payments.</li>
                        <li><span class="icon-confirmation"></span>Customized consolidated reports and analysis</li>
                        <li><span class="icon-confirmation"></span>Rental debt control and marketting.</li>
                        <li><span class="icon-confirmation"></span>Sms and email notifications.</li>
                        <li><span class="icon-confirmation"></span>Data security protection.</li>
                        <li><span class="icon-confirmation"></span>24/7 support.</li>
                        <li><span class="icon-confirmation"></span>Reporting and document processing.</li>
                       
                    </ul>
                   
                   
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why_choose_two mb-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5">
                <div class="why_choose_one_left">
                    <div class="why_choose_two_bg"
                        style="background-image: url(assets/frontend/images/resources/why_choose_two_bg.jpg)"></div>
                    <div class="block-title text-left">
                        <h4>Other Benefits</h4>
                        <h2>How People will benefit
                    </div>
                    <ul class="why_choose_two_points list-unstyled">
                        <li>
                            <div class="icon">
                                <span class="icon-checked"></span>
                            </div>
                            <div class="text">
                                <p>People will easily find apartments of their choice and make a choice to book them</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-checked"></span>
                            </div>
                            <div class="text">
                                <p>Property owners easily manage all their properties in one place</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-checked"></span>
                            </div>
                            <div class="text">
                                <p>Simulation of the payment process and integration to the financial institutions of your choice.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="why_choose_two_btn">
                        <a href="/" class="thm-btn">Request Demo</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="why_choose_right">
                    <div class="why_choose_right_img">
                        <img src="assets/frontend/images/resources/why_choose_two_img_1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 