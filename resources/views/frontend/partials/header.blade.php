<div class="header_top_one two">
    <div class="container">
        <div class="header_top_one_inner clearfix">
            <div class="header_top_one_content_box">
                <div class="header_top_one_content_box_top clearfix">
                    <div class="header_top_one_content_box_top_left float-left">
                        <p>Welcome to Georental <span>Property Management Platform</span></p>
                    </div>
                    <div class="header_top_one_content_box_top_right float-right">
                        <ul class="list-unstyled header_top_one_content_box_top_right_list">
                            <li><a href="#">Support<span>/</span></a></li>
                            <li><a href="#">Help<span>/</span></a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="main-nav__header-one two">
    <div class="container">
        <nav class="header-navigation one stricky">
            <div class="container-box clearfix">
                <div class="main_nav_header_two_logo float-left clearfix">
                    <div class="main_nav_header_two_logo_box">
                        <a href="index.html"><img src="assets/images/resources/logo-2.png" alt=""></a>
                    </div>
                </div>
                <div class="container-box_two float-right clearfix">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="main-nav__left main-nav__left_one float-left">
                        <a href="#" class="side-menu__toggler">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="main-nav__main-navigation two clearfix">
                            <ul class=" main-nav__navigation-box float-left">
                                <li class="{{Route::currentRouteName()==='landing' ? 'active':''}}"><a href="/">Home</a></li>
                                <li ><a href="/about">About</a></li>
                                <li><a href="/services">Services</a></li>
                                <li class=" {{Route::currentRouteName()==='pricing' ? 'active':''}}"><a href="/pricing">Search Property</a></li>
                                <li><a href="/pricing">Pricing</a></li>
                                <li class="{{Route::currentRouteName()=='contact' ? 'active':''}}">
                                    <a href="/contact">Contact</a>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                    <div class="main-nav__right main-nav__right_one float-right">
                        <div class="header_btn_1">
                            <a href="/login" class="thm-btn">Login</a>
                        </div>
                        <div class="icon_cart_box">
                            <a href="#">
                                <span class="icon-shopping-cart"></span>
                            </a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
