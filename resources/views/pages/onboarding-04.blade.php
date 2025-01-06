<x-empty-layout>
    <main class="bg-white dark:bg-gray-900">

        <div class="relative flex">

            <!-- Content -->
            <div class="w-full md:w-1/2">

                <div class="min-h-[100dvh] h-full flex flex-col after:flex-1">

                    <div class="flex-1">

                        <!-- Header -->
                        <div class="flex items-center justify-between h-28 px-4 sm:px-6 lg:px-8">
                            <!-- Logo -->
                            <a class="block" href="{{ route('dashboard') }}">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" />
                            </a>
                            <div class="text-sm">
                                Have an account? <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="{{ route('login') }}">Sign In</a>
                            </div>
                        </div>

                        <!-- Progress bar -->
                        <div class="px-4 pt-12 pb-8">
                            <div class="max-w-md mx-auto w-full">
                                <div class="relative">
                                    <div class="absolute left-0 top-1/2 -mt-px w-full h-0.5 bg-gray-200 dark:bg-gray-700/60" aria-hidden="true"></div>
                                    <ul class="relative flex justify-between w-full">
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-violet-500 text-white" href="{{ route('onboarding-01') }}">1</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-violet-500 text-white" href="{{ route('onboarding-02') }}">2</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-violet-500 text-white" href="{{ route('onboarding-03') }}">3</a>
                                        </li>
                                        <li>
                                            <a class="flex items-center justify-center w-6 h-6 rounded-full text-xs font-semibold bg-violet-500 text-white" href="{{ route('onboarding-04') }}">4</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-8">
                        <div class="max-w-md mx-auto">
    
                            <div class="text-center">
                                <svg class="inline-flex w-16 h-16 fill-current mb-6" viewBox="0 0 64 64">
                                    <circle class="text-green-500/20" cx="32" cy="32" r="32" />
                                    <path class="text-green-700" d="M37.22 26.375a1 1 0 1 1 1.56 1.25l-8 10a1 1 0 0 1-1.487.082l-4-4a1 1 0 0 1 1.414-1.414l3.21 3.21 7.302-9.128Z" />
                                </svg>
                                <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-8">Nice to have you, Acme Inc. 🙌</h1>
                                <a class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white" href="{{ route('dashboard') }}">Go To Dashboard -&gt;</a>
                            </div>
    
                        </div>
                    </div>

                </div>

            </div>

            <!-- Image -->
            <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
                <img class="object-cover object-center w-full h-full" src="{{ asset('images/onboarding-image.jpg') }}" width="760" height="1024" alt="Onboarding" />
            </div>

        </div>

    </main>
</x-empty-layout>
