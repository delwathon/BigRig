@section('title', 'Forgot Password')
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
        <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">{{ __('Reset your Password') }}</h1>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <!-- Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <x-label for="email">{{ __('Email Address') }} <span class="text-red-500">*</span></x-label>
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />                
            </div>
            <div class="flex justify-end mt-6">
                <x-button>
                    {{ __('Send Reset Link') }}
                </x-button>
            </div>
        </form>
        <x-validation-errors class="mt-4" /> 
    </div>
</x-authentication-layout>
