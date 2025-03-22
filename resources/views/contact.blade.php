@extends('layouts.main')

@section('title', 'Contact') <!-- Sets the title for the page -->

@section('content')

    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{asset('assets/images/background/page-title.jpg')}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Contact Us</h1>
                <ul class="bread-crumb clearfix">
                    <li class=""><a href="{{route('home')}}">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- contact-section -->
    <section class="contact-section">
        <div class="shape" style="background-image: url({{asset('assets/images/shape/shape-5.png')}});"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box" style="background-image: url({{asset('assets/images/background/contact-1.jpg')}});">
                            <div class="inner">
                                <div class="single-item">
                                    <div class="icon-box"><img src="{{asset('assets/images/icons/icon-53.png')}}" alt=""></div>
                                    <h4>We are Here</h4>
                                    <p>{{ $settings->headquarters }}</p>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><img src="{{asset('assets/images/icons/icon-54.png')}}" alt=""></div>
                                    <h4>Quick Contact</h4>
                                    <p><a href="tel:{{ $settings->business_contact }}">{{ $settings->business_contact }}</a><br /><a href="mailto:info@bigrigdrivingschool.ng">{{ $settings->business_email }}</a></p>
                                </div>
                                <div class="single-item">
                                    <div class="icon-box"><img src="{{asset('assets/images/icons/icon-55.png')}}" alt=""></div>
                                    <h4>Off.Hours</h4>
                                    <p>Monday - Saturday: 9am to 6pm <br />Sunday: Holiday</p>
                                </div>
                            </div>
                            <ul class="social-links clearfix">
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
                    <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <div class="sec-title light">
                                <h2>Send your enquiry</h2>
                                <p>Complete the enquiry form & we will be in touch as soon as possible.</p>
                            </div>
                            <form method="post" action="" id="contact-form"> 
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="phone" required="" placeholder="Phone">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email Address" required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                               <option data-display="I am parent looking course for my teen">I am parent looking course for my teen</option>
                                               @foreach ($objectives as $course)
                                                <option value="{{ $course->id }}">{{ $course->objective }}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                               <option data-display="Extended Driving Course">Extended Driving Course</option>
                                               <option value="1">Driving Course</option>
                                               <option value="2">Driving License</option>
                                               <option value="3">Insurance</option>
                                               <option value="4">Road Safety Guide</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button type="submit" class="theme-btn" name="submit-form">SEND</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="lower-box centred" style="background-image: url({{asset('assets/images/shape/shape-100.png')}});">
                    <h5><a href="https://maps.app.goo.gl/L62rz3iDLtvn4m6A8" target="_blank">Click here to view us on map</a></h5>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->


    <!-- location-style-two -->
    <section class="location-style-two">
        <div class="shape">
            <div class="shape-1"></div>
            <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-101.png')}});"></div>
            <div class="shape-3 float-bob-x" style="background-image: url({{asset('assets/images/shape/shape-6.png')}});"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred">
                <h2>List of our branches</h2>
                <p>3 branches around Nigeria.</p>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 location-block">
                    <div class="location-block-one">
                        <div class="inner-box">
                            <h3>Ibadan Branch</h3>
                            <figure class="image-box"><img src="{{asset('assets/images/resource/location-1.jpg')}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="single-item">
                                    <h6>Location</h6>
                                    <p>{{ $settings->headquarters }}</p>
                                </div>
                                <div class="single-item">
                                    <h6>Contact</h6>
                                    <p><a href="tel:{{ $settings->business_contact }}">{{ $settings->business_contact }}</a><br /><a href="mailto:{{ $settings->business_email }}">{{ $settings->business_email }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 location-block">
                    <div class="location-block-one">
                        <div class="inner-box">
                            <h3>Ibadan Branch</h3>
                            <figure class="image-box"><img src="{{asset('assets/images/resource/location-1.jpg')}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="single-item">
                                    <h6>Location</h6>
                                    <p>{{ $settings->headquarters }}</p>
                                </div>
                                <div class="single-item">
                                    <h6>Contact</h6>
                                    <p><a href="tel:{{ $settings->business_contact }}">{{ $settings->business_contact }}</a><br /><a href="mailto:{{ $settings->business_email }}">{{ $settings->business_email }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 location-block">
                    <div class="location-block-one">
                        <div class="inner-box">
                            <h3>Ibadan Branch</h3>
                            <figure class="image-box"><img src="{{asset('assets/images/resource/location-1.jpg')}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="single-item">
                                    <h6>Location</h6>
                                    <p>{{ $settings->headquarters }}</p>
                                </div>
                                <div class="single-item">
                                    <h6>Contact</h6>
                                    <p><a href="tel:{{ $settings->business_contact }}">{{ $settings->business_contact }}</a><br /><a href="mailto:{{ $settings->business_email }}">{{ $settings->business_email }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- location-style-two end -->

    <!-- Include footer -->
    @include('partials.footer')

@endsection