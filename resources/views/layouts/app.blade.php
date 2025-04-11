<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
        <title>@yield('title')</title>

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

        <style>
            .cke_notifications_area {
                display: none !important;
            }
        </style>
        

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
    <body
        class="font-inter antialiased bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400 overflow-y-hidden"
        :class="{ 'sidebar-expanded': sidebarExpanded }"
        x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
        x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"    
    >

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

        <div>
            <div class="m-1.5" x-data="{
                openModal: @if(!Auth::user()->hasVerifiedEmail()) true @else false @endif
            }" x-init="if (openModal) $store.deleteModal.modalOpen = true">
            
                <!-- Modal backdrop -->
                <div
                    class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
                    x-show="$store.deleteModal.modalOpen"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-out duration-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    aria-hidden="true"
                    x-cloak
                ></div>
            
                <!-- Modal dialog -->
                <div id="delete-modal"
                    class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
                    role="dialog"
                    aria-modal="true"
                    x-show="$store.deleteModal.modalOpen"
                    x-transition:enter="transition ease-in-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in-out duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-4"
                    x-cloak
                    >
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full"
                        @click.stop> <!-- Prevent clicks inside the modal from closing it -->
                        <div class="p-5 flex space-x-4">
                            <!-- Modal content -->
                            <div>
                                <div class="mb-2">
                                    <div class="text-lg font-semibold text-gray-800 dark:text-gray-100">Email Verification Required</div>
                                </div>
                                <div class="text-sm mb-10">
                                    <p>Your email is not verified. Please verify your email first.</p>
                                </div>
                                <div class="flex flex-wrap justify-end space-x-2">
                                    {{-- <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300"
                                            @click="$store.deleteModal.close()">
                                        Close
                                    </button> --}}
                                    <a href="{{ route('verification.notice') }}" class="btn-sm bg-blue-500 hover:bg-blue-600 text-white">
                                        Verify Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>            
        </div>    

        <script>
            if (localStorage.getItem('sidebar-expanded') == 'true') {
                document.querySelector('body').classList.add('sidebar-expanded');
            } else {
                document.querySelector('body').classList.remove('sidebar-expanded');
            }
        </script>

        <!-- Page wrapper -->
        <div class="flex h-[100dvh] overflow-hidden">

            <x-app.sidebar :variant="$attributes['sidebarVariant']" />

            <!-- Content area -->
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if($attributes['background']){{ $attributes['background'] }}@endif" x-ref="contentarea">

                <x-app.header :variant="$attributes['headerVariant']" />

                <main class="grow">
                    {{ $slot }}
                </main>

            </div>

        </div>

        @livewireScriptConfig
    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    
    <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor1' );
    </script> 

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('deleteModal', {
                modalOpen: false,
                sliderId: null, // Track the ID of the objective to delete
                open(id) {
                    this.sliderId = id;
                    this.modalOpen = true;
                },
                close() {
                    this.modalOpen = false;
                    this.sliderId = null;
                }
            });
        });
    </script>
</html>
