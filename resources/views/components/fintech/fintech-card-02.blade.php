<div class="flex flex-col col-span-full xl:col-span-4 bg-[linear-gradient(225deg,var(--tw-gradient-stops))] from-gray-800 to-gray-900 shadow-sm rounded-xl">
    <header class="px-5 py-4 border-b border-gray-700/60 flex items-center">
        <h2 class="font-semibold text-gray-200">Active Cards</h2>
    </header>
    <div class="h-full flex flex-col px-5 py-6">
        <!-- CC container -->
        <div class="relative w-full max-w-sm mx-auto bg-gray-700/50 p-2.5 rounded-2xl">
            <!-- Credit Card -->
            <div class="relative aspect-[7/4] bg-gradient-to-tr from-gray-900 to-gray-800 p-5 rounded-xl overflow-hidden">
                <div class="relative h-full flex flex-col justify-between">
                    <!-- Logo on card -->
                    <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="icon1-b">
                                <stop stop-color="#B7ACFF" offset="0%" />
                                <stop stop-color="#E6E1FF" offset="100%" />
                            </linearGradient>
                            <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="icon1-c">
                                <stop stop-color="#4634B1" offset="0%" />
                                <stop stop-color="#4634B1" stop-opacity="0" offset="100%" />
                            </linearGradient>
                            <path id="icon1-a" d="M16 0l16 32-16-5-16 5z" />
                        </defs>
                        <g transform="rotate(90 16 16)" fill="none" fill-rule="evenodd">
                            <mask id="icon1-d" fill="#fff">
                                <use xlink:href="#icon1-a" />
                            </mask>
                            <use fill="url(#icon1-b)" xlink:href="#icon1-a" />
                            <path fill="url(#icon1-c)" mask="url(#icon1-d)" d="M16-6h20v38H16z" />
                        </g>
                    </svg>
                    <!-- Card number -->
                    <div class="flex justify-between text-lg font-bold text-gray-200 tracking-widest drop-shadow-md">
                        <span>****</span>
                        <span>****</span>
                        <span>****</span>
                        <span>7328</span>
                    </div>
                    <!-- Card footer -->
                    <div class="relative flex justify-between items-center z-10 mb-0.5">
                        <!-- Card expiration -->
                        <div class="text-sm font-bold text-gray-200 tracking-widest drop-shadow-md space-x-3">
                            <span>EXP 12/24</span>
                            <span>CVC ***</span>
                        </div>
                    </div>
                    <!-- Mastercard logo -->
                    <svg class="absolute bottom-0 right-0" width="48" height="28" viewBox="0 0 48 28">
                        <circle fill="#F0BB33" cx="34" cy="14" r="14" fill-opacity=".8" />
                        <circle fill="#FF5656" cx="14" cy="14" r="14" fill-opacity=".8" />
                    </svg>
                </div>
            </div>
            <!-- Options button -->
            <div class="absolute top-0 right-0 inline-flex" x-data="{ open: false }">
                <button
                    class="rounded-full"
                    :class="open ? 'bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-300': 'bg-white dark:bg-gray-700 text-gray-400 hover:text-gray-500 dark:text-gray-400 dark:hover:text-gray-300'"
                    aria-haspopup="true"
                    @click.prevent="open = !open"
                    :aria-expanded="open"
                >
                    <span class="sr-only">Menu</span>
                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                        <circle cx="16" cy="16" r="2" />
                        <circle cx="10" cy="16" r="2" />
                        <circle cx="22" cy="16" r="2" />
                    </svg>
                </button>
                <div
                    class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1"                
                    @click.outside="open = false"
                    @keydown.escape.window="open = false"
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-out duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    x-cloak                
                >
                    <ul>
                        <li>
                            <a class="font-medium text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 1</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 2</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-red-500 hover:text-red-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Details -->
        <div class="grow flex flex-col justify-center mt-3">
            <div class="text-xs text-gray-500 font-semibold uppercase mb-3">Details</div>
            <div class="space-y-2">
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <div class="text-gray-300">Payment Limits</div>
                        <div class="text-gray-400 italic">$780,00 <span class="text-gray-500 dark:text-gray-400">/</span> $1,500.00</div>
                    </div>
                    <div class="relative w-full h-2 bg-gray-600 rounded">
                        <div class="absolute inset-0 bg-green-400 rounded-full" aria-hidden="true" style="width: 50%;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <div class="text-gray-300">ATM Limits</div>
                        <div class="text-gray-400 italic">$179,00 <span class="text-gray-500 dark:text-gray-400">/</span> $1,000.00</div>
                    </div>
                    <div class="relative w-full h-2 bg-gray-600 rounded">
                        <div class="absolute inset-0 bg-green-400 rounded-full" aria-hidden="true" style="width: 35%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>