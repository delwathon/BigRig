@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Back Button --}}
        <a href="{{ route('instructor.announcements') }}" class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 mb-4">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Announcements
        </a>

        {{-- Announcement Details --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-start justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $announcement->title }}
                        </h1>
                        <div class="flex items-center space-x-4 mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $announcement->type == 'general' ? 'bg-gray-100 text-gray-800' : '' }}
                                {{ $announcement->type == 'course' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $announcement->type == 'batch' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $announcement->type == 'urgent' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($announcement->type) }}
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $announcement->priority == 'high' ? 'bg-red-100 text-red-800' : '' }}
                                {{ $announcement->priority == 'medium' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $announcement->priority == 'low' ? 'bg-green-100 text-green-800' : '' }}">
                                {{ ucfirst($announcement->priority) }} Priority
                            </span>
                            @if($announcement->is_active)
                                @if($announcement->expiry_date && Carbon::parse($announcement->expiry_date)->isPast())
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Expired
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @endif
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Inactive
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('instructor.announcements.edit', $announcement->id) }}"
                           class="px-3 py-1.5 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-lg transition inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('instructor.announcements.destroy', $announcement->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition inline-flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="p-6">
                {{-- Announcement Content --}}
                <div class="prose dark:prose-invert max-w-none mb-6">
                    {!! nl2br(e($announcement->content)) !!}
                </div>

                {{-- Metadata --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Target Audience</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                            @if($announcement->course)
                                Course: {{ $announcement->course->objective }}
                            @elseif($announcement->batch)
                                Batch: {{ $announcement->batch->batch_name }}
                            @else
                                All Students
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Publish Date</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                            {{ $announcement->publish_date ? Carbon::parse($announcement->publish_date)->format('M d, Y h:i A') : 'Immediately' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Expiry Date</p>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                            {{ $announcement->expiry_date ? Carbon::parse($announcement->expiry_date)->format('M d, Y h:i A') : 'No Expiry' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Read Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Target Students</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $targetStudents }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Total Reads</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $readStats['total_reads'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Read Rate</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $targetStudents > 0 ? round(($readStats['unique_readers'] / $targetStudents) * 100) : 0 }}%
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Reads --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    Recent Reads
                </h2>
            </div>
            <div class="p-6">
                @if($readStats['recent_reads']->count() > 0)
                    <div class="space-y-3">
                        @foreach($readStats['recent_reads'] as $read)
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ substr($read->user->firstName, 0, 1) }}{{ substr($read->user->lastName, 0, 1) }}
                                        </span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $read->user->firstName }} {{ $read->user->lastName }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $read->user->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ Carbon::parse($read->read_at)->diffForHumans() }}
                                </div>
                            </div>
                        @endforeach

                        @if($readStats['total_reads'] > 10)
                            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-4">
                                And {{ $readStats['total_reads'] - 10 }} more...
                            </p>
                        @endif
                    </div>
                @else
                    <p class="text-center text-gray-500 dark:text-gray-400">
                        No one has read this announcement yet.
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
