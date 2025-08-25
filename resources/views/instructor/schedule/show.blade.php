@php
    use Carbon\Carbon;

    // Parse dates properly at the beginning
    $scheduleDate = Carbon::parse($schedule->schedule_date)->format('Y-m-d');
    $scheduleStart = Carbon::parse($scheduleDate . ' ' . $schedule->time_start);
    $scheduleEnd = Carbon::parse($scheduleDate . ' ' . $schedule->time_stop);
    $now = Carbon::now();

    $isPast = $scheduleEnd->isPast();
    $isOngoing = $now->between($scheduleStart, $scheduleEnd);
    $isFuture = $scheduleStart->isFuture();
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
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                    Class Details
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ Carbon::parse($schedule->schedule_date)->format('l, F j, Y') }}
                </p>
            </div>
            <div class="flex items-center space-x-2">
                @if(!$isPast)
                    <a href="{{ route('instructor.schedule.request-change', $schedule->id) }}"
                       class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-medium rounded-lg transition inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                        Request Change
                    </a>
                @endif

                @if(Carbon::parse($schedule->schedule_date)->isToday() || $isPast)
                    <a href="{{ route('instructor.attendance.mark', $schedule->id) }}"
                       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                        Mark Attendance
                    </a>
                @endif
            </div>
        </div>

        {{-- Class Information --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            {{-- Main Details --}}
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        Class Information
                    </h2>
                </div>
                <div class="p-6">
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Course</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ $schedule->course->objective }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Topic</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ $schedule->topic->topic }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ Carbon::parse($schedule->schedule_date)->format('l, F j, Y') }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Time</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ $schedule->time_start }} - {{ $schedule->time_stop }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Batch</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ $schedule->batch->batch_name }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Session Type</dt>
                            <dd class="mt-1">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $schedule->session_type == 'theory' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                    {{ ucfirst($schedule->session_type ?? 'theory') }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Duration</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                @php
                                    $start = Carbon::parse($schedule->time_start);
                                    $end = Carbon::parse($schedule->time_stop);
                                    $duration = $start->diff($end);
                                @endphp
                                {{ $duration->h }} hour{{ $duration->h != 1 ? 's' : '' }}
                                @if($duration->i > 0)
                                    {{ $duration->i }} minute{{ $duration->i != 1 ? 's' : '' }}
                                @endif
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                            <dd class="mt-1">
                                @if($isPast)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Completed
                                    </span>
                                @elseif($isOngoing)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        In Progress
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Upcoming
                                    </span>
                                @endif
                            </dd>
                        </div>
                    </dl>

                    {{-- Topic Description (if available) --}}
                    @if(isset($schedule->topic->description) && $schedule->topic->description)
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-2">Topic Description</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $schedule->topic->description }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Quick Stats --}}
            <div class="space-y-6">
                {{-- Student Count --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-full p-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-5">
                            <span class="text-gray-500 text-sm">Total Students</span>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $students->count() }}</h3>
                        </div>
                    </div>
                </div>

                {{-- Attendance Stats --}}
                @if($attendance->count() > 0)
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                        <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-4">Attendance</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Present</span>
                                <span class="text-sm font-medium text-green-600">
                                    {{ $attendance->where('status', 'present')->count() }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Absent</span>
                                <span class="text-sm font-medium text-red-600">
                                    {{ $attendance->where('status', 'absent')->count() }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Late</span>
                                <span class="text-sm font-medium text-yellow-600">
                                    {{ $attendance->where('status', 'late')->count() }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Excused</span>
                                <span class="text-sm font-medium text-blue-600">
                                    {{ $attendance->where('status', 'excused')->count() }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Students List --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    Enrolled Students ({{ $students->count() }})
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Student
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Contact
                            </th>
                            @if($attendance->count() > 0)
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Attendance
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($students as $student)
                            <tr>
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
                                            <div class="text-xs text-gray-500">
                                                ID: {{ $student->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-100">{{ $student->email }}</div>
                                    <div class="text-xs text-gray-500">{{ $student->mobileNumber ?? 'N/A' }}</div>
                                </td>
                                @if($attendance->count() > 0)
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $studentAttendance = $attendance->where('student_id', $student->id)->first();
                                        @endphp
                                        @if($studentAttendance)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $studentAttendance->status == 'present' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $studentAttendance->status == 'absent' ? 'bg-red-100 text-red-800' : '' }}
                                                {{ $studentAttendance->status == 'late' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $studentAttendance->status == 'excused' ? 'bg-blue-100 text-blue-800' : '' }}">
                                                {{ ucfirst($studentAttendance->status) }}
                                            </span>
                                        @else
                                            <span class="text-sm text-gray-500">Not marked</span>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $attendance->count() > 0 ? '3' : '2' }}" class="px-6 py-12 text-center text-gray-500">
                                    No students enrolled for this class.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
