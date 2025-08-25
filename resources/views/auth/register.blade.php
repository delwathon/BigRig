@php
    use App\Models\TrainingObjective;
    $courses = TrainingObjective::all();
@endphp

@section('title', 'Register')
<x-authentication-layout>
    <div class="flex-1">
        <!-- Header -->
        <div class="flex items-center justify-between h-28 px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <a class="block" href="{{ url('/home') }}">
                <!-- Light Theme Logo -->
                <img class="block dark:hidden w-40 h-40" src="{{ Storage::url($settings->light_theme_logo) }}" alt="Light Logo" />

                <!-- Dark Theme Logo -->
                <img class="hidden dark:block w-40 h-40" src="{{ Storage::url($settings->dark_theme_logo) }}" alt="Dark Logo" />
            </a>
            <div class="text-sm">
                Have an account? <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="{{ route('login') }}">Sign In</a>
            </div>
            <x-validation-errors class="mt-4" />  
        </div>
    </div>

    <div class="px-4 py-4">
        <div class="max-w-5xl mx-auto">
            <!-- Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div x-data="{ stepOne: true, stepTwo: false, stepThree: false }">
                    <div x-show="stepOne">
                        <x-register.stepOne/>

                        <div class="flex items-center justify-between mt-6">
                            <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white ml-auto" @click.prevent="stepOne = false; stepTwo = true; stepThree = false">Next Step -&gt;</button>
                        </div>
                    </div>

                    <div x-show="stepTwo" x-cloak>
                        <x-register.stepTwo />

                        <div class="flex items-center justify-between mt-6">
                            <a class="text-sm underline hover:no-underline" href="javascript:void(0)" @click.prevent="stepOne = true; stepTwo = false; stepThree = false">&lt;- Back</a>
                            <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white ml-auto" @click.prevent="stepOne = false; stepTwo = false; stepThree = true">Next Step -&gt;</button>
                        </div>
                    </div>

                    <div x-show="stepThree" x-cloak>
                        <x-register.stepThree :courses="$courses"/>

                        <div class="flex items-center justify-between mt-6">
                            <a class="text-sm underline hover:no-underline" href="javascript:void(0)" @click.prevent="stepOne = false; stepTwo = true; stepThree = false">&lt;- Back</a>
                            <x-button id="payNowButton" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white ml-auto">{{ __('Proceed To Checkout') }} -&gt;</x-button>
                        </div>
                    </div>

                </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-6">
                            <label class="flex items-start">
                                <input type="checkbox" class="form-checkbox mt-1" name="terms" id="terms" />
                                <span class="text-sm ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm underline hover:no-underline">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm underline hover:no-underline">'.__('Privacy Policy').'</a>',
                                    ]) !!}                        
                                </span>
                            </label>
                        </div>
                    @endif        
            </form>

        </div>
    </div>

</x-authentication-layout>

<script>


document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const payNowButton = document.getElementById('payNowButton');

        // Function to check if at least one checkbox is selected
        function checkSelection() {
            const isAnyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            payNowButton.disabled = !isAnyChecked; // Disable or enable the button based on the selection
        }

        // Add event listeners to the checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', checkSelection);
        });

        // Initial check in case the user refreshes the page with some checkboxes selected
        checkSelection();
    });
</script>
