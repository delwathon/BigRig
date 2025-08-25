<div class="col-span-full xl:col-span-6 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">Payments</h2>
    </header>
    <div class="p-3">

        <!-- Card content -->
        <!-- "Today" group -->
        <div>
            <!-- <header class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm font-semibold p-2">Today</header> -->
            <ul class="my-1">
                @foreach ($subscriptions as $subscription)
                    @if ($subscriptions->isEmpty())
                        <li class="flex px-2">
                            <div class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                                <div class="grow flex justify-between">
                                    <div class="self-center">
                                        No record found
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                    <!-- Item -->
                    @if (Auth::user()->roles->contains('id', 10))
                        <li class="flex px-2">
                            <div class="w-9 h-9 rounded-full shrink-0 bg-red-500 my-2 mr-3">
                                <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                    <path d="M17.7 24.7l1.4-1.4-4.3-4.3H25v-2H14.8l4.3-4.3-1.4-1.4L11 18z" />
                                </svg>
                            </div>
                            <div class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                                <div class="grow flex justify-between">
                                    <div class="self-center">
                                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white" href="javascript:void(0)">
                                            {{ $subscription->user->firstName }} {{ $subscription->user->lastName }}
                                        </a>
                                        {{ $subscription->payment_reference }}
                                    </div>
                                    <div class="shrink-0 self-start ml-2">
                                        <span class="font-medium text-gray-100">
                                            -{{ $settings->base_currency }}{{ number_format($subscription->total_amount, 2) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="flex px-2">
                            <div class="w-9 h-9 rounded-full shrink-0 bg-green-500 my-2 mr-3">
                                <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                    <path d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z" />
                                </svg>
                            </div>
                            <div class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                                <div class="grow flex justify-between">
                                    <div class="self-center">
                                        <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white" href="javascript:void(0)">
                                            {{ $subscription->user->firstName }} {{ $subscription->user->lastName }}
                                        </a>
                                        {{ $subscription->payment_reference }}
                                    </div>
                                    <div class="shrink-0 self-start ml-2">
                                        <span class="font-medium text-green-600">
                                            +{{ $settings->base_currency }}{{ number_format($subscription->total_amount, 2) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
            @endforeach
            </ul>
        </div>

    </div>
</div>