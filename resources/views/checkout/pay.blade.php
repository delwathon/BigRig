@section('title', 'Checkout')
<x-authentication-layout>
    <div class="flex-1">
        <!-- Header -->
        <div class="flex items-center justify-between h-28 px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <!-- Logo -->
            <a class="block" href="{{ route('login') }}" @click.prevent="$root.submit();">
                <!-- Light Theme Logo -->
                <img class="block dark:hidden h-32 w-32" src="{{ Storage::url($settings->light_theme_logo) }}" alt="Light Logo" />

                <!-- Dark Theme Logo -->
                <img class="hidden dark:block h-32 w-32" src="{{ Storage::url($settings->dark_theme_logo) }}" alt="Dark Logo" />
            </a>
            <div class="text-sm">
                Have an account? <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="{{ route('login') }}" @click.prevent="$root.submit();">Sign In</a>
            </div>
            <x-validation-errors class="mt-4" />  
        </div>
    </div>

    <div class="px-4 py-4">
        <div class="max-w-xl mx-auto">

            <!-- Page wrapper -->
            <div class="flex h-[100dvh] overflow-hidden">
            
                <main>

                    <div class="relative pt-8">
                        <div class="absolute inset-0 bg-gray-800 overflow-hidden" aria-hidden="true">
                            <img class="object-cover h-full w-full filter blur opacity-10" src="{{ asset('assets/images/paystack.png') }}" width="460" height="180" alt="Pay background" />
                        </div>
                        <div class="relative px-4 sm:px-6 lg:px-8 max-w-lg mx-auto">
                            <img class="rounded-t-xl shadow-lg" src="{{ asset('assets/images/paystack.png') }}" width="460" height="180" alt="Pay background" />
                        </div>
                    </div>

                    <div class="relative px-4 sm:px-6 lg:px-8 pb-8 max-w-lg mx-auto" x-data="{ card: true }">
                        <div class="bg-white dark:bg-gray-800 px-8 pb-6 rounded-b-xl shadow-sm">

                            <!-- Card header -->
                            <div class="text-center mb-6">
                                <div class="mb-2">
                                    <img class="-mt-8 inline-flex rounded-full" src="{{ Storage::url(Auth::user()->profile_photo_path) }}" width="64" height="64" alt="User" />
                                </div>
                                <h1 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-semibold mb-2">
                                    {{ Auth::user()->firstName }} {{ Auth::user()->middleName }} {{ Auth::user()->lastName }}
                                </h1>
                                <div class="text-sm">
                                {{ Auth::user()->email }}
                                </div>
                            </div>

                            <!-- Toggle -->
                            <div class="flex justify-center mb-6">
                                <div class="relative flex w-full p-1 bg-gray-100 dark:bg-gray-700/30 rounded">
                                    <span class="absolute inset-0 m-1 pointer-events-none" aria-hidden="true">
                                        <span class="absolute inset-0 w-full bg-white dark:bg-gray-100 rounded-lg border border-gray-200 shadow-sm transition" :class="card ? 'translate-x-0' : 'translate-x-full'"></span>
                                    </span>
                                    <button class="relative flex-1 text-sm font-medium text-gray-600 p-1 transition" :class="card ? 'dark:text-gray-800' : 'dark:text-gray-500'" @click.prevent="card = true">Order Summary</button>
                                </div>
                            </div>

                            <!-- Card form -->
                            <div x-show="card">
                                <form method="POST" action="{{ route('payment') }}">
                                @csrf
                                    <div class="space-y-4">
                                        <ul class="mb-4">
                                            @foreach ($objectives as $objective)
                                                <li class="text-sm w-full flex justify-between py-3 border-b border-gray-200 dark:border-gray-700/60">
                                                    <div>{{ $objective->objective }}</div>
                                                    <div class="font-medium text-gray-800 dark:text-gray-100 subtotal">${{ number_format($objective->price, 2) }}</div>
                                                </li>
                                            @endforeach
                                            <li class="text-sm w-full flex justify-between py-3 border-b border-gray-200 dark:border-gray-700/60">
                                                <div>Subtotal</div>
                                                <div class="font-medium text-gray-800 dark:text-gray-100 subtotal">${{ number_format($subscription->subtotal, 2) }}</div>
                                            </li>
                                            <li class="text-sm w-full flex justify-between py-3 border-b border-gray-200 dark:border-gray-700/60">
                                                <div>Taxes</div>
                                                <div class="font-medium text-gray-800 dark:text-gray-100 taxes">${{ number_format($subscription->tax, 2) }}</div>
                                            </li>
                                            <li class="text-sm w-full flex justify-between py-3 border-b border-gray-200 dark:border-gray-700/60">
                                                <div>Total due (including taxes)</div>
                                                <div class="font-medium text-green-600 total-due">${{ number_format($subscription->total_amount, 2) }}</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Form footer -->
                                    <div class="mt-6">
                                        <div class="mb-4">
                                        <button type="submit" id="payButton" class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                                            Pay ₦{{ number_format($subscription->total_amount * $exchange_rate, 2) }}
                                        </button>
                                        </div>
                                        <div class="text-center">
                                            <a class="text-xs text-gray-500 italic" href="">At an exchange rate of ₦1750/$</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>

            </div>

        </div>
    </div>
</x-authentication-layout>
