@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Attendance Management
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Mark and manage student attendance for your classes
            </p>
        </div>

        {{-- Monthly Statistics --}}
        @if($monthlyStats)
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500 rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Present</p>
                            <p class="text-lg font-semibold text-green-600">{{ $monthlyStats->present }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-500 rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Absent</p>
                            <p class="text-lg font-semibold text-red-600">{{ $monthlyStats->absent }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500 rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Late</p>
                            <p class="text-lg font-semibold text-yellow-600">{{ $monthlyStats->late }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Excused</p>
                            <p class="text-lg font-semibold text-blue-600">{{ $monthlyStats->excused }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Pending Attendance --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            Classes Pending Attendance
                        </h2>
                        <span class="px-2 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded-full">
                            {{ $pendingSchedules->count() }} Pending
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    @if($pendingSchedules->count() > 0)
                        <div class="space-y-3">
                            @foreach($pendingSchedules->take(5) as $schedule)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h4 class="font-medium text-gray-900 dark:text-gray-100">
                                                {{ $schedule->course->objective }}
                                            </h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                {{ $schedule->topic->topic }}
                                            </p>
                                            <div class="flex items-center space-x-3 mt-2 text-xs text-gray-500">
                                                <span>📅 {{ Carbon::parse($schedule->schedule_date)->format('M d, Y') }}</span>
                                                <span>⏰ {{ $schedule->time_start }} - {{ $schedule->time_stop }}</span>
                                                <span class="px-2 py-0.5 rounded-full {{ $schedule->session_type == 'theory' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                                    {{ ucfirst($schedule->session_type ?? 'theory') }}
                                                </span>
                                            </div>
                                        </div>
                                        <a href="{{ route('instructor.attendance.mark', $schedule->id) }}"
                                           class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                                            Mark
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if($pendingSchedules->count() > 5)
                            <div class="mt-4 text-center">
                                <p class="text-sm text-gray-500">And {{ $pendingSchedules->count() - 5 }} more...</p>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-gray-500 dark:text-gray-400">All attendance up to date!</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Recent Attendance Records --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            Recently Marked Attendance
                        </h2>
                        <a href="{{ route('instructor.attendance.report') }}"
                           class="text-sm text-blue-600 hover:text-blue-700">
                            View Report →
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    @if($recentAttendance->count() > 0)
                        <div class="space-y-3">
                            @foreach($recentAttendance as $schedule)
                                @php
                                    $attendanceStats = [
                                        'present' => $schedule->attendances->where('status', 'present')->count(),
                                        'absent' => $schedule->attendances->where('status', 'absent')->count(),
                                        'late' => $schedule->attendances->where('status', 'late')->count(),
                                        'total' => $schedule->attendances->count()
                                    ];
                                @endphp
                                <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $schedule->course->objective }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            {{ Carbon::parse($schedule->schedule_date)->format('M d, Y') }} • {{ $schedule->topic->topic }}
                                        </p>
                                    </div>
                                    <div class="flex items-center space-x-2 text-xs">
                                        <span class="text-green-600">✓ {{ $attendanceStats['present'] }}</span>
                                        <span class="text-red-600">✗ {{ $attendanceStats['absent'] }}</span>
                                        <span class="text-yellow-600">⏰ {{ $attendanceStats['late'] }}</span>
                                        <a href="{{ route('instructor.attendance.edit', $schedule->id) }}"
                                           class="ml-2 text-blue-600 hover:text-blue-700">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-500 dark:text-gray-400">No attendance records yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
