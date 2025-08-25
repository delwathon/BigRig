{{-- resources/views/student/assignments.blade.php --}}
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Assignments
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Submit and track your assignments
            </p>
        </div>

        {{-- Coming Soon State --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <div class="p-12 text-center">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-blue-100 dark:bg-blue-900/50 rounded-full mb-4">
                    <svg class="w-12 h-12 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    Assignments Coming Soon
                </h3>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto">
                    The assignments feature is currently being developed. You'll be able to view, download, and submit assignments here once it's ready.
                </p>

                {{-- Feature Preview --}}
                <div class="mt-8 bg-gray-50 dark:bg-gray-900/50 rounded-lg p-6 max-w-2xl mx-auto">
                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4">What to expect:</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Download assignment documents</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Submit assignments online</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Track submission status</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-sm text-gray-600 dark:text-gray-400">View grades and feedback</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
