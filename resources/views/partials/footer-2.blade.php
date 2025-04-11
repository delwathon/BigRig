<!-- footer-style-two -->
<section class="footer-style-two">
    <div class="footer-top">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        <figure class="footer-logo"><a href="{{ route('index') }}"><img src="{{ Storage::url($site->dark_theme_logo) }}" alt=""></a></figure>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="widget-content">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <ul class="links-list clearfix">
                                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                                        <li><a href="{{ route('courses') }}">Courses</a></li>
                                        {{-- <li><a href="javascript:void(0)">Services</a></li> --}}
                                        <li><a href="{{ route('our-instructors') }}">Driving Instructors</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <ul class="links-list clearfix">
                                        <li><a href="{{ route('register') }}">Enrol Now</a></li>
                                        <li><a href="{{ route('contact') }}">Find Us</a></li>
                                        <li><a href="{{ route('faq') }}">Got A Question?</a></li>
                                        {{-- <li><a href="javascript:void(0)">Rules & Signs</a></li>
                                        <li><a href="javascript:void(0)">Safety Guide</a></li>
                                        <li><a href="javascript:void(0)">Pricing Plan</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget newsletter-widget">
                        <div class="widget-content">
                            <h3>Subscribe to our <br />newsletter.</h3>
                            <form action="{{ route('email-subscription') }}" method="post">
                            @csrf
                                <div class="form-group">
                                    <div class="icon"><i class="fas fa-envelope"></i></div>
                                    <input type="text" name="email" placeholder="Your Email*" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="theme-btn btn-one">Subscribe</button>
                                </div>
                            </form>
                            <div class="text">
                                <p><span>*</span>Be the first to get the most recent updates.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="bottom-inner clearfix">
                <div class="copyright pull-left">
                    <p>Copyrights <span>&copy; 2022 <a href="javascript:void(0)">BigRig Truck Driving School</a>.</span> All Rights Reserved.</p>
                </div>
                <ul class="footer-nav pull-right">
                    <li><a href="javascript:void(0)">Privacy Policy</a></li>
                    <li><a href="javascript:void(0)">Term Of Use</a></li>
                    <li><a href="javascript:void(0)">Support</a></li>
                    <li><a href="javascript:void(0)">Site Map</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- footer-style-two end -->