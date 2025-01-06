<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner">
            <div class="single-item">
                <div class="icon"><i class="flaticon-alarm"></i></div>
                <h6>Training Time:<span>Mor Class 7am to 11am<i class="flaticon-right-arrow"></i></span></h6>
            </div>
            <div class="single-item">
                <div class="icon"><i class="flaticon-location"></i></div>
                <h6>We have come closer to you:<span>Nigeria<i class="flaticon-right-arrow"></i></span></h6>
            </div>
            <ul class="share-box clearfix">
                <li><h6><i class="flaticon-share"></i>Social media:</h6></li>
                <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fab fa-youtube"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="https://www.instagram.com/bigrig_truckdrivingschool/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box clearfix">
            <div class="shape" style="background-image: url({{asset('assets/images/shape/shape-1.png')}});"></div>
            <div class="logo-box">
                <figure class="logo"><a href="{{route('home')}}"><img class="logo-image" src="{{ Storage::url($site->light_theme_logo) }}" alt=""></a></figure>
            </div>
            <div class="menu-area">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </div>
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                        <li class="{{ Request::is('/') ? 'current' : '' }} dropdown"><a href="{{ route('home') }}">Home</a></li>
                        <li class="{{ Request::is('about-us') ? 'current' : '' }} dropdown"><a href="{{ route('about-us') }}">About</a></li>
                        <li class="{{ Request::is('courses') ? 'current' : '' }} dropdown"><a href="{{ route('courses') }}">Courses</a></li>
                        <li class="{{ Request::is('faq') ? 'current' : '' }} dropdown"><a href="{{ route('faq') }}">FAQ'S</a></li>
                        <li class="{{ Request::is('contact') ? 'current' : '' }} dropdown"><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="menu-right">
                    <div class="search-box-outer search-toggler">
                        <i class="flaticon-search"></i>
                    </div>
                    <div class="nav-btn nav-toggler navSidebar-button clearfix">
                        <div class="bar-box">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="btn-box">
                        <a href="{{route('register')}}" class="theme-btn btn-one">Get Started</a>
                    </div>
                </div>
                <div class="support-box">
                    <div class="icon"><img src="{{asset('assets/images/icons/icon-1.png')}}" alt=""></div>
                    <h6>Dial to Drive</h6>
                    <h4><a href="tel:+1 (913) 705-0526">+1 (913) 705-0526</a></h4>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="shape" style="background-image: url({{asset('assets/images/shape/shape-1.png')}});"></div>
            <div class="logo-box">
                <figure class="logo"><a href="{{route('home')}}"><img class="logo-image" src="{{ Storage::url($site->light_theme_logo) }}" alt=""></a></figure>
            </div>
            <div class="menu-area clearfix">
                <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav>
                <div class="menu-right">
                    <div class="search-box-outer search-toggler">
                        <i class="flaticon-search"></i>
                    </div>
                    <div class="nav-btn nav-toggler navSidebar-button clearfix">
                        <div class="bar-box">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="btn-box">
                        <a href="{{route('register')}}" class="theme-btn btn-one">Get Started</a>
                    </div>
                </div>
                <div class="support-box">
                    <div class="icon"><img src="{{asset('assets/images/icons/icon-1.png')}}" alt=""></div>
                    <h6>Dial to Drive</h6>
                    <h4><a href="tel:+1 (913) 705-0526">+1 (913) 705-0526</a></h4>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <figure class="logo"><a href="{{route('home')}}"><img class="logo-image" src="{{ Storage::url($site->light_theme_logo) }}" alt=""></a></figure>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>No 6, Blue Gate Estate, Opposite Liberty Stadium, Ring Road, Ibadan, Oyo State.</li>
                <li><a href="tel:+1 (913) 705-0526">+1 (913) 705-0526</a></li>
                <li><a href="mailto:info@bigrigdrivingschool.ng">info@bigrigdrivingschool.ng</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="javascript:void(0)"><span class="fab fa-twitter"></span></a></li>
                <li><a href="javascript:void(0)"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="javascript:void(0)"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="https://www.instagram.com/bigrig_truckdrivingschool/" target="_blank"><span class="fab fa-instagram"></span></a></li>
                <li><a href="javascript:void(0)"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->