@extends('frontend.layouts.main')

@section('title', 'FAQs') <!-- Sets the title for the page -->

@section('content')

    <!-- Page Title -->
    <section class="page-title">
        <div class="bg-layer" style="background-image: url({{asset('assets/images/background/page-title.jpg')}});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Question & Answers</h1>
                <ul class="bread-crumb clearfix">
                    <li class=""><a href="{{url('/')}}">Home</a></li>
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
                <div class="form-inner">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="search" name="search-field" placeholder="Search question..." required="">
                            <button type="submit"><i class="flaticon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="accordion-inner">
                <ul class="accordion-box">
                    <li class="accordion block active-block">
                        <div class="acc-btn active">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>What types of driving courses do you offer?</h4>
                        </div>
                        <div class="acc-content current">
                            <div class="text">
                                <p><span>a:</span>We offer training for trucks, forklifts, school buses/BRT, and regular vehicles.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>How long does each driving course take?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Course durations vary by vehicle type; most can be completed in a few months.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Are your instructors certified?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Yes, all instructors are highly qualified and certified for professional training.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>What types of driving courses do you offer?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>We offer training for trucks, forklifts, school buses/BRT, and regular vehicles.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Can I learn on weekends?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Yes, we offer weekend classes for added flexibility.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>What are the age requirements for each program?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>For truck and forklift training, you must be 18 or older; for others, 16+.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Do you provide training for commercial driver’s licenses (CDL)?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Yes, we provide CDL training for truck and bus driving courses.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Is job placement assistance available after training?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>We offer job placement assistance for those completing our commercial driving programs.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Do I need prior experience to start training?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>No prior experience is required. Our programs are designed for all skill levels.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>What safety measures are in place during training?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>We strictly follow safety protocols and use well-maintained, standard vehicles.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>How are the training vehicles maintained?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Our vehicles are regularly inspected and maintained for optimal safety and reliability.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Is there a payment plan option for the courses?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Yes, we offer flexible payment plans to make training affordable.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>What is the process for enrolling in a course?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Simply contact us or fill out the online form to start the enrollment process.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Are there online or virtual classes available?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Theory classes are available online, but practical driving requires in-person training.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Do you offer refresher courses for experienced drivers?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Yes, we have refresher courses for drivers looking to improve or update their skills.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Is there a written exam as part of the training?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Yes, each course includes a written test covering safety and road rules.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Can I bring my own vehicle for regular driving training?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Yes, you may bring your own vehicle if it meets our safety requirements.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>What happens if I don’t pass my driving test?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>We offer additional practice sessions at no extra cost until you pass.</p>
                            </div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"></div>
                            <h4><span>q:</span>Do you offer certification upon completion?</h4>
                        </div>
                        <div class="acc-content">
                            <div class="text">
                                <p><span>a:</span>Yes, upon completing your course, we provide a certificate and guidance for licensing.</p>
                            </div>
                        </div>
                    </li>                        
                </ul>
            </div>
        </div>
    </section>
    <!-- faq-page-section end -->

    <!-- Include footer -->
    @include('frontend.partials.footer')

@endsection