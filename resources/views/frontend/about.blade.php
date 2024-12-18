@extends('frontend.layouts.main')

@section('title', 'About') <!-- Sets the title for the page -->

@section('content')


    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{asset('assets/images/background/page-title.jpg')}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>About <br />Our Driving School</h1>
                <ul class="bread-crumb clearfix">
                    <li class=""><a href="{{url('/')}}">Home</a></li>
                    <li>About</li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- about-style-three -->
    <section class="about-style-three">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('assets/images/resource/about-3.jpg')}}" alt=""></figure>
                        <div class="text">
                            <div class="icon-box"><img src="{{asset('assets/images/icons/icon-34.png')}}" alt=""></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="12.6">0</span><span>k</span>
                            </div>
                            <h4>Total Training Hours</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title">
                            <h2>BigRig Truck Driving School has been a pioneer in the field of driving training since 2024!..</h2>
                        </div>
                        <div class="inner-box">
                            <div class="logo-box">
                                <figure class="logo"><img src="{{asset('assets/images/icons/logo-1.png')}}" alt=""></figure>
                                <figure class="logo"><img src="{{asset('assets/images/icons/logo-2.png')}}" alt=""></figure>
                            </div>
                            <div class="inner">
                                <div class="text">
                                    <p>Explain to you how all this mistaken denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actual teachings.</p>
                                    <p>Mistaken denouncing pleasure and praising pain was born and we will give you complete account of the system expound.</p>
                                </div>
                                <ul class="link-box clearfix">
                                    <li><a href="{{url('about')}}">Our Statements</a></li>
                                    <li><a href="{{url('about')}}">Areas Covered</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-three end -->


    <!-- funfact-section -->
    <section class="funfact-section alternat-2 centred">
        <div class="auto-container">
            <div class="title-box">
                <span class="big-text">4000+</span>
                <h4>Happy Students</h4>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="icon-box"></div>
                            <div class="count-outer count-box">
                                <span>0</span><span class="count-text" data-speed="1500" data-stop="1">0</span><span>+</span>
                            </div>
                            <h4>Years of Experience</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="icon-box"></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="16">0</span>
                            </div>
                            <h4>Professional Staff</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="icon-box"></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="96">0</span><span>%</span>
                            </div>
                            <h4>1st Time Pass Rate</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="icon-box"></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="12.6">0</span><span>k</span>
                            </div>
                            <h4>Total Training Hours</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- funfact-section -->


    <!-- history-section -->
    <section class="history-section">
        <div class="shape" style="background-image: url({{asset('assets/images/shape/shape-75.png')}});"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="history-slide">
                            <div class="single-item">
                                <figure class="image-box"><img src="{{asset('assets/images/resource/history-1.jpg')}}" alt=""></figure>
                                <div class="inner">
                                    <h2>2024</h2>
                                    <h4>The Early Years</h4>
                                    <p>In our launch year, BigRig Truck Driving School enrolled over 100 students, delivering comprehensive, hands-on training that established our reputation for quality. This milestone set the foundation for our commitment to developing skilled, safety-focused drivers.</p>
                                </div>
                            </div>
                            <div class="single-item">
                                <figure class="image-box"><img src="{{asset('assets/images/resource/history-1.jpg')}}" alt=""></figure>
                                <div class="inner">
                                    <h2>2024</h2>
                                    <h4>The Early Years</h4>
                                    <p>In our launch year, BigRig Truck Driving School enrolled over 100 students, delivering comprehensive, hands-on training that established our reputation for quality. This milestone set the foundation for our commitment to developing skilled, safety-focused drivers.</p>
                                </div>
                            </div>
                            <div class="single-item">
                                <figure class="image-box"><img src="{{asset('assets/images/resource/history-1.jpg')}}" alt=""></figure>
                                <div class="inner">
                                    <h2>2024</h2>
                                    <h4>The Early Years</h4>
                                    <p>In our launch year, BigRig Truck Driving School enrolled over 100 students, delivering comprehensive, hands-on training that established our reputation for quality. This milestone set the foundation for our commitment to developing skilled, safety-focused drivers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-box">
                            <a href="javascript:void(0)" class="theme-btn btn-five">Achievements So Far</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-inner">
                        <figure class="image"><img src="{{asset('assets/images/resource/history-3.jpg')}}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- history-section end -->


    <!-- highlights-style-two -->
    <section class="highlights-style-two">
        <div class="bg-layer" style="background-image: url({{asset('assets/images/background/highlights-bg.png')}});"></div>
        <div class="shape">
            <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-22.png')}});"></div>
            <div class="shape-2 float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-12.png')}});"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title light">
                <h2>Here to help you become a great driver</h2>
                <p>We are committed to equipping you with the skills, knowledge, and confidence needed to excel on the road. Our proven training approach combines practical experience with industry insights to make you a safe and skilled driver, ready for any driving environment.</p>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                    <div class="single-item wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner">
                            <ul class="icon-list">
                                <li><i class="flaticon-right-arrow-1"></i></li>
                                <li><i class="flaticon-right-arrow-2"></i></li>
                                <li><i class="flaticon-right-arrow-1"></i></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Approved Institute</a></h4>
                            <p>Certified and recognized for delivering high-quality driver education programs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                    <div class="single-item wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner">
                            <ul class="icon-list">
                                <li><i class="flaticon-right-arrow-1"></i></li>
                                <li><i class="flaticon-right-arrow-2"></i></li>
                                <li><i class="flaticon-right-arrow-1"></i></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Experienced & Trusted</a></h4>
                            <p>A reputable school with a proven track record in driver training excellence.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                    <div class="single-item wow fadeInLeft animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner">
                            <ul class="icon-list">
                                <li><i class="flaticon-right-arrow-1"></i></li>
                                <li><i class="flaticon-right-arrow-2"></i></li>
                                <li><i class="flaticon-right-arrow-1"></i></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Modern Techniques</a></h4>
                            <p>Advanced training methods for efficient, effective, and practical learning experiences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                    <div class="single-item wow fadeInRight animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner">
                            <ul class="icon-list">
                                <li><i class="flaticon-right-arrow-1"></i></li>
                                <li><i class="flaticon-right-arrow-2"></i></li>
                                <li><i class="flaticon-right-arrow-1"></i></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Trained Instructors</a></h4>
                            <p>Highly qualified instructors dedicated to developing safe, skilled drivers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- highlights-style-two end -->


    <!-- team-section -->
    <section class="team-section alternat-2">
        <div class="auto-container">
            <div class="sec-title centred">
                <h2>Meet our expert trainers</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                    <div class="team-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <ul class="social-links clearfix">
                                    <li><a href="{{url('/')}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{url('/')}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{url('/')}}"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <div class="shape">
                                    <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-57.png')}});"></div>
                                    <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-58.png')}});"></div>
                                    <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-76.png')}});"></div>
                                </div>
                                <span class="text">BigRig Truck Driving School</span>
                                <figure class="image"><img src="{{asset('assets/images/team/founder.jpg')}}" alt=""></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="{{url('/')}}">Adekola Adedapo</a></h4>
                                <span class="designation">Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                    <div class="team-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <ul class="social-links clearfix">
                                    <li><a href="{{url('/')}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{url('/')}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{url('/')}}"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <div class="shape">
                                    <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-57.png')}});"></div>
                                    <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-58.png')}});"></div>
                                    <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-76.png')}});"></div>
                                </div>
                                <span class="text">BigRig Truck Driving School</span>
                                <figure class="image"><img src="{{asset('assets/images/team/team-2.jpg')}}" alt=""></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="{{url('/')}}">Oluremi Adejobi</a></h4>
                                <span class="designation">Instructor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                    <div class="team-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <ul class="social-links clearfix">
                                    <li><a href="{{url('/')}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{url('/')}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{url('/')}}"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <div class="shape">
                                    <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-57.png')}});"></div>
                                    <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-58.png')}});"></div>
                                    <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-76.png')}});"></div>
                                </div>
                                <span class="text">BigRig Truck Driving School</span>
                                <figure class="image"><img src="{{asset('assets/images/team/team-3.jpg')}}" alt=""></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="{{url('/')}}">Olalekan Akinwunmi</a></h4>
                                <span class="designation">Instructor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more-btn">
                <a href="javascript:void(0)" class="theme-btn btn-five">All Instrutors</a>
            </div>
        </div>
    </section>
    <!-- team-section end -->


    <!-- dedicated-section -->
    <section class="dedicated-section">
        <div class="pattern-layer">
            <div class="pattern-1 float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-30.png')}});"></div>
            <div class="pattern-2 float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-30.png')}});"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred">
                <h2> We have dedicated ourselves to <br />the driving world</h2>
            </div>
            <div class="inner-content">
                <div class="shape" style="background-image: url({{asset('assets/images/shape/shape-77.png')}});"></div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{asset('assets/images/resource/dedicated-1.jpg')}}" alt=""></figure>
                                <div class="content-box">
                                    <div class="upper-box">
                                        <div class="icon-box"><img src="{{asset('assets/images/icons/icon-36.png')}}" alt=""></div>
                                        <h4>Focus On Complete Training</h4>
                                    </div>
                                    <div class="text">
                                        <p>Teachings of the great explorer the truth the master-builder of human.</p>
                                        <a href="{{url('about')}}"><i class="flaticon-right-arrow-1"></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                        <div class="single-item">
                            <div class="inner-box">
                                <figure class="image-box"><img src="{{asset('assets/images/resource/dedicated-2.jpg')}}" alt=""></figure>
                                <div class="content-box">
                                    <div class="upper-box">
                                        <div class="icon-box"><img src="{{asset('assets/images/icons/icon-37.png')}}" alt=""></div>
                                        <h4>Network of <br />246 Institution</h4>
                                    </div>
                                    <div class="text">
                                        <p>Moment blinded desire that they cannot foresee that pain and trouble.</p>
                                        <a href="{{url('about')}}"><i class="flaticon-right-arrow-1"></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dedicated-section end -->

    <!-- Include footer -->
    @include('frontend.partials.footer')

@endsection