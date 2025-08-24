@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Welcome Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Instructor Dashboard
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Welcome back, {{ Auth::user()->firstName }}! Manage your classes and students.
            </p>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4 mb-8">
            {{-- Total Courses --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Courses</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total_courses'] }}</h3>
                    </div>
                </div>
            </div>

            {{-- Total Students --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Students</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total_students'] }}</h3>
                    </div>
                </div>
            </div>

            {{-- Today's Classes --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Today</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['today_classes'] }}</h3>
                    </div>
                </div>
            </div>

            {{-- Weekly Attendance --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Attendance</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['weekly_attendance'] }}%</h3>
                    </div>
                </div>
            </div>

            {{-- Pending Attendance --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-red-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Pending</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['pending_attendance'] }}</h3>
                    </div>
                </div>
            </div>

            {{-- Materials --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Materials</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['materials_uploaded'] }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left Column - Today's Schedule --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Today's Classes --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            Today's Schedule
                        </h2>
                    </div>
                    <div class="p-6">
                        @if($todaySchedule->count() > 0)
                            <div class="space-y-4">
                                @foreach($todaySchedule as $schedule)
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <h4 class="text-sm font-semibold text-gray-800 dark:text-gray-100">
                                                    {{ $schedule->time_start }} - {{ $schedule->time_stop }}
                                                </h4>
                                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                    {{ $schedule->topic->topic }}
                                                </p>
                                                <div class="flex items-center space-x-4 mt-2 text-xs text-gray-500 dark:text-gray-400">
                                                    <span>{{ $schedule->course->objective }}</span>
                                                    <span>{{ $schedule->batch->batch_name }}</span>
                                                    <span class="px-2 py-1 rounded-full {{ $schedule->session_type == 'theory' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                                        {{ ucfirst($schedule->session_type ?? 'theory') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                @php
                                                    $scheduleDate = Carbon::parse($schedule->schedule_date)->format('Y-m-d');
                                                    $scheduleTime = Carbon::parse($scheduleDate . ' ' . $schedule->time_start);
                                                    $isPast = $scheduleTime->isPast();
                                                @endphp

                                                @if(!$isPast)
                                                    <a href="{{ route('instructor.attendance.mark', $schedule->id) }}"
                                                       class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg">
                                                        Mark Attendance
                                                    </a>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-lg">
                                                        Completed
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-center">No classes scheduled for today.</p>
                        @endif
                    </div>
                </div>

                {{-- Upcoming Classes --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            Upcoming Classes
                        </h2>
                    </div>
                    <div class="p-6">
                        @if($upcomingSchedule->count() > 0)
                            <div class="space-y-3">
                                @foreach($upcomingSchedule as $schedule)
                                    <div class="flex items-center justify-between p-3 border-l-4 border-blue-500 bg-gray-50 dark:bg-gray-700">
                                        <div>
                                            <p class="text-sm font-medium text-gray-800 dark:text-gray-100">
                                                {{ Carbon::parse($schedule->schedule_date)->format('M d, Y') }} • {{ $schedule->time_start }}
                                            </p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                                {{ $schedule->course->objective }} - {{ $schedule->topic->topic }}
                                            </p>
                                        </div>
                                        <span class="text-xs px-2 py-1 rounded-full {{ $schedule->session_type == 'theory' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                            {{ ucfirst($schedule->session_type ?? 'theory') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-center">No upcoming classes in the next 7 days.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right Column - Quick Actions & Course Overview --}}
            <div class="space-y-6">
                {{-- Quick Actions --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                        Quick Actions
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('instructor.students') }}"
                           class="w-full flex items-center justify-between p-3 bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-100 dark:hover:bg-blue-900/30 rounded-lg transition">
                            <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Manage Students</span>
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>

                        <a href="{{ route('instructor.attendance') }}"
                           class="w-full flex items-center justify-between p-3 bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/30 rounded-lg transition">
                            <span class="text-sm font-medium text-green-700 dark:text-green-300">Mark Attendance</span>
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>

                        <a href="{{ route('instructor.materials') }}"
                           class="w-full flex items-center justify-between p-3 bg-purple-50 dark:bg-purple-900/20 hover:bg-purple-100 dark:hover:bg-purple-900/30 rounded-lg transition">
                            <span class="text-sm font-medium text-purple-700 dark:text-purple-300">Upload Materials</span>
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>

                        <a href="{{ route('instructor.announcements') }}"
                           class="w-full flex items-center justify-between p-3 bg-yellow-50 dark:bg-yellow-900/20 hover:bg-yellow-100 dark:hover:bg-yellow-900/30 rounded-lg transition">
                            <span class="text-sm font-medium text-yellow-700 dark:text-yellow-300">Create Announcement</span>
                            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Course Overview --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                        My Courses
                    </h3>
                    <div class="space-y-3">
                        @foreach($assignedCourses as $course)
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-800 dark:text-gray-100">
                                        {{ $course->objective }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $studentsByCourse->get($course->id)->count() ?? 0 }} students
                                    </p>
                                </div>
                                <a href="{{ route('instructor.course.students', $course->id) }}"
                                   class="text-xs text-blue-600 hover:text-blue-700">
                                    View →
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
