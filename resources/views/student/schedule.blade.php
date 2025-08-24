{{-- resources/views/student/schedule.blade.php --}}
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                    My Schedule
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    View your upcoming and past classes
                </p>
            </div>

            {{-- View Toggle --}}
            <div class="flex space-x-2">
                <a href="{{ route('student.schedule', ['view' => 'list']) }}"
                   class="px-4 py-2 {{ $view === 'list' ? 'bg-blue-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400' }} rounded-lg">
                    <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    List View
                </a>
                <a href="{{ route('student.schedule', ['view' => 'calendar']) }}"
                   class="px-4 py-2 {{ $view === 'calendar' ? 'bg-blue-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400' }} rounded-lg">
                    <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Calendar View
                </a>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-full p-2">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Classes</p>
                        <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ $stats['total_classes'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-full p-2">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Completed</p>
                        <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ $stats['completed_classes'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-orange-500 rounded-full p-2">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Upcoming</p>
                        <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ $stats['upcoming_classes'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-full p-2">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Theory</p>
                        <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ $stats['theory_sessions'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-full p-2">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Practical</p>
                        <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ $stats['practical_sessions'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Course Filter --}}
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Filter by Course</label>
            <select onchange="window.location.href='{{ route('student.schedule') }}?course_id=' + this.value + '&view={{ $view }}'"
                    class="w-full md:w-auto px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                <option value="all" {{ $selectedCourseId === 'all' ? 'selected' : '' }}>All Courses</option>
                @foreach($enrolledCourses as $course)
                    <option value="{{ $course->id }}" {{ $selectedCourseId == $course->id ? 'selected' : '' }}>
                        {{ $course->objective }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Schedule Display --}}
        @if($view === 'list')
            {{-- List View --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                @if($groupedSchedules->isEmpty())
                    <div class="p-12 text-center">
                        <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">No Schedule Found</h3>
                        <p class="text-gray-500 dark:text-gray-400">No classes scheduled for the selected filters.</p>
                    </div>
                @else
                    @foreach($groupedSchedules as $date => $daySchedules)
                        @php
                            $carbonDate = Carbon::parse($date);
                            $isToday = $carbonDate->isToday();
                            $isPast = $carbonDate->isPast() && !$isToday;
                        @endphp

                        <div class="{{ !$loop->first ? 'border-t border-gray-200 dark:border-gray-700' : '' }}">
                            {{-- Date Header --}}
                            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-900/50">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                    {{ $carbonDate->format('l, F j, Y') }}
                                    @if($isToday)
                                        <span class="ml-2 px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">Today</span>
                                    @elseif($isPast)
                                        <span class="ml-2 px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Past</span>
                                    @endif
                                </h3>
                            </div>

                            {{-- Day's Classes --}}
                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($daySchedules as $schedule)
                                    <div class="px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition {{ $isPast ? 'opacity-60' : '' }}">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <div class="flex items-center mb-2">
                                                    <span class="text-lg font-medium text-gray-800 dark:text-gray-100">
                                                        {{ $schedule->time_start }} - {{ $schedule->time_stop }}
                                                    </span>
                                                    <span class="ml-3 px-2 py-1 text-xs rounded-full
                                                        {{ $schedule->session_type == 'theory' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                                        {{ ucfirst($schedule->session_type) }}
                                                    </span>
                                                </div>

                                                <h4 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-1">
                                                    {{ $schedule->topic->topic }}
                                                </h4>

                                                <div class="flex items-center space-x-4 text-sm text-gray-600 dark:text-gray-400">
                                                    <span class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                        </svg>
                                                        {{ $schedule->course->objective }}
                                                    </span>
                                                    <span class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                        </svg>
                                                        {{ $schedule->instructor->firstName }} {{ $schedule->instructor->lastName }}
                                                    </span>
                                                </div>

                                                @if($schedule->topic->summary)
                                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                                        {{ Str::limit($schedule->topic->summary, 150) }}
                                                    </p>
                                                @endif
                                            </div>

                                            {{-- Actions --}}
                                            @if(!$isPast)
                                                <div class="ml-4">
                                                    <button class="text-blue-600 hover:text-blue-700">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @else
            {{-- Calendar View --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div id="calendar"></div>
            </div>

            {{-- Calendar Scripts --}}
            @push('scripts')
            <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,listWeek'
                        },
                        events: @json($calendarEvents),
                        eventClick: function(info) {
                            alert('Class: ' + info.event.title + '\n' +
                                  'Course: ' + info.event.extendedProps.course + '\n' +
                                  'Instructor: ' + info.event.extendedProps.instructor + '\n' +
                                  'Type: ' + info.event.extendedProps.type);
                        }
                    });
                    calendar.render();
                });
            </script>
            @endpush
        @endif
    </div>
</x-app-layout>
