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
        @if (session('success'))
            <div x-show="open" 
                x-data="{ open: true, autoClose() { setTimeout(() => { this.open = false }, 5000); } }" 
                x-init="autoClose()" 
                role="alert"
                x-transition:leave="transition-opacity duration-500 opacity-0"
                x-transition:enter="transition-opacity duration-500 opacity-100">

                <!-- Notification for Light Theme (bottom left) -->
                <div class="fixed bottom-4 left-4 z-50 inline-flex min-w-80 px-4 py-2 rounded-lg text-sm bg-white shadow-sm border border-gray-200 text-gray-600 dark:hidden">
                    <div class="flex w-full justify-between items-start">
                        <div class="flex">
                            <svg class="shrink-0 fill-current text-green-500 mt-[3px] mr-3" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z" />
                            </svg>
                            <div>{{ session('success') }}</div>
                        </div>
                        <button class="opacity-60 hover:opacity-70 ml-3 mt-[3px]" @click="open = false">
                            <div class="sr-only">Close</div>
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Notification for Dark Theme (bottom left) -->
                <div class="fixed bottom-4 left-4 z-50 inline-flex min-w-80 px-4 py-2 rounded-lg text-sm bg-green-100 text-gray-700 dark:block">
                    <div class="flex w-full justify-between items-start">
                        <div class="flex">
                            <svg class="shrink-0 fill-current text-green-500 mt-[3px] mr-3" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z" />
                            </svg>
                            <div>{{ session('success') }}</div>
                        </div>
                        <button class="opacity-60 hover:opacity-70 ml-3 mt-[3px]" @click="open = false">
                            <div class="sr-only">Close</div>
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div x-data="{ open: true }" x-show="open" role="alert" class="fixed bottom-4 left-4 z-50 min-w-80 px-4 py-2 rounded-lg text-sm bg-red-100 text-gray-700 shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-semibold">Please fix the following errors:</p>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button @click="open = false" class="text-red-500 hover:text-red-700 focus:outline-none">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div x-data="{ open: true }" x-show="open" role="alert" class="fixed bottom-4 left-4 z-50 min-w-80 px-4 py-2 rounded-lg text-sm bg-red-100 text-gray-700 shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <p>{{ session('error') }}</p>
                    </div>
                    <button @click="open = false" class="text-red-500 hover:text-red-700 focus:outline-none">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

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
