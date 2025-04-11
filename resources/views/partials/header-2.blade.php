<!-- main header 2-->
<header class="main-header header-style-two">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner">
            <div class="top-left">
                <div class="single-item">
                    <div class="icon"><i class="flaticon-location"></i></div>
                    <h6>{{ $settings->headquarters }}<i class="far fa-angle-right"></i></h6>
                </div>
                {{-- <div class="single-item">
                    <div class="icon"><i class="flaticon-alarm"></i></div>
                    <h6>Training Time:<span>Morning Class 7am to 11am<i class="flaticon-right-arrow"></i></span></h6>
                </div> --}}
            </div>
            <div class="top-right">
                <div class="single-item">
                    <div class="icon"><i class="flaticon-telephone"></i></div>
                    <h6>dial to drive: <a href="tel:{{ $settings->business_contact }}">{{ $settings->business_contact }}</a></h6>
                </div>
                <ul class="share-box">
                    <li><h6><i class="flaticon-share"></i>Social media:</h6></li>
                    @foreach (['facebook' => 'facebook-f', 'twitter' => 'twitter', 'youtube' => 'youtube', 'linkedin' => 'linkedin-in', 'instagram' => 'instagram'] as $platform => $icon)
                        @if (!empty($settings->{$platform . '_handle'}))
                            <li>
                                <a href="{{ $settings->{$platform . '_handle'} }}" target="_blank">
                                    <i class="fab fa-{{ $icon }}"></i>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box clearfix">
            <div class="main-box clearfix">
                <div class="logo-box">
                    <figure class="logo-image-2"><a href="{{ route('index') }}"><img src="{{ Storage::url($site->light_theme_logo) }}" alt=""></a></figure>
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
                                {{-- <li class="{{ Request::is('/') ? 'current' : '' }} dropdown"><a href="{{ route('index') }}">Home</a></li> --}}
                                <li class="{{ Request::is('/') ? 'current' : '' }} dropdown"><a href="{{ route('index') }}">Home</a></li>
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
                            <a href="{{ route('login') }} }}" class="theme-btn btn-four">Login</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-lower-content">
                <div class="text">
                    <h5>Get Your First Free Online Lesson Today… <a href="{{ route('contact') }}"><i class="flaticon-right-arrow-1"></i>Contact Now</a></h5>
                </div>
                <ul class="option-list clearfix">
                    <li><h6><i class="flaticon-pdf"></i><a href="{{ Storage::url('miscellaneous/traffic_rules.pdf') }}" download>Traffic Signs</a></h6></li>
                    {{-- <li><h6><i class="flaticon-pdf"></i><a href="javascript:void(0)">Driving Tips</a></h6></li> --}}
                </ul>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="logo-box">
                <figure class="logo"><a href="{{ route('index') }}"><img class="logo-image" src="{{ Storage::url($site->light_theme_logo) }}" alt=""></a></figure>
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
                        <a href="{{route('login')}}" class="theme-btn btn-one">Login</a>
                    </div>
                </div>
                <div class="support-box">
                    <div class="icon"><img src="{{asset('assets/images/icons/icon-1.png')}}" alt=""></div>
                    <h6>Dial to Drive</h6>
                    <h4><a href="tel:{{ $settings->business_contact }}">{{ $settings->business_contact }}</a></h4>
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
        <figure class="logo"><a href="{{ route('index') }}"><img class="logo-image" src="{{ Storage::url($site->light_theme_logo) }}" alt=""></a></figure>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>{{ $settings->headquarters }}</li>
                <li><a href="tel:{{ $settings->business_contact }}">{{ $settings->business_contact }}</a></li>
                <li><a href="mailto:{{ $settings->business_email }}">{{ $settings->business_email }}</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                @foreach (['facebook' => 'facebook-square', 'twitter' => 'twitter', 'youtube' => 'youtube', 'linkedin' => 'linkedin-in', 'instagram' => 'instagram'] as $platform => $icon)
                    @if (!empty($settings->{$platform . '_handle'}))
                        <li>
                            <a href="{{ $settings->{$platform . '_handle'} }}" target="_blank">
                                <i class="fab fa-{{ $icon }}"></i>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->