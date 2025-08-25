@section('title', 'Login')
<x-authentication-layout>
    <!-- Header -->
    <div class="flex-1">
        <div class="flex items-center justify-between h-28 px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <a class="block" href="{{ url('/home') }}">
                <!-- Light Theme Logo -->
                <img class="block dark:hidden w-40 h-40" src="{{ Storage::url($settings->light_theme_logo) }}" alt="Light Logo" />

                <!-- Dark Theme Logo -->
                <img class="hidden dark:block w-40 h-40" src="{{ Storage::url($settings->dark_theme_logo) }}" alt="Dark Logo" />
            </a>
        </div>
    </div>

    <div class="max-w-sm mx-auto w-full px-4 py-8">
        <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">{{ __('Welcome back!') }}</h1>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif   
        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />                
                </div>
                <div>
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" type="password" name="password" required autocomplete="current-password" />                
                </div>
            </div>
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <div class="mr-1">
                        <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>
                @endif            
                <x-button class="ml-3">
                    {{ __('Sign in') }}
                </x-button>            
            </div>
        </form>
        <x-validation-errors class="mt-4" />   
        <!-- Footer -->
        <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
            <div class="text-sm">
                {{ __('Don\'t you have an account?') }} <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
            </div>
        </div>
    </div>
</x-authentication-layout>
