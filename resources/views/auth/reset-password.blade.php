@section('title', 'Reset Password')
<x-authentication-layout>
    <!-- Header -->
    <div class="flex-1">
        <div class="flex items-center justify-between h-28 px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <a class="block" href="{{ url('/home') }}">
                <!-- Light Theme Logo -->
                <img class="block dark:hidden w-40 h-40" src="{{ Storage::url($settings->light_theme_logo) }}" alt="Light Logo" />

                <!-- Dark Theme Logo -->
                <img class="hidden dark:block" src="{{ Storage::url($settings->dark_theme_logo) }}" alt="Dark Logo" />
            </a>
        </div>
    </div>

    <div class="max-w-sm mx-auto w-full px-4 py-8">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </div>
</x-authentication-layout>
