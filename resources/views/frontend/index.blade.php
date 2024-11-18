@extends('frontend.layouts.main')

@section('title', 'Home') <!-- Sets the title for the page -->

@section('content')

    <!-- banner-section -->
    <section class="banner-section">
        <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
            <div class="slide-item">
                <div class="shape">
                    <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-2.png')}});"></div>
                    <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-3.png')}});"></div>
                    <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-4.png')}});"></div>
                    <div class="shape-4" style="background-image: url({{asset('assets/images/shape/shape-5.png')}});"></div>
                    <div class="shape-5" style="background-image: url({{asset('assets/images/shape/shape-6.png')}});"></div>
                    <div class="shape-6" style="background-image: url({{asset('assets/images/shape/shape-7.png')}});"></div>
                    <div class="shape-7" style="background-image: url({{asset('assets/images/shape/shape-8.png')}});"></div>
                    <div class="shape-8" style="background-image: url({{asset('assets/images/shape/shape-9.png')}});"></div>
                </div>
                <div class="curve-text">
                    <div class="icon-box"><img src="{{asset('assets/images/icons/icon-2.png')}}" alt=""></div>
                    <span class="curved-circle">BigRig Truck Driving School – because you all need it –</span>
                    <h6><a href="javascript:void(0)">Book Now</a></h6>
                </div>
                <div class="outer-container clearfix">
                    <div class="content-inner pull-left">
                        <div class="content-box">
                            <h2>Fast Track <br />Driving Lessons</h2>
                            <p>Join our dedicated team and get hand-on experience with truck, forklift, school bus and regular vehicles, </p>
                            <div class="btn-box">
                                <a href="javascript:void(0)" class="theme-btn btn-two">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="image-box pull-right">
                        <figure class="image overlay-layer"><img src="{{asset('assets/images/banner/truck.jpg')}}" alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="shape">
                    <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-2.png')}});"></div>
                    <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-3.png')}});"></div>
                    <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-4.png')}});"></div>
                    <div class="shape-4" style="background-image: url({{asset('assets/images/shape/shape-5.png')}});"></div>
                    <div class="shape-5" style="background-image: url({{asset('assets/images/shape/shape-6.png')}});"></div>
                    <div class="shape-6" style="background-image: url({{asset('assets/images/shape/shape-7.png')}});"></div>
                    <div class="shape-7" style="background-image: url({{asset('assets/images/shape/shape-8.png')}});"></div>
                    <div class="shape-8" style="background-image: url({{asset('assets/images/shape/shape-9.png')}});"></div>
                </div>
                <div class="curve-text">
                    <div class="icon-box"><img src="{{asset('assets/images/icons/icon-2.png')}}" alt=""></div>
                    <span class="curved-circle">BigRig Truck Driving School – because you all need it –</span>
                    <h6><a href="javascript:void(0)">Book Now</a></h6>
                </div>
                <div class="outer-container clearfix">
                    <div class="content-inner pull-left">
                        <div class="content-box">
                            <h2>Need Car <br />For Driving Test?</h2>
                            <p>Register with us and embark on a journey towards a brighter future behind the wheel.</p>
                            <div class="btn-box">
                                <a href="javascript:void(0)" class="theme-btn btn-two">Register Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="image-box pull-right">
                        <figure class="image overlay-laye-2"><img src="{{asset('assets/images/banner/forklift.jpg')}}" alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="shape">
                    <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-2.png')}});"></div>
                    <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-3.png')}});"></div>
                    <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-4.png')}});"></div>
                    <div class="shape-4" style="background-image: url({{asset('assets/images/shape/shape-5.png')}});"></div>
                    <div class="shape-5" style="background-image: url({{asset('assets/images/shape/shape-6.png')}});"></div>
                    <div class="shape-6" style="background-image: url({{asset('assets/images/shape/shape-7.png')}});"></div>
                    <div class="shape-7" style="background-image: url({{asset('assets/images/shape/shape-8.png')}});"></div>
                    <div class="shape-8" style="background-image: url({{asset('assets/images/shape/shape-9.png')}});"></div>
                </div>
                <div class="curve-text">
                    <div class="icon-box"><img src="{{asset('assets/images/icons/icon-2.png')}}" alt=""></div>
                    <span class="curved-circle">BigRig Truck Driving School – because you all need it –</span>
                    <h6><a href="javascript:void(0)">Book Now</a></h6>
                </div>
                <div class="outer-container clearfix">
                    <div class="content-inner pull-left">
                        <div class="content-box">
                            <h2>Steering in <br />Right Direction</h2>
                            <p>A drive of a thousand mile.</p>
                            <div class="btn-box">
                                <a href="javascript:void(0)" class="theme-btn btn-two">Starts Here</a>
                            </div>
                        </div>
                    </div>
                    <div class="image-box pull-right">
                        <figure class="image"><img src="{{asset('assets/images/banner/banner-img-3.jpg')}}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->


    <!-- about-section -->
    <section class="about-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 big-column">
                    <div class="inner-box">
                        <div class="title-text">
                            <h2>A perfect driving school with latest vehicles</h2>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                <div class="image-box">
                                    <figure class="image"><img src="{{asset('assets/images/resource/about-1.jpg')}}" alt=""></figure>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                                <div class="content-box">
                                    <h6>Since</h6>
                                    <h2>2024</h2>
                                    <div class="text">
                                        <p>With 15+ years in trucking and logistics, We are driven to prepare drivers for the road and help them build sustainable, rewarding careers. Our focus is on meeting the growing demand for skilled drivers while addressing safety and efficiency challenges in today’s logistics landscape. Our school has earned industry respect for its comprehensive curriculum and hands-on training, covering everything from safe driving techniques to complex logistics.</p>
                                    </div>
                                    <div class="inner">
                                        <figure class="signature"><img src="{{asset('assets/images/icons/signature-1.png')}}" alt=""></figure>
                                        <div class="author">
                                            <h4>Adekola Adedapo</h4>
                                            <span class="designation">Founder</span>
                                        </div>
                                    </div>
                                    <!-- <div class="btn-box">
                                        <a href="{{url('about')}}" class="theme-btn btn-two">Read More</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 small-column">
                    <div class="image-box">
                        <div class="shape" style="background-image: url({{asset('assets/images/shape/shape-11.png')}});"></div>
                        <figure class="image"><img src="{{asset('assets/images/team/founder.jpg')}}" alt=""></figure>
                        <div class="social-links">
                            <h6>Follow Me On</h6>
                            <ul class="social-list clearfix">
                                <li><a href="{{url('/')}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{url('/')}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{url('/')}}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.instagram.com/bigrig_truckdrivingschool/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->


    <!-- service-section -->
    <section class="service-section">
        <div class="shape">
            <div class="shape-1 float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-12.png')}});"></div>
            <div class="shape-2 float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-12.png')}});"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title light centred">
                <h2>Services customized for you</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme">
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="icon-box"><img src="{{asset('assets/images/icons/icon-3.png')}}" alt=""></div>
                            <figure class="image"><img src="{{asset('assets/images/service/service-1.jpg')}}" alt=""></figure>
                        </div>
                        <div class="lower-content">
                            <div class="text">
                                <h4><a href="javascript:void(0)">Driving Course</a></h4>
                                <p>Comprehensive driver education tailored to your needs.</p>
                            </div>
                            <div class="lower-box">
                                <ul class="arrow-icon clearfix">
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                </ul>
                                <!-- <div class="link">
                                    <a href="service-details.html"><i class="flaticon-right-arrow-1"></i>Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="icon-box"><img src="{{asset('assets/images/icons/icon-4.png')}}" alt=""></div>
                            <figure class="image"><img src="{{asset('assets/images/service/service-2.jpg')}}" alt=""></figure>
                        </div>
                        <div class="lower-content">
                            <div class="text">
                                <h4><a href="javascript:void(0)">Driving License</a></h4>
                                <p>Guidance to obtain your driving license swiftly.</p>
                            </div>
                            <div class="lower-box">
                                <ul class="arrow-icon clearfix">
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                </ul>
                                <!-- <div class="link">
                                    <a href="service-details.html"><i class="flaticon-right-arrow-1"></i>Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="icon-box"><img src="{{asset('assets/images/icons/icon-5.png')}}" alt=""></div>
                            <figure class="image"><img src="{{asset('assets/images/service/car.jpg')}}" alt=""></figure>
                        </div>
                        <div class="lower-content">
                            <div class="text">
                                <h4><a href="javascript:void(0)">Conventional Driving Training</a></h4>
                                <p>In-depth training for standard vehicle operation.</p>
                            </div>
                            <div class="lower-box">
                                <ul class="arrow-icon clearfix">
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                </ul>
                                <!-- <div class="link">
                                    <a href="service-details.html"><i class="flaticon-right-arrow-1"></i>Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="icon-box"><img src="{{asset('assets/images/icons/icon-3.png')}}" alt=""></div>
                            <figure class="image"><img src="{{asset('assets/images/service/truck.jpg')}}" alt=""></figure>
                        </div>
                        <div class="lower-content">
                            <div class="text">
                                <h4><a href="javascript:void(0)">Truck &amp; Commercial Training</a></h4>
                                <p>Specialized skills for truck and commercial vehicle driving.</p>
                            </div>
                            <div class="lower-box">
                                <ul class="arrow-icon clearfix">
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                </ul>
                                <!-- <div class="link">
                                    <a href="service-details.html"><i class="flaticon-right-arrow-1"></i>Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="icon-box"><img src="{{asset('assets/images/icons/icon-4.png')}}" alt=""></div>
                            <figure class="image"><img src="{{asset('assets/images/service/brt.jpg')}}" alt=""></figure>
                        </div>
                        <div class="lower-content">
                            <div class="text">
                                <h4><a href="javascript:void(0)">School Bus/BRT Training</a></h4>
                                <p>Focused training for safe, professional bus driving.</p>
                            </div>
                            <div class="lower-box">
                                <ul class="arrow-icon clearfix">
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                </ul>
                                <!-- <div class="link">
                                    <a href="service-details.html"><i class="flaticon-right-arrow-1"></i>Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <div class="icon-box"><img src="{{asset('assets/images/icons/icon-5.png')}}" alt=""></div>
                            <figure class="image"><img src="{{asset('assets/images/service/safety.jpg')}}"></figure>
                        </div>
                        <div class="lower-content">
                            <div class="text">
                                <h4><a href="javascript:void(0)">Safety and Compliance</a></h4>
                                <p>Expert consultation and advice to ensure full safety compliance.</p>
                            </div>
                            <div class="lower-box">
                                <ul class="arrow-icon clearfix">
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                    <li><i class="flaticon-right-arrow-1"></i></li>
                                </ul>
                                <!-- <div class="link">
                                    <a href="service-details.html"><i class="flaticon-right-arrow-1"></i>Read More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service-section end -->


    <!-- highlights-section -->
    <section class="highlights-section">
        <div class="outer-container">
            <div class="highlights-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                <div class="single-item">
                    <h4><i class="flaticon-right-arrow-2"></i>Speed Learning Institute</h4>
                </div>
                <div class="single-item">
                    <h4><i class="flaticon-right-arrow-2"></i>Advanced Driving Techniques</h4>
                </div>
                <div class="single-item">
                    <h4><i class="flaticon-right-arrow-2"></i>Excellent Drivers Academy</h4>
                </div>
                <div class="single-item">
                    <h4><i class="flaticon-right-arrow-2"></i>Beyond 5 Star Driving School</h4>
                </div>
                <div class="single-item">
                    <h4><i class="flaticon-right-arrow-2"></i>One Stop Driving School</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- highlights-section end -->


    <!-- find-section -->
    <section class="find-section">
        <div class="bg-layer" style="background-image: url({{asset('assets/images/background/find-bg.jpg')}});"></div>
        <div class="upper-box">
            <div class="bg-color"></div>
            <div class="shape">
                <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-16.png')}});"></div>
                <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-17.png')}});"></div>
                <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-18.png')}});"></div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h2>96% of students <br />pass the driving test <br />on first try</h2>
                            </div>
                            <p>Check out which of our courses would be most suitable for you.</p>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone Num*" required="">
                                    <button type="submit" class="theme-btn btn-two">Send Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lower-box">
            <div class="bg-color"></div>
            <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                <figure class="clients-logo"><a href="{{url('/')}}"><img src="{{asset('assets/images/clients/clients-1.png')}}" alt=""></a></figure>
                <figure class="clients-logo"><a href="{{url('/')}}"><img src="{{asset('assets/images/clients/clients-2.png')}}" alt=""></a></figure>
                <figure class="clients-logo"><a href="{{url('/')}}"><img src="{{asset('assets/images/clients/clients-3.png')}}" alt=""></a></figure>
                <figure class="clients-logo"><a href="{{url('/')}}"><img src="{{asset('assets/images/clients/clients-4.png')}}" alt=""></a></figure>
                <figure class="clients-logo"><a href="{{url('/')}}"><img src="{{asset('assets/images/clients/clients-5.png')}}" alt=""></a></figure>
                <figure class="clients-logo"><a href="{{url('/')}}"><img src="{{asset('assets/images/clients/clients-6.png')}}" alt=""></a></figure>
            </div>
        </div>
    </section>
    <!-- find-section end -->


    <!-- process-section -->
    <section class="process-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                    <div class="inner-box">
                        <div class="shape" style="background-image: url({{asset('assets/images/shape/shape-19.png')}});"></div>
                        <div class="sec-title">
                            <h2>Start the process</h2>
                            <p>Review our range of courses and choose the program that best fits your driving career goals, whether it’s commercial driving, licensing preparation, or specialized training.</p>
                        </div>
                        <div class="image-box">
                            <figure class="image"><img src="{{asset('assets/images/resource/video-1.jpg')}}" alt=""></figure>
                            <div class="video-btn">
                                <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption=""><i class="flaticon-play-button-1"></i></a>
                            </div>
                        </div> 
                        <div class="single-item">
                            <div class="icon"><img src="{{asset('assets/images/icons/icon-8.png')}}" alt=""></div>
                            <h3>Get Your First <br />Free Online Lesson Today…</h3>
                            <p>Schedule your class as your convenient.<a href="{{url('contact')}}"><i class="flaticon-right-arrow-1"></i>Schedule Now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                    <div class="inner-box">
                        <div class="single-item">
                            <div class="arrow-shape" style="background-image: url({{asset('assets/images/shape/shape-20.png')}});"></div>
                            <span class="count-text">01</span>
                            <div class="icon"><img src="{{asset('assets/images/icons/icon-9.png')}}" alt=""></div>
                            <h4><a href="{{url('/')}}">Consultation</a></h4>
                            <p>Meet with our advisors to customize your learning path and address any questions before training begins.</p>
                        </div>
                        <div class="single-item">
                            <div class="arrow-shape-2" style="background-image: url({{asset('assets/images/shape/shape-21.png')}});"></div>
                            <span class="count-text">02</span>
                            <div class="icon"><img src="{{asset('assets/images/icons/icon-10.png')}}" alt=""></div>
                            <h4><a href="{{url('/')}}">Buy Your Course</a></h4>
                            <p>Enroll in your chosen courses and secure your spot on the path to becoming a professional driver.</p>
                        </div>
                        <div class="single-item">
                            <div class="arrow-shape" style="background-image: url({{asset('assets/images/shape/shape-20.png')}});"></div>
                            <span class="count-text">03</span>
                            <div class="icon"><img src="{{asset('assets/images/icons/icon-11.png')}}" alt=""></div>
                            <h4><a href="{{url('/')}}">Start Your Training</a></h4>
                            <p>Begin hands-on training with expert instructors to build essential skills for real-world driving success.</p>
                        </div>
                        <div class="btn-box">
                            <a href="{{url('contact')}}" class="theme-btn btn-two">Send Request</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- process-section end -->


    <!-- pricing-section -->
    <section class="pricing-section">
        <div class="auto-container">
            <div class="sec-title centred">
                <h2>Valuable Packages & Offers</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                    <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="pricing-table">
                            <div class="table-header">
                                <h2><span class="symble">$</span>149<span class="text">.99</span><span class="course">per Course</span></h2>
                            </div>
                            <div class="package-box">
                                <h4>Conventional</h4>
                                <p>Regular Vehicles Training</p>
                            </div>
                            <div class="table-content">
                                <ul class="feature-list clearfix">
                                    <li>Theory<span>4 Lessons</span></li>
                                    <li>Practical<span>16 Lessons</span></li>
                                    <li>2 Months<span>2 hrs/day</span></li>
                                    <li>Car Type<span>Manual/Auto</span></li>
                                    <li>Certificate<span>Yes</span></li>
                                </ul>
                                <div class="btn-box">
                                    <a href="javascript:void(0)" class="theme-btn btn-two">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                    <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="pricing-table">
                            <div class="table-header">
                                <h2><span class="symble">$</span>249<span class="text">.99</span><span class="course">per Course</span></h2>
                            </div>
                            <div class="package-box">
                                <h4>Forklift</h4>
                                <p>Industrial Forklift Driving Training</p>
                            </div>
                            <div class="table-content">
                                <ul class="feature-list clearfix">
                                    <li>Theory<span>4 Lessons</span></li>
                                    <li>Practical<span>20 Lessons</span></li>
                                    <li>2 Months<span>1 hr/day</span></li>
                                    <li>Type<span>Counterbalance</span></li>
                                    <li>Certificate<span>Yes</span></li>
                                </ul>
                                <div class="btn-box">
                                    <a href="javascript:void(0)" class="theme-btn btn-two">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                    <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="pricing-table">
                            <div class="table-header">
                                <h2><span class="symble">$</span>299<span class="text">.99</span><span class="course">per Course</span></h2>
                            </div>
                            <div class="package-box">
                                <h4>Bus</h4>
                                <p>School Bus or BRT Training</p>
                            </div>
                            <div class="table-content">
                                <ul class="feature-list clearfix">
                                    <li>Theory<span>4 Lessons</span></li>
                                    <li>Practical<span>20 Lessons</span></li>
                                    <li>3 Months<span>2 hrs/day</span></li>
                                    <li>Bus Type<span>Transit Bus</span></li>
                                    <li>Certificate<span>Yes</span></li>
                                </ul>
                                <div class="btn-box">
                                    <a href="javascript:void(0)" class="theme-btn btn-two">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pricing-block">
                    <div class="pricing-block-one active-block wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="pricing-table">
                            <div class="table-header">
                                <span class="popular">popular</span>
                                <h2><span class="symble">$</span>449<span class="text">.99</span><span class="course">per Course</span></h2>
                            </div>
                            <div class="package-box">
                                <h4>Truck</h4>
                                <p>Truck &amp; Commercial Training</p>
                            </div>
                            <div class="table-content">
                                <ul class="feature-list clearfix">
                                    <li>Theory<span>6 Lessons</span></li>
                                    <li>Practical<span>25 Lessons</span></li>
                                    <li>4 Months<span>3 hrs/day</span></li>
                                    <li>Truck Type<span>Flatbed</span></li>
                                    <li>Certificate<span>Yes</span></li>
                                </ul>
                                <div class="btn-box">
                                    <a href="javascript:void(0)" class="theme-btn btn-two">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing-section end -->


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


    <!-- advanced-section -->
    <section class="advanced-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 title-column">
                    <div class="title-inner">
                        <div class="sec-title">
                            <h2>The advanced level course <br />is designed for our learners</h2>
                        </div>
                        <div class="download-box">
                            <div class="icon"><i class="flaticon-download"></i></div>
                            <h4><a href="{{url('/')}}">Download Course Content</a></h4>
                            <h5>pdf.4mb</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                    <div class="image-box">
                        <div class="shape" style="background-image: url({{asset('assets/images/shape/shape-23.png')}});"></div>
                        <figure class="image"><img src="{{asset('assets/images/resource/car-1.png')}}" alt=""></figure>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 text-column">
                    <div class="text-inner">
                        <p>Our advanced course is crafted to elevate your driving skills, offering in-depth training and expert insights to prepare you for professional-level driving and complex road scenarios.</p>
                        <ul class="list-style-one clearfix">
                            <li>Responsibilities as a Driver</li>
                            <li>Vehicle Controls</li>
                            <li>Traffics Signs & Control Devices</li>
                            <li>Rules of the Road</li>
                            <li>Encountering other Road Users</li>
                            <li>Driving in Dangerous Condition</li>
                            <li>Incase of Accident</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- advanced-section end -->


    <!-- testimonial-section -->
    <section class="testimonial-section">
        <div class="bg-layer" style="background-image: url({{asset('assets/images/background/testimonial-bg.jpg')}});"></div>
        <div class="pattern-layer float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-5.png')}});"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                    <div class="title-inner">
                        <div class="sec-title light">
                            <h2>Reviews & Testimonials</h2>
                            <p>Denounce with righteous indignation & dislike men who are so beguiled demoralized.</p>
                        </div>
                        <div class="rating-box">
                            <h4>Excellent</h4>
                            <ul class="rating clearfix">
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star"></i></li>
                                <li><i class="flaticon-star-half-empty"></i></li>
                            </ul>
                        </div>
                        <div class="review-box">
                            <p>Trust Score 4.5 (Based on 2,500 reviews)</p>
                            <a href="{{url('/')}}" class="theme-btn btn-two">all Reviews</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 testimonial-column">
                    <div class="testimonial-content">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 testimonial-block">
                                <div class="testimonil-block-one">
                                    <div class="inner-box">
                                        <div class="border-box"></div>
                                        <div class="bg-shape"></div>
                                        <ul class="rating clearfix">
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                        </ul>
                                        <h4>This is the Best Driving <br />School in City.</h4>
                                        <p>Best driving school I’ve ever been to love it the instructors they’re very patient. Professional understanding & help gain my confidence of driving, I recommend to friends.</p>
                                        <div class="author-box">
                                            <figure class="author-thumb"><img src="{{asset('assets/images/resource/testimonial-1.jpg')}}" alt=""></figure>
                                            <h4>Sodiq Opayinka</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 testimonial-block">
                                <div class="testimonil-block-one">
                                    <div class="inner-box">
                                        <div class="border-box"></div>
                                        <div class="bg-shape"></div>
                                        <ul class="rating clearfix">
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                        </ul>
                                        <h4>Great Experience with <br />BigRig Truck Driving School Team.</h4>
                                        <p>I could not imagine a driving school look like BigRig Truck Driving School. It is state of art facility with rich contents and outstanding trainers. It was fun learning & I enjoyed the whole experience.</p>
                                        <div class="author-box">
                                            <figure class="author-thumb"><img src="{{asset('assets/images/resource/testimonial-2.jpg')}}" alt=""></figure>
                                            <h4>Ololade Shittu</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->


    <!-- newsletter-section -->
    <section class="newsletter-section">
        <div class="shape">
            <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-24.png')}});"></div>
            <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-25.png')}});"></div>
            <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-5.png')}});"></div>
            <div class="shape-4" style="background-image: url({{asset('assets/images/shape/shape-26.png')}});"></div>
            <div class="shape-5" style="background-image: url({{asset('assets/images/shape/shape-27.png')}});"></div>
            <div class="shape-6" style="background-image: url({{asset('assets/images/shape/shape-28.png')}});"></div>
            <div class="shape-7" style="background-image: url({{asset('assets/images/shape/shape-29.png')}});"></div>
            <div class="shape-8"></div>
            <div class="shape-9" style="background-image: url({{asset('assets/images/shape/shape-30.png')}});"></div>
        </div>
        <div class="auto-container">
            <span class="big-text">BigRig Truck Driving School</span>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                    <div class="single-item">
                        <figure class="image"><img src="{{asset('assets/images/resource/newsletter-1.jpg')}}" alt=""></figure>
                        <div class="content-box">
                            <div class="icon-box"><i class="flaticon-traffic-lights"></i></div>
                            <h2>Learn <br />Traffic Signs</h2>
                            <p>Follow the rules while you drive.</p>
                            <div class="download-box">
                                <h6>Download.pdf <button><i class="flaticon-download"></i></button></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                    <div class="single-item">
                        <figure class="image"><img src="{{asset('assets/images/resource/newsletter-2.jpg')}}" alt=""></figure>
                        <div class="content-box">
                            <div class="icon-box"><i class="flaticon-email"></i></div>
                            <h2>Don’t <br />Miss Anything</h2>
                            <p>Subscribe to get offers & updates.</p>
                            <div class="subscribe-form">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address" required="">
                                        <button type="submit"><i class="flaticon-send"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- newsletter-section end -->

    <!-- Include footer -->
    @include('frontend.partials.footer')

@endsection
