@php use Illuminate\Support\Str; @endphp

@extends('layouts.main')

@section('title', 'Courses') <!-- Sets the title for the page -->

@section('content')

    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{asset('assets/images/background/page-title.jpg')}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Our Courses</h1>
                <ul class="bread-crumb clearfix">
                    <li class=""><a href="{{ route('index') }}">Home</a></li>
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
                            <a href="{{route('contact')}}" class="theme-btn btn-five">get suggestion</a>
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


    <!-- course-style-three -->
    <section class="course-style-three alternat-2">
        <div class="shape">
            <div class="shape-1" style="background-image: url(assets/images/shape/shape-87.png);"></div>
            <div class="shape-3 float-bob-x" style="background-image: url(assets/images/shape/shape-6.png);"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred">
                <h2>Course to drive with confidence</h2>
            </div>
            <div class="row clearfix">
                @foreach ($objectives as $course)
                <div class="col-lg-6 col-md-12 col-sm-12 course-block">
                    <div class="course-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="price">
                                    @php
                                        $formattedPrice = number_format($course->price, 2, '.', ',');
                                        [$whole, $decimal] = explode('.', $formattedPrice);
                                    @endphp
                                    <h2><span class="text">From</span><span class="symble">{{ $settings->base_currency }}</span>{!! $whole !!}<sub>.{{ $decimal }}</sub></h2>
                                </div>
                                <figure class="image"><img src="{{ Storage::url($course->image_url) }}" alt="{{ $course->objective }}"></figure>
                            </div>
                            {{-- <div class="content-box">
                                <p>Course Overview</p>
                                <div class="single-box">
                                    <div class="single-item">
                                        <div class="icon-box"><img src="assets/images/icons/icon-39.png" alt=""></div>
                                        <h6>Course Duration</h6>
                                        <span>{{ $course->duration }} weeks</span>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-box"><img src="assets/images/icons/icon-40.png" alt=""></div>
                                        <h6>Theory Session</h6>
                                        <span>{{ $course->theory_session }} Hours</span>
                                    </div>
                                    <div class="single-item">
                                        <div class="icon-box"><img src="assets/images/icons/icon-40.png" alt=""></div>
                                        <h6>Practical Session</h6>
                                        <span>{{ $course->practical_session }} Hours</span>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('course', ['name' => Str::slug($course->objective)]) }}">Course Details</a>
                                </div>                                                                     
                            </div> --}}
                        </div>
                        <div class="lower-box">
                            <div class="icon-box"><img src="assets/images/icons/icon-41.png" alt=""></div>
                            <div class="icon-box-2"><img src="assets/images/icons/icon-42.png" alt=""></div>
                            <h6>{{ $settings->site_name }}</h6>
                            <h3><a href="{{ route('course', ['name' => Str::slug($course->objective)]) }}">{{ $course->objective }} Training</a></h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- course-style-three end -->

    <!-- Include footer -->
    {{-- @include('partials.footer') --}}

@endsection