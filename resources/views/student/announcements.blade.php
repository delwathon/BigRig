{{-- resources/views/student/announcements.blade.php --}}
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Announcements
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Stay updated with important notices and information
            </p>
        </div>

        {{-- Announcements List --}}
        @if($announcements->count() > 0)
            <div class="space-y-4">
                @foreach($announcements as $announcement)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="p-6">
                            <div class="flex items-start">
                                {{-- Priority Indicator --}}
                                <div class="flex-shrink-0 mr-4">
                                    @if($announcement->priority == 'high')
                                        <div class="w-10 h-10 bg-red-100 dark:bg-red-900/50 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                            </svg>
                                        </div>
                                    @elseif($announcement->priority == 'medium')
                                        <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/50 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                {{-- Content --}}
                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $announcement->title }}
                                            </h3>
                                            <div class="mt-1 flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                                <span>{{ $announcement->created_at->format('M d, Y') }}</span>
                                                @if($announcement->course)
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                                        {{ $announcement->course->objective }}
                                                    </span>
                                                @endif
                                                @if($announcement->type == 'urgent')
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                                        Urgent
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Type Badge --}}
                                        <div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                {{ $announcement->type == 'general' ? 'bg-gray-100 text-gray-800' : '' }}
                                                {{ $announcement->type == 'course' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $announcement->type == 'batch' ? 'bg-purple-100 text-purple-800' : '' }}
                                                {{ $announcement->type == 'urgent' ? 'bg-red-100 text-red-800' : '' }}">
                                                {{ ucfirst($announcement->type) }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mt-3 text-gray-600 dark:text-gray-400">
                                        <p>{{ Str::limit($announcement->content, 200) }}</p>
                                    </div>

                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            Posted by {{ $announcement->creator->firstName }} {{ $announcement->creator->lastName }}
                                        </div>
                                        <a href="{{ route('student.announcement.show', $announcement->id) }}"
                                           class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                            Read More →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $announcements->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-12 text-center">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">No Announcements</h3>
                <p class="text-gray-500 dark:text-gray-400">There are no announcements at the moment.</p>
            </div>
        @endif
    </div>
</x-app-layout>
