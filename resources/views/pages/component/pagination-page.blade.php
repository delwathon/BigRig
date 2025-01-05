<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Pagination</h1>
        </div>

        <div>

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Option 1 -->
                <div>
                    <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-6">Option 1</h2>
                    <div class="px-6 py-8 bg-gray-100 dark:bg-gray-800/50 rounded-lg">
                        <!-- Start -->
                        <div class="flex justify-center">
                            <nav class="flex" role="navigation" aria-label="Navigation">
                                <div class="mr-2">
                                    <span class="inline-flex items-center justify-center rounded-lg leading-5 px-2.5 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 text-gray-300 dark:text-gray-600">
                                        <span class="sr-only">Previous</span><wbr />
                                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z" />
                                        </svg>
                                    </span>
                                </div>
                                <ul class="inline-flex text-sm font-medium -space-x-px rounded-lg shadow-sm">
                                    <li>
                                        <span class="inline-flex items-center justify-center rounded-l-lg leading-5 px-3.5 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 text-violet-500">1</span>
                                    </li>
                                    <li>
                                        <a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 border border-gray-200 dark:border-gray-700/60 text-gray-600 dark:text-gray-300" href="#0">2</a>
                                    </li>
                                    <li>
                                        <a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 border border-gray-200 dark:border-gray-700/60 text-gray-600 dark:text-gray-300" href="#0">3</a>
                                    </li>
                                    <li>
                                        <span class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 text-gray-400 dark:text-gray-500">…</span>
                                    </li>
                                    <li>
                                        <a class="inline-flex items-center justify-center rounded-r-lg leading-5 px-3.5 py-2 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 border border-gray-200 dark:border-gray-700/60 text-gray-600 dark:text-gray-300" href="#0">9</a>
                                    </li>
                                </ul>
                                <div class="ml-2">
                                    <a href="#0" class="inline-flex items-center justify-center rounded-lg leading-5 px-2.5 py-2 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 border border-gray-200 dark:border-gray-700/60 text-violet-500 shadow-sm">
                                        <span class="sr-only">Next</span><wbr />
                                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </nav>
                        </div>
                        <!-- End -->
                    </div>
                </div>

                <!-- Option 2 -->
                <div>
                    <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-6">Option 2</h2>
                    <div class="px-6 py-8 bg-gray-100 dark:bg-gray-800/50 rounded-lg">
                        <!-- Start -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <nav class="mb-4 sm:mb-0 sm:order-1" role="navigation" aria-label="Navigation">
                                <ul class="flex justify-center">
                                    <li class="ml-3 first:ml-0">
                                        <span class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 text-gray-300 dark:text-gray-600">&lt;- Previous</span>
                                    </li>
                                    <li class="ml-3 first:ml-0">
                                        <a class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" href="#0">Next -&gt;</a>
                                    </li>            
                                </ul>
                            </nav>
                            <div class="text-sm text-gray-500 text-center sm:text-left">
                                Showing <span class="font-medium text-gray-600 dark:text-gray-300">1</span> to <span class="font-medium text-gray-600 dark:text-gray-300">10</span> of <span class="font-medium text-gray-600 dark:text-gray-300">467</span> results
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                </div>

                <!-- Option 3 -->
                <div>
                    <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-6">Option 3</h2>
                    <div class="px-6 py-8 bg-gray-100 dark:bg-gray-800/50 rounded-lg">
                        <!-- Start -->
                        <div>
                            <nav class="flex justify-between" role="navigation" aria-label="Navigation">
                                <div class="flex-1 mr-2">
                                    <span class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 text-gray-300 dark:text-gray-600">&lt;-<span class="hidden sm:inline">&nbsp;Previous</span></span>
                                </div>
                                <div class="grow text-center">
                                    <ul class="inline-flex text-sm font-medium -space-x-px">
                                        <li>
                                            <span class="inline-flex items-center justify-center rounded-full leading-5 px-2 py-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 text-violet-500 shadow-sm"><span class="w-5">1</span></span>
                                        </li>
                                        <li>
                                            <a class="inline-flex items-center justify-center leading-5 px-2 py-2 text-gray-600 dark:text-gray-300 hover:text-violet-500 dark:hover:text-violet-500 border border-transparent" href="#0"><span class="w-5">2</span></a>
                                        </li>
                                        <li>
                                            <a class="inline-flex items-center justify-center leading-5 px-2 py-2 text-gray-600 dark:text-gray-300 hover:text-violet-500 dark:hover:text-violet-500 border border-transparent" href="#0"><span class="w-5">3</span></a>
                                        </li>
                                        <li>
                                            <span class="inline-flex items-center justify-center leading-5 px-2 py-2 text-gray-400 dark:text-gray-500">…</span>
                                        </li>
                                        <li>
                                            <a class="inline-flex items-center justify-center rounded-r-lg leading-5 px-2 py-2 text-gray-600 dark:text-gray-300 hover:text-violet-500 dark:hover:text-violet-500 border border-transparent" href="#0"><span class="w-5">9</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="flex-1 text-right ml-2">
                                    <a class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" href="#0"><span class="hidden sm:inline">Next&nbsp;</span>-&gt;</a>
                                </div>
                            </nav>
                        </div>
                        <!-- End -->
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-app-layout>
