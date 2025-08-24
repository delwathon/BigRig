{{-- resources/views/student/dashboard.blade.php --}}
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Welcome Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Welcome back, {{ Auth::user()->firstName }}! 👋
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                You're enrolled in {{ $enrolledCourses->count() }} {{ Str::plural('course', $enrolledCourses->count()) }}
            </p>
        </div>

        {{-- Enrolled Courses Overview --}}
        @if($enrolledCourses->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
                @foreach($courseData as $data)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">
                                    {{ $data['course']->objective }}
                                </h3>
                                <div class="space-y-1 text-sm">
                                    <p class="text-gray-600 dark:text-gray-400">
                                        <span class="font-medium">Duration:</span> {{ $data['course']->duration }} weeks
                                    </p>
                                    <p class="text-gray-600 dark:text-gray-400">
                                        <span class="font-medium">Instructor:</span>
                                        @if($data['instructor'])
                                            {{ $data['instructor']->firstName }} {{ $data['instructor']->lastName }}
                                        @else
                                            <span class="text-yellow-600">Pending Assignment</span>
                                        @endif
                                    </p>
                                    <div class="flex space-x-4 mt-2">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Theory: {{ $data['theory_hours'] }}hrs
                                        </span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Practical: {{ $data['practical_hours'] }}hrs
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-2">
                                @if($data['course']->image_url)
                                    <img src="{{ Storage::url($data['course']->image_url) }}"
                                         alt="{{ $data['course']->objective }}"
                                         class="w-16 h-16 rounded-lg object-cover">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- No courses enrolled --}}
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-6 mb-8">
                <div class="flex">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">No Active Courses</h3>
                        <p class="mt-1 text-sm text-yellow-700 dark:text-yellow-300">
                            You don't have any active course enrollments. Please contact administration.
                        </p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Add this to the student dashboard --}}
        @if($unreadCount > 0)
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">
                            You have {{ $unreadCount }} unread {{ Str::plural('announcement', $unreadCount) }}
                        </h3>
                        <div class="mt-2">
                            <a href="{{ route('student.announcements') }}" class="text-sm font-medium text-yellow-700 hover:text-yellow-600">
                                View all announcements →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Recent Announcements List --}}
        @if($announcements->count() > 0)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow mb-6">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        📢 Recent Announcements
                    </h2>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($announcements->take(3) as $announcement)
                        <div class="px-6 py-4 {{ !$announcement->is_read ? 'bg-blue-50 dark:bg-blue-900/20' : '' }}">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    @if($announcement->priority == 'high')
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-red-100 rounded-full">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                            </svg>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </span>
                                    @endif
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $announcement->title }}
                                        @if(!$announcement->is_read)
                                            <span class="ml-2 px-2 py-0.5 text-xs bg-blue-100 text-blue-800 rounded-full">New</span>
                                        @endif
                                    </p>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ Str::limit($announcement->content, 100) }}
                                    </p>
                                    <p class="mt-1 text-xs text-gray-500">
                                        {{ $announcement->created_at->diffForHumans() }}
                                        @if($announcement->course)
                                            • {{ $announcement->course->objective }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="px-6 py-3 bg-gray-50 dark:bg-gray-900/50">
                    <a href="{{ route('student.announcements') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                        View all announcements →
                    </a>
                </div>
            </div>
        @endif

        {{-- Quick Stats Row --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            {{-- Total Courses Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Total Courses</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $enrolledCourses->count() }}
                        </h3>
                    </div>
                </div>
            </div>

            {{-- Assigned Instructors Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Assigned Instructors</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $instructorAssignments->count() }}/{{ $enrolledCourses->count() }}
                        </h3>
                    </div>
                </div>
            </div>

            {{-- Batch Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Batch</span>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                            {{ Auth::user()->enrolmentBatch->batch_name ?? 'Not Assigned' }}
                        </h3>
                    </div>
                </div>
            </div>

            {{-- Next Class Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-orange-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Next Class</span>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                            @if($upcomingSchedule->first())
                                {{ Carbon::parse($upcomingSchedule->first()->schedule_date)->format('M d, H:i') }}
                            @else
                                No Scheduled Class
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left Column - Schedule & Materials --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Upcoming Schedule (All Courses) --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            📅 Upcoming Classes (All Courses)
                        </h2>
                    </div>
                    <div class="p-6">
                        @if($upcomingSchedule->count() > 0)
                            <div class="space-y-3">
                                @foreach($upcomingSchedule as $schedule)
                                    <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                                <span class="text-blue-600 dark:text-blue-300 font-semibold">
                                                    {{ Carbon::parse($schedule->schedule_date)->format('d') }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-sm font-semibold text-gray-800 dark:text-gray-100">
                                                {{ $schedule->topic->topic }}
                                            </h4>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                <span class="font-medium">{{ $schedule->course->objective }}</span> •
                                                {{ Carbon::parse($schedule->schedule_date)->format('l, M d') }} •
                                                {{ $schedule->time_start }} - {{ $schedule->time_stop }}
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                                Instructor: {{ $schedule->instructor->firstName }} {{ $schedule->instructor->lastName }}
                                            </p>
                                        </div>
                                        <div class="ml-4">
                                            <span class="px-2 py-1 text-xs rounded-full
                                                {{ $schedule->session_type == 'theory' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                                {{ ucfirst($schedule->session_type) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('student.schedule') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                    View Full Schedule →
                                </a>
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400">No upcoming classes scheduled.</p>
                        @endif
                    </div>
                </div>

                {{-- Recent Course Materials (All Courses) --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            📚 Course Materials
                        </h2>
                    </div>
                    <div class="p-6">
                        @if($courseMaterials->count() > 0)
                            <div class="space-y-2">
                                @foreach($courseMaterials as $material)
                                    <a href="{{ route('student.download-material', $material->id) }}"
                                       class="flex items-center p-3 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition">
                                        <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path>
                                        </svg>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-800 dark:text-gray-100">
                                                {{ $material->file_name }}
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ $material->course_name }} • Uploaded {{ $material->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                        </svg>
                                    </a>
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('student.materials') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                    View All Materials →
                                </a>
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400">No course materials available yet.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right Column - Quick Actions & Individual Course Progress --}}
            <div class="space-y-6">
                {{-- Quick Actions --}}
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                        Quick Actions
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('student.courses') }}"
                           class="w-full flex items-center justify-between p-3 bg-blue-50 dark:bg-blue-900/20 hover:bg-blue-100 dark:hover:bg-blue-900/30 rounded-lg transition">
                            <span class="text-sm font-medium text-blue-700 dark:text-blue-300">My Courses</span>
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>

                        <a href="{{ route('student.schedule') }}"
                           class="w-full flex items-center justify-between p-3 bg-green-50 dark:bg-green-900/20 hover:bg-green-100 dark:hover:bg-green-900/30 rounded-lg transition">
                            <span class="text-sm font-medium text-green-700 dark:text-green-300">Full Schedule</span>
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>

                        <a href="{{ route('chats') }}"
                           class="w-full flex items-center justify-between p-3 bg-purple-50 dark:bg-purple-900/20 hover:bg-purple-100 dark:hover:bg-purple-900/30 rounded-lg transition">
                            <span class="text-sm font-medium text-purple-700 dark:text-purple-300">Messages</span>
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>

                        <a href="{{ route('forum.list') }}"
                           class="w-full flex items-center justify-between p-3 bg-yellow-50 dark:bg-yellow-900/20 hover:bg-yellow-100 dark:hover:bg-yellow-900/30 rounded-lg transition">
                            <span class="text-sm font-medium text-yellow-700 dark:text-yellow-300">Discussion Forum</span>
                            <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Payment Status --}}
                @if($subscription)
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                        Payment Status
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Status:</span>
                            <span class="text-sm font-medium
                                {{ $subscription->payment_status == 'completed' ? 'text-green-600' : 'text-yellow-600' }}">
                                {{ ucfirst($subscription->payment_status) }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Amount:</span>
                            <span class="text-sm font-medium">₦{{ number_format($subscription->total_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Date:</span>
                            <span class="text-sm font-medium">{{ $subscription->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
