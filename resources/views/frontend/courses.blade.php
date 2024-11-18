@extends('frontend.layouts.main')

@section('title', 'Courses') <!-- Sets the title for the page -->

@section('content')

        <!-- Page Title -->
        <section class="page-title">
            <div class="bg-layer" style="background-image: url({{asset('assets/images/background/page-title.jpg')}});"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Our Courses</h1>
                    <ul class="bread-crumb clearfix">
                        <li class=""><a href="{{url('/')}}">Home</a></li>
                        <li>Courses</li>
                        <li>Modern</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- about-style-four -->
        <section class="about-style-four">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 image-column">
                        <div class="image-box">
                            <span class="big-text">hi-tech</span>
                            <figure class="image"><img src="{{asset('assets/images/resource/about-4.jpg')}}" alt=""></figure>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h2>Quality driver training through one-on-one practical teaching</h2>
                                <a href="{{url('courses')}}" class="theme-btn btn-five">get suggestion</a>
                            </div>
                            <div class="inner-box">
                                <!-- <div class="text">
                                    <p>At BigRig Truck Driving School, we’re committed to delivering top-quality driver education through focused, one-on-one training. Our expert trainers are dedicated to helping you understand all aspects of safe and efficient driving, giving you a comprehensive understanding of essential skills and knowledge.</p>
                                </div> -->
                                <div class="inner">
                                    <div class="single-item">
                                        <div class="icon-box"><i class="flaticon-right-arrow-1"></i></div>
                                        <h4>Flexible Timings</h4>
                                        <p>We offer flexible training times to accommodate your schedule, allowing you to learn at a pace that suits you.</p>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-box"><i class="flaticon-right-arrow-1"></i></div>
                                        <h4>Experienced Trainers</h4>
                                        <p>Our skilled trainers ensure each session is effective, enjoyable, and conducted in a safe learning environment.</p>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-box"><i class="flaticon-right-arrow-1"></i></div>
                                        <h4>Standard Vehicles</h4>
                                        <p>Our reliable, industry-standard vehicles are well-maintained, providing a realistic and comfortable learning experience.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-four end -->


        <!-- courses-section -->
        <section class="courses-section alternat-2">
            <div class="pattern-layer" style="background-image: url({{asset('assets/images/shape/shape-83.png')}});"></div>
            <div class="line-box">
                <div class="line line-1"></div>
                <div class="line line-2"></div>
                <div class="line line-3"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title">
                    <h2>Course to drive with confidence</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                        <div class="inner-box border">
                            <div class="image-box">
                                <div class="text">
                                    <h6>From</h6>
                                    <h3><span>$</span>449.99</h3>
                                    <h5>Per Course</h5>
                                </div>
                                <figure class="image"><img src="{{asset('assets/images/resource/courses-1.jpg')}}" alt=""></figure>
                            </div>
                            <div class="content-box">
                                <h6>BigRig Truck Driving School</h6>
                                <h2>Truck Driving <br />Course</h2>
                                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil pain...</p>
                                <div class="inner">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><img src="{{asset('assets/images/icons/icon-6.png')}}" alt=""></div>
                                                <h6><a href="{{url('/')}}">Theory Session</a></h6>
                                                <span>06 Hours</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><img src="{{asset('assets/images/icons/icon-7.png')}}" alt=""></div>
                                                <h6><a href="{{url('/')}}">Practical Session</a></h6>
                                                <span>25 Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h5><a href="driving-course.html"><i class="flaticon-information-button"></i>Full Course Details</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                        <div class="inner-box border">
                            <div class="content-box">
                                <h6>BigRig Truck Driving School</h6>
                                <h2>School Bus Driving <br />Course</h2>
                                <p>How all this mistaken denouncing  pleasure praising pain was born you a complete procure him some take a trivial examples which off us ever undertakes laborious...</p>
                                <div class="inner">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><img src="{{asset('assets/images/icons/icon-6.png')}}" alt=""></div>
                                                <h6><a href="{{url('/')}}">Theory Session</a></h6>
                                                <span>04 Hours</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><img src="{{asset('assets/images/icons/icon-7.png')}}" alt=""></div>
                                                <h6><a href="{{url('/')}}">Practical Session</a></h6>
                                                <span>20 Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h5><a href="driving-course.html"><i class="flaticon-information-button"></i>Full Course Details</a></h5>
                                </div>
                            </div>
                            <div class="image-box">
                                <div class="text">
                                    <h6>From</h6>
                                    <h3><span>$</span>299.99</h3>
                                    <h5>Per Course</h5>
                                </div>
                                <figure class="image"><img src="{{asset('assets/images/resource/courses-2.jpg')}}" alt=""></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                        <div class="inner-box mt_100 border">
                            <div class="image-box">
                                <div class="text">
                                    <h6>From</h6>
                                    <h3><span>$</span>249.99</h3>
                                    <h5>Per Course</h5>
                                </div>
                                <figure class="image"><img src="{{asset('assets/images/resource/courses-4.jpg')}}" alt=""></figure>
                            </div>
                            <div class="content-box">
                                <h6>BigRig Truck Driving School</h6>
                                <h2>Forklift Driving <br />Course</h2>
                                <p>How all this mistaken denouncing  pleasure praising pain was born you a complete procure him some take a trivial examples which off us ever undertakes laborious...</p>
                                <div class="inner">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><img src="{{asset('assets/images/icons/icon-6.png')}}" alt=""></div>
                                                <h6><a href="{{url('/')}}">Theory Session</a></h6>
                                                <span>04 Hours</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><img src="{{asset('assets/images/icons/icon-7.png')}}" alt=""></div>
                                                <h6><a href="{{url('/')}}">Practical Session</a></h6>
                                                <span>20 Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h5><a href="driving-course.html"><i class="flaticon-information-button"></i>Full Course Details</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 right-column">
                        <div class="inner-box mt_100 border">
                            <div class="content-box">
                                <h6>BigRig Truck Driving School</h6>
                                <h2>Conventional Driving <br />Course</h2>
                                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil pain...</p>
                                <div class="inner">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><img src="{{asset('assets/images/icons/icon-6.png')}}" alt=""></div>
                                                <h6><a href="{{url('/')}}">Theory Session</a></h6>
                                                <span>04 Hours</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><img src="{{asset('assets/images/icons/icon-7.png')}}" alt=""></div>
                                                <h6><a href="{{url('/')}}">Practical Session</a></h6>
                                                <span>16 Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h5><a href="driving-course.html"><i class="flaticon-information-button"></i>Full Course Details</a></h5>
                                </div>
                            </div>
                            <div class="image-box">
                                <div class="text">
                                    <h6>From</h6>
                                    <h3><span>$</span>149.99</h3>
                                    <h5>Per Course</h5>
                                </div>
                                <figure class="image"><img src="{{asset('assets/images/resource/courses-5.jpg')}}" alt=""></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- courses-section end -->


        <!-- chooseus-section -->
        <section class="chooseus-section alternat-2">
            <div class="pattern-layer">
                <div class="pattern-1 float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-4.png')}});"></div>
                <div class="pattern-2 float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-4.png')}});"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title light centred">
                    <h2>Here to help you become <br />a great briver</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <span class="count-text">01</span>
                                <div class="icon-box"><i class="flaticon-driver"></i></div>
                                <div class="light-icon"><img src="{{asset('assets/images/icons/icon-18.png')}}" alt=""></div>
                                <h4><a href="{{url('/')}}">Trained <br />Instructors</a></h4>
                                <p>Highly qualified instructors dedicated to developing safe, skilled drivers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <span class="count-text">02</span>
                                <div class="icon-box"><i class="flaticon-dollar-symbol"></i></div>
                                <div class="light-icon"><img src="{{asset('assets/images/icons/icon-19.png')}}" alt=""></div>
                                <h4><a href="{{url('/')}}">Fair <br />Pricing Plans</a></h4>
                                <p>Affordable, high-quality instruction tailored to your training needs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <span class="count-text">03</span>
                                <div class="icon-box"><i class="flaticon-car"></i></div>
                                <div class="light-icon"><img src="{{asset('assets/images/icons/icon-20.png')}}" alt=""></div>
                                <h4><a href="{{url('/')}}">Well Maintained <br />Vehicles</a></h4>
                                <p>Modern trucks, meticulously maintained for safe learning.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInLeft animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <span class="count-text">04</span>
                                <div class="icon-box"><i class="flaticon-cone"></i></div>
                                <div class="light-icon"><img src="{{asset('assets/images/icons/icon-21.png')}}" alt=""></div>
                                <h4><a href="{{url('/')}}">Best <br />Safety Measures</a></h4>
                                <p>Strict safety protocols ensure secure and effective training sessions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <span class="count-text">05</span>
                                <div class="icon-box"><i class="flaticon-overtime"></i></div>
                                <div class="light-icon"><img src="{{asset('assets/images/icons/icon-22.png')}}" alt=""></div>
                                <h4><a href="{{url('/')}}">Pick Up & <br />Drop Off On Time</a></h4>
                                <p>Reliable transportation ensures you’re always on time for each session.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one wow fadeInRight animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <span class="count-text">06</span>
                                <div class="icon-box"><i class="flaticon-event"></i></div>
                                <div class="light-icon"><img src="{{asset('assets/images/icons/icon-23.png')}}" alt=""></div>
                                <h4><a href="{{url('/')}}">Flexible Course <br />Completion</a></h4>
                                <p>Complete your training at a pace that suits your schedule.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- chooseus-section end -->


        <!-- testimonial-style-two -->
        <section class="testimonial-style-two alternat-2">
            <figure class="image-layer"><img src="{{asset('assets/images/resource/testimonial-1.png')}}" alt=""></figure>
            <div class="shape">
                <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-84.png')}});"></div>
                <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-85.png')}});"></div>
                <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-86.png')}});"></div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-4 content-column">
                        <div class="content-inner">
                            <div class="sec-title">
                                <h2>Feedback from <br />our driving students</h2>
                            </div>
                            <div class="testimonial-inner">
                                <div class="testimonial-content">
                                    <figure class="thumb-box"><img src="{{asset('assets/images/resource/testimonial-3.jpg')}}" alt=""></figure>
                                    <div class="inner-box">
                                        <div class="text">
                                            <div class="shape-layer"></div>
                                            <div class="quote-box"><i class="flaticon-quote"></i></div>
                                            <h4>This is the best Driving School.</h4>
                                            <p>Best driving school I’ve ever been to love it the instructors they’re very patient.</p>
                                        </div>
                                        <div class="author-box">
                                            <h5>Sodiq Opayinka</h5>
                                            <ul class="rating clearfix">
                                                <li><i class="flaticon-star"></i></li>
                                                <li><i class="flaticon-star"></i></li>
                                                <li><i class="flaticon-star"></i></li>
                                                <li><i class="flaticon-star"></i></li>
                                                <li><i class="flaticon-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <figure class="thumb-box"><img src="{{asset('assets/images/resource/testimonial-4.jpg')}}" alt=""></figure>
                                    <div class="inner-box">
                                        <div class="text">
                                            <div class="shape-layer"></div>
                                            <div class="quote-box"><i class="flaticon-quote"></i></div>
                                            <h4>Great Experience with BigRig Truck Driving School.</h4>
                                            <p>I could not imagine a driving school look like BigRig Truck Driving School. Facility with outstanding trainers.</p>
                                        </div>
                                        <div class="author-box">
                                            <h5>Ololade Shittu</h5>
                                            <ul class="rating clearfix">
                                                <li><i class="flaticon-star"></i></li>
                                                <li><i class="flaticon-star"></i></li>
                                                <li><i class="flaticon-star"></i></li>
                                                <li><i class="flaticon-star"></i></li>
                                                <li><i class="flaticon-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-style-two end -->


        <!-- location-section -->
        <section class="location-section alternat-2">
            <div class="auto-container">
                <div class="tabs-box">
                    <div class="row clearfix">
                        <div class="col-lg-5 col-md-12 col-sm-12 content-column">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h2>Nearest locations to learn your driving course</h2>
                                </div>
                                <p>Mistaken denouncing pleasure and praising pain was born and we will give you complete account.</p>
                                <a href="{{url('contact')}}" class="theme-btn btn-five">View More</a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 location-column">
                            <div class="location-box">
                                <div class="map" style="background-image: url({{asset('assets/images/shape/shape-62.png')}});"></div>
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li class="tab-btn" data-tab="#tab-1">
                                        <div class="text">
                                            <h5>Ogun</h5>
                                            <span>0 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn" data-tab="#tab-2">
                                        <div class="text">
                                            <h5>Osun</h5>
                                            <span>0 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn" data-tab="#tab-3">
                                        <div class="text">
                                            <h5>Lagos</h5>
                                            <span>0 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn" data-tab="#tab-4">
                                        <div class="text">
                                            <h5>Kwara</h5>
                                            <span>0 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn active-btn" data-tab="#tab-5">
                                        <div class="text">
                                            <h5>Oyo</h5>
                                            <span>1 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn" data-tab="#tab-6">
                                        <div class="text">
                                            <h5>Abuja</h5>
                                            <span>0 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn" data-tab="#tab-7">
                                        <div class="text">
                                            <h5>Edo</h5>
                                            <span>0 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn" data-tab="#tab-8">
                                        <div class="text">
                                            <h5>Kogi</h5>
                                            <span>0 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn" data-tab="#tab-9">
                                        <div class="text">
                                            <h5>Ondo</h5>
                                            <span>0 Location</span>
                                        </div>
                                    </li>
                                    <li class="tab-btn" data-tab="#tab-10">
                                        <div class="text">
                                            <h5>Enugu</h5>
                                            <span>0 Locations</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tabs-content">
                        <div class="tab" id="tab-1">
                            <div class="row clearfix">
                                <!-- <div class="col-lg-4 col-md-6 col-sm-12 location-block">
                                    <div class="single-location">
                                        <div class="text">
                                            <div class="icon"><img src="{{asset('assets/images/icons/icon-38.png')}}" alt=""></div>
                                            <p>880 Nulla Street, New Mexico USA 87503.</p>
                                        </div>
                                        <h5>Near by: <span>Corpus Christi College</span></h5>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="tab active-tab" id="tab-5">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12 location-block">
                                    <div class="single-location">
                                        <div class="text">
                                            <div class="icon"><img src="{{asset('assets/images/icons/icon-38.png')}}" alt=""></div>
                                            <p>No 6, Blue Gate Estate, Opposite Liberty Stadium, Ring Road, Ibadan</p>
                                        </div>
                                        <h5>Near by: <span>Liberty Stadium</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- location-section end -->

        <!-- Include footer -->
        @include('frontend.partials.footer')

@endsection