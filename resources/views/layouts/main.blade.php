<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>@yield('title') | {{ $settings->site_name }}</title>

    <!-- Meta Description -->
    <meta name="description" content="{{ $settings->site_description }}">

    <!-- Meta Keywords -->
    <meta name="keywords" content="{{ $settings->site_keywords }}">

    <!-- Author -->
    <meta name="author" content="{{ $settings->site_author }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="@yield('title') | {{ $settings->site_name }}">
    <meta property="og:description" content="{{ $settings->site_description }}">
    <meta property="og:image" content="{{ Storage::url($settings->light_theme_logo) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title') | {{ $settings->site_name }}">
    <meta name="twitter:description" content="{{ $settings->site_description }}">
    <meta name="twitter:image" content="{{ $settings->site_logo }}">

    <!-- Fav Icon -->
    <link rel="icon" href="{{ Storage::url($settings->favicon) }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">

    @yield('head') <!-- Optional section for additional styles/scripts -->

    <style>
        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <!-- Include preloader and search popup -->
    @if ($settings->show_preloader)
        @include('partials.preloader')
    @endif

    @foreach (['success' => 'alert-success', 'info' => 'alert-info'] as $key => $alertClass)
        @if (session($key))
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050; right: 20px; top: 20px;">
                <div class="alert {{ $alertClass }} alert-dismissible fade show shadow-lg" role="alert" 
                    style="min-width: 300px; animation: slideDown 0.5s ease-out;">
                    {{ session($key) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <script>
                setTimeout(function() {
                    let alert = document.querySelector(".alert");
                    if (alert) {
                        alert.classList.remove("show");
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 5000); // Hide after 5 seconds
            </script>
        @endif
    @endforeach

    <!-- Include sidebar -->
    @include('partials.sidebar')

    <!-- Include header and navigation -->
    @if ($settings->preferred_landing_page === 1 && url()->current() === url('/'))
        @include('partials.header-2')
    @else
        @include('partials.header')
    @endif

    @yield('content') <!-- Main content section -->

    <!-- Include footer -->
    {{-- @if ($settings->preferred_landing_page === 1 && url()->current() === url('/')) --}}
        @include('partials.footer-2')
    {{-- @else
        @include('partials.footer')
    @endif --}}

    <!-- Include footer scripts -->
    @if ($settings->preferred_landing_page === 1 && url()->current() === url('/'))
        @include('partials.scripts-2')
    @else
        @include('partials.scripts')
    @endif

    @yield('scripts') <!-- Optional section for additional scripts -->
</body>
</html>
