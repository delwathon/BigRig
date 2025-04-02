@extends('layouts.main')

@section('title', 'FAQs') <!-- Sets the title for the page -->

@section('content')

    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{asset('assets/images/background/page-title.jpg')}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Question & Answers</h1>
                <ul class="bread-crumb clearfix">
                    <li class=""><a href="{{ route('index') }}">Home</a></li>
                    <li>About</li>
                    <li>faq’s</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- faq-page-section -->
    <section class="faq-page-section">
        <div class="auto-container">
            <div class="upper-box">
                <span class="big-text">q&a</span>
                <div class="sec-title"><h2>Find answers in our <br />list of frequently asked questions</h2></div>
                {{-- <div class="form-inner">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="search" name="search-field" placeholder="Search question..." required="">
                            <button type="submit"><i class="flaticon-search"></i></button>
                        </div>
                    </form>
                </div> --}}
            </div>
            <div class="accordion-inner">
                <ul class="accordion-box">
                    @foreach ($faqs as $faq)
                        <li class="accordion block">
                            <div class="acc-btn">
                                <div class="icon-outer"></div>
                                <h4><span>q:</span>{{ $faq->question }}</h4>
                            </div>
                            <div class="acc-content">
                                <div class="text">
                                    <p><span>a:</span>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach                 
                </ul>
            </div>
        </div>
    </section>
    <!-- faq-page-section end -->

    <!-- Include footer -->
    {{-- @include('partials.footer') --}}

@endsection