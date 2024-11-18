<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>@yield('title') | BigRig Truck Driving School</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
     <!-- if(title === 'Register Wizard') -->
     <link rel="stylesheet" href="{{asset('register_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('register_assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('register_assets/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('register_assets/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('register_assets/css/colors/switch.css')}}">
    <link href="{{asset('register_assets/css/colors/color-2.css')}}" rel="alternate stylesheet" type="text/css" title="color-2">
    <link href="{{asset('register_assets/css/colors/color-3.css')}}" rel="alternate stylesheet" type="text/css" title="color-3">
    <link href="{{asset('register_assets/css/colors/color-4.css')}}" rel="alternate stylesheet" type="text/css" title="color-4">
    <link href="{{asset('register_assets/css/colors/color-5.css')}}" rel="alternate stylesheet" type="text/css" title="color-5">
    <!-- else -->
    <link href="{{asset('assets/css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">

    @yield('head') <!-- Optional section for additional styles/scripts -->
</head>
<body>

    <!-- Include preloader and search popup -->
    @include('frontend.partials.preloader')

    <!-- Include sidebar -->
    @include('frontend.partials.sidebar')

    <!-- Include header and navigation -->
    @include('frontend.partials.header')

    @yield('content') <!-- Main content section -->

    <!-- Include footer scripts -->
    @include('frontend.partials.scripts')

    @yield('scripts') <!-- Optional section for additional scripts -->
</body>
</html>
