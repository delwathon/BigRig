@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Back Button --}}
        <a href="{{ route('instructor.schedule') }}" class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 mb-4">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Schedule
        </a>

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Request Schedule Change
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Submit a request to change or cancel this class
            </p>
        </div>

        {{-- Current Schedule Details --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    Current Schedule Details
                </h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Course</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $schedule->course->objective }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Topic</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $schedule->topic->topic }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Date</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                            {{ Carbon::parse($schedule->schedule_date)->format('l, M d, Y') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Time</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                            {{ $schedule->time_start }} - {{ $schedule->time_stop }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Batch</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $schedule->batch->batch_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Type</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                            <span class="px-2 py-1 text-xs rounded-full {{ $schedule->session_type == 'theory' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($schedule->session_type ?? 'theory') }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Change Request Form --}}
        <form action="{{ route('instructor.schedule.request-change', $schedule->id) }}" method="POST">
            @csrf

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        Change Request Details
                    </h2>
                </div>

                <div class="p-6 space-y-6">
                    {{-- Request Type --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Request Type <span class="text-red-500">*</span>
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" name="type" value="reschedule" required
                                       class="mr-2" onchange="toggleRescheduleFields(this.value)">
                                <span>Reschedule - Move to a different date/time</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type" value="cancel" required
                                       class="mr-2" onchange="toggleRescheduleFields(this.value)">
                                <span>Cancel - Cancel this class entirely</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="type" value="substitute" required
                                       class="mr-2" onchange="toggleRescheduleFields(this.value)">
                                <span>Substitute - Request a substitute instructor</span>
                            </label>
                        </div>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Reschedule Fields --}}
                    <div id="rescheduleFields" class="hidden space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="new_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    New Date
                                </label>
                                <input type="date"
                                       name="new_date"
                                       id="new_date"
                                       min="{{ Carbon::tomorrow()->format('Y-m-d') }}"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                @error('new_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="new_time_start" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    New Start Time
                                </label>
                                <input type="time"
                                       name="new_time_start"
                                       id="new_time_start"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                @error('new_time_start')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="new_time_stop" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    New End Time
                                </label>
                                <input type="time"
                                       name="new_time_stop"
                                       id="new_time_stop"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                @error('new_time_stop')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Reason --}}
                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Reason for Request <span class="text-red-500">*</span>
                        </label>
                        <textarea name="reason"
                                  id="reason"
                                  rows="4"
                                  required
                                  class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100"
                                  placeholder="Please provide a detailed reason for this request...">{{ old('reason') }}</textarea>
                        @error('reason')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 flex items-center justify-end space-x-3">
                    <a href="{{ route('instructor.schedule') }}"
                       class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                        Submit Request
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function toggleRescheduleFields(type) {
            const rescheduleFields = document.getElementById('rescheduleFields');

            if (type === 'reschedule') {
                rescheduleFields.classList.remove('hidden');
                document.getElementById('new_date').required = true;
                document.getElementById('new_time_start').required = true;
                document.getElementById('new_time_stop').required = true;
            } else {
                rescheduleFields.classList.add('hidden');
                document.getElementById('new_date').required = false;
                document.getElementById('new_time_start').required = false;
                document.getElementById('new_time_stop').required = false;
            }
        }
    </script>
</x-app-layout>
