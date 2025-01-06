<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') </title>

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

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles   
        <style>
            .custom-logo-size {
                height: 150px;
                width: 200px;
            }
        </style>      

        <script>
            if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').style.colorScheme = 'light';
            } else {
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').style.colorScheme = 'dark';
            }
        </script>
    </head>
    <body class="font-inter antialiased bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400">

        <main class="bg-white dark:bg-gray-900">

        <div class="relative flex">

            <!-- Content -->
            <div class="w-full md:w-4/6">

                <div class="min-h-[100dvh] h-full flex flex-col after:flex-1">

                    {{ $slot }}

                </div>

            </div>

            <!-- Image -->
            <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-2/6" aria-hidden="true">
                <img class="object-cover object-center w-full h-full" src="{{ asset('images/auth-image.jpg') }}" width="760" height="1024" alt="Onboarding" />
            </div>

            </div>

        </main> 

        @livewireScriptConfig
    </body>
</html>
