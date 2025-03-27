@extends('layouts.main')

@section('title', 'Our Instructors') <!-- Sets the title for the page -->

@section('content')

    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{ asset('assets/images/background/page-title.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Instructors</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>About</li>
                    <li>Instructors</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- team-section -->
    <section class="team-section team-page alternat-2">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach ($instructors as $instructor)
                    <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                        <div class="team-block-one">
                            <div class="inner-box">
                                <div class="image-box">
                                    <ul class="social-links clearfix">
                                        @foreach (['facebook' => 'facebook-f', 'twitter' => 'twitter', 'linkedin' => 'linkedin-in',] as $platform => $icon)
                                            @if (!empty($instructor->{$platform . '_handle'}))
                                                <li>
                                                    <a href="{{ $instructor->{$platform . '_handle'} }}" target="_blank">
                                                        <i class="fab fa-{{ $icon }}"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div class="shape">
                                        <div class="shape-1" style="background-image: url({{asset('assets/images/shape/shape-57.png')}});"></div>
                                        <div class="shape-2" style="background-image: url({{asset('assets/images/shape/shape-58.png')}});"></div>
                                        <div class="shape-3" style="background-image: url({{asset('assets/images/shape/shape-76.png')}});"></div>
                                    </div>
                                    <span class="text">{{ $settings->site_name }}</span>
                                    <figure class="image"><img src="{{ $instructor->profile_photo_path ? Storage::url($instructor->profile_photo_path) : Storage::url('users/avatar.png') }}" alt="{{ $instructor->firstName }} {{ $instructor->lastName }}"></figure>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="javascript:void(0)">{{ $instructor->firstName }} {{ $instructor->lastName }}</a></h4>
                                    <span class="designation">{{ $instructor->role->role_name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- team-section end -->

    <!-- Include footer -->
    @include('partials.footer')

@endsection