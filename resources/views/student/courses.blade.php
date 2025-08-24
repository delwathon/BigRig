{{-- resources/views/student/courses.blade.php --}}
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                My Courses
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Manage and track your enrolled courses
            </p>
        </div>

        {{-- Courses Grid --}}
        @if($courses->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($courses as $data)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-lg transition-shadow">
                        {{-- Course Image --}}
                        @if($data['course']->image_url)
                            <div class="h-48 w-full overflow-hidden rounded-t-lg">
                                <img src="{{ Storage::url($data['course']->image_url) }}"
                                     alt="{{ $data['course']->objective }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-48 w-full bg-gradient-to-br from-blue-500 to-purple-600 rounded-t-lg flex items-center justify-center">
                                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                        @endif

                        {{-- Course Content --}}
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">
                                {{ $data['course']->objective }}
                            </h3>

                            {{-- Course Info --}}
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Duration: {{ $data['course']->duration }} weeks
                                </div>

                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    @if($data['instructor'])
                                        {{ $data['instructor']->firstName }} {{ $data['instructor']->lastName }}
                                    @else
                                        <span class="text-yellow-600">Instructor Pending</span>
                                    @endif
                                </div>

                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    {{ $data['curriculum_count'] }} Topics • {{ $data['materials_count'] }} Materials
                                </div>
                            </div>

                            {{-- Course Stats --}}
                            <div class="flex space-x-2 mb-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Theory: {{ $data['course']->theory_session }}hrs
                                </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Practical: {{ $data['course']->practical_session }}hrs
                                </span>
                            </div>

                            {{-- Progress Bar --}}
                            <div class="mb-4">
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-600 dark:text-gray-400">Progress</span>
                                    <span class="font-medium">{{ $data['progress'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $data['progress'] }}%"></div>
                                </div>
                            </div>

                            {{-- Action Button --}}
                            <a href="{{ route('student.course-details', $data['course']->id) }}"
                               class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                                View Course Details
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- No Courses --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-12 text-center">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">No Courses Enrolled</h3>
                <p class="text-gray-500 dark:text-gray-400">You haven't enrolled in any courses yet.</p>
            </div>
        @endif
    </div>
</x-app-layout>
