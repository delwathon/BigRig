@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Back Button --}}
        <a href="{{ route('instructor.attendance') }}" class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 mb-4">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Attendance
        </a>

        {{-- Class Information --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                    Mark Attendance
                </h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Course</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $schedule->course->objective }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Topic</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $schedule->topic->topic }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Date & Time</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                            {{ Carbon::parse($schedule->schedule_date)->format('M d, Y') }} • {{ $schedule->time_start }} - {{ $schedule->time_stop }}
                        </p>
                    </div>
                </div>

                {{-- Quick Stats --}}
                @if($attendanceSummary->total > 0)
                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center space-x-6">
                            <span class="text-sm text-gray-600 dark:text-gray-400">
                                Current Status:
                            </span>
                            <span class="text-sm">
                                <span class="text-green-600 font-semibold">{{ $attendanceSummary->present }}</span> Present
                            </span>
                            <span class="text-sm">
                                <span class="text-red-600 font-semibold">{{ $attendanceSummary->absent }}</span> Absent
                            </span>
                            <span class="text-sm">
                                <span class="text-yellow-600 font-semibold">{{ $attendanceSummary->late }}</span> Late
                            </span>
                            <span class="text-sm">
                                <span class="text-blue-600 font-semibold">{{ $attendanceSummary->excused }}</span> Excused
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Attendance Form --}}
        <form action="{{ route('instructor.attendance.save') }}" method="POST">
            @csrf
            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            Student List ({{ $students->count() }} Students)
                        </h2>
                        <div class="flex space-x-2">
                            <button type="button" onclick="markAll('present')"
                                    class="px-3 py-1 bg-green-100 text-green-700 text-sm font-medium rounded-lg hover:bg-green-200">
                                Mark All Present
                            </button>
                            <button type="button" onclick="markAll('absent')"
                                    class="px-3 py-1 bg-red-100 text-red-700 text-sm font-medium rounded-lg hover:bg-red-200">
                                Mark All Absent
                            </button>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    #
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Student Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Notes
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($students as $index => $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                        {{ substr($student->firstName, 0, 1) }}{{ substr($student->lastName, 0, 1) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    {{ $student->firstName }} {{ $student->lastName }}
                                                </div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                                    ID: {{ $student->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ $student->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="hidden" name="attendance[{{ $index }}][student_id]" value="{{ $student->id }}">
                                        <div class="flex justify-center space-x-2">
                                            <label class="inline-flex items-center">
                                                <input type="radio"
                                                       name="attendance[{{ $index }}][status]"
                                                       value="present"
                                                       class="form-radio text-green-600 attendance-radio"
                                                       {{ $student->status == 'present' ? 'checked' : '' }}
                                                       required>
                                                <span class="ml-1 text-sm text-green-600">Present</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="radio"
                                                       name="attendance[{{ $index }}][status]"
                                                       value="absent"
                                                       class="form-radio text-red-600 attendance-radio"
                                                       {{ $student->status == 'absent' ? 'checked' : '' }}
                                                       required>
                                                <span class="ml-1 text-sm text-red-600">Absent</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="radio"
                                                       name="attendance[{{ $index }}][status]"
                                                       value="late"
                                                       class="form-radio text-yellow-600 attendance-radio"
                                                       {{ $student->status == 'late' ? 'checked' : '' }}
                                                       required>
                                                <span class="ml-1 text-sm text-yellow-600">Late</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="radio"
                                                       name="attendance[{{ $index }}][status]"
                                                       value="excused"
                                                       class="form-radio text-blue-600 attendance-radio"
                                                       {{ $student->status == 'excused' ? 'checked' : '' }}
                                                       required>
                                                <span class="ml-1 text-sm text-blue-600">Excused</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="text"
                                               name="attendance[{{ $index }}][notes]"
                                               value="{{ $student->attendance ? $student->attendance->notes : '' }}"
                                               placeholder="Optional notes..."
                                               class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Submit Button --}}
                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Make sure to review all attendance before saving.
                        </p>
                        <div class="flex space-x-3">
                            <a href="{{ route('instructor.attendance') }}"
                               class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                                Save Attendance
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- JavaScript for bulk actions --}}
    <script>
        function markAll(status) {
            const radios = document.querySelectorAll(`.attendance-radio[value="${status}"]`);
            radios.forEach(radio => {
                radio.checked = true;
            });

            // Update counter
            updateCounter();
        }

        function updateCounter() {
            const present = document.querySelectorAll('.attendance-radio[value="present"]:checked').length;
            const absent = document.querySelectorAll('.attendance-radio[value="absent"]:checked').length;
            const late = document.querySelectorAll('.attendance-radio[value="late"]:checked').length;
            const excused = document.querySelectorAll('.attendance-radio[value="excused"]:checked').length;

            // You can display these counts somewhere if needed
            console.log(`Present: ${present}, Absent: ${absent}, Late: ${late}, Excused: ${excused}`);
        }

        // Add event listeners to update counter
        document.querySelectorAll('.attendance-radio').forEach(radio => {
            radio.addEventListener('change', updateCounter);
        });
    </script>
</x-app-layout>
