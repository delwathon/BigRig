<div class="boxed_wrapper">
    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="b" class="letters-loading">b</span>
                        <span data-text-preloader="i" class="letters-loading">i</span>
                        <span data-text-preloader="g" class="letters-loading">g</span>
                        <span data-text-preloader="r" class="letters-loading">r</span>
                        <span data-text-preloader="i" class="letters-loading">i</span>
                        <span data-text-preloader="g" class="letters-loading">g</span>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- Search Popup -->
    <div id="search-popup" class="search-popup">
        <div class="popup-inner">
            <div class="upper-box clearfix">
                <figure class="logo-box pull-left">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-light.png') }}" alt=""></a>
                </figure>
                <div class="close-search pull-right"><span class="far fa-times"></span></div>
            </div>
            <div class="overlay-layer"></div>
            <div class="auto-container">
                <div class="search-form">
                    <form method="post" action="#">
                        <div class="form-group">
                            <fieldset>
                                <input type="search" class="form-control" name="search-input" placeholder="Type your keyword and hit" required>
                                <button type="submit"><i class="far fa-search"></i></button>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
