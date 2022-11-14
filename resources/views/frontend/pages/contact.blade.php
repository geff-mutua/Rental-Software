@extends('frontend.layouts.main')
@section('title','Georental Contact Us')

@section('content')
<section class="page-header" style="background-image: url(assets/frontend/images/backgrounds/page-header_bg.jpg);">
    <div class="container">
        <div class="page-header-inner pt-5">
            <h2>Contact</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="/">Home</a></li>
                <li><span>/</span></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>

<section class="locations">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Locations Single-->
                <div class="locations_three_single">
                    <div class="locations_three_title">
                        <h3>Nairobi Kenya</h3>
                        <p>0100 Marsabit Plaza</p>
                    </div>
                    <div class="locations_three_contact">
                        <a href="mailto:info@geocadict.com" class="mail_box">info@geocadict.com</a>
                        <a href="tel:+254795451228" class="number_box">+254 795 451 228</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Locations Single-->
                <div class="locations_three_single">
                    <div class="locations_three_title">
                        <h3>Utawala</h3>
                        <p>k-2 Plaza </p>
                    </div>
                    <div class="locations_three_contact">
                        <a href="mailto:info@geocadict.com" class="mail_box">info@geocadict.com</a>
                        <a href="tel:+254795451228" class="number_box">+254 795 451 228</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Locations Single-->
                <div class="locations_three_single">
                    <div class="locations_three_title">
                        <h3>Limuru Kenya</h3>
                        <p>39 Outer ring Road</p>
                    </div>
                    <div class="locations_three_contact">
                        <a href="mailto:info@geocadict.com" class="mail_box">info@geocadict.com</a>
                        <a href="tel:+254795451228" class="number_box">+254 795 451 228</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <!--Locations Single-->
                <div class="locations_three_single">
                    <div class="locations_three_title">
                        <h3>Wote Kenya</h3>
                        <p>G-T Avenue 2nd Floor</p>
                    </div>
                    <div class="locations_three_contact">
                        <a href="mailto:info@geocadict.com" class="mail_box">info@geocadict.com</a>
                        <a href="tel:+254795451228" class="number_box">+254 795 451 228</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="block-title text-left">
                    <h4>Contact Us</h4>
                    <h2>Get in touch with us </h2>
                </div>
                <div class="contact_text">
                    <p>You can send us your request and we will revert as soon as possible
                        .Fill in the details and submit your request.</p>
                </div>
                <div class="contact__social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <form action="inc/sendemail.php" class="contact__form">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="comment_input_box">
                                <input type="text" placeholder="Your name" name="name">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="comment_input_box">
                                <input type="email" placeholder="Email address" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="comment_input_box">
                                <input type="text" placeholder="Phone number" name="phone">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="comment_input_box">
                                <input type="email" placeholder="Subject" name="Subject">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="comment_input_box">
                                <textarea name="message" placeholder="Write message"></textarea>
                            </div>
                            <button type="submit" class="thm-btn comment-form__btn">Submit Comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="google_map">
    <iframe
        src="https://maps.google.com/maps?q=marsabit%20plaza&t=&z=13&ie=UTF8&iwloc=&output=embed"
        class="google-map__contact" allowfullscreen></iframe>

</section>
@endsection
{{-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=marsabit%20plaza&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> --}}