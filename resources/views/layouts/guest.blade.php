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

            <!-- Content -->
            <div class="w-full">

                <div class="min-h-[100dvh] h-full">

                    <!-- Header -->
                    <div>
                        <div class="flex items-center justify-between h-28 px-4 sm:px-6 lg:px-8">
                            <!-- Logo -->
                            <a class="block" href="{{ route('dashboard') }}">
                                <img src="{{ Storage::url($site->dark_theme_logo) }}" />
                            </a>
                        </div>
                    </div>

                    <div class="w-full max-w-3xl mx-auto px-4 py-8">
                        {{ $slot }}
                    </div>

                </div>

            </div>

            </div>

        </main>   

        @livewireScriptConfig
    </body>
</html>
