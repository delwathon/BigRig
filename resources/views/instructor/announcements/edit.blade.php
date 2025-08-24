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

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Edit Announcement
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Update the announcement details
            </p>
        </div>

        {{-- Form --}}
        <form action="{{ route('instructor.announcements.update', $announcement->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="p-6 space-y-6">

                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $announcement->title) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100"
                               placeholder="Enter announcement title">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Content <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content"
                                  id="content"
                                  rows="6"
                                  required
                                  class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100"
                                  placeholder="Enter announcement content...">{{ old('content', $announcement->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Type --}}
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Type <span class="text-red-500">*</span>
                            </label>
                            <select name="type"
                                    id="type"
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                <option value="">Select type...</option>
                                <option value="general" {{ old('type', $announcement->type) == 'general' ? 'selected' : '' }}>General</option>
                                <option value="course" {{ old('type', $announcement->type) == 'course' ? 'selected' : '' }}>Course Specific</option>
                                <option value="batch" {{ old('type', $announcement->type) == 'batch' ? 'selected' : '' }}>Batch Specific</option>
                                <option value="urgent" {{ old('type', $announcement->type) == 'urgent' ? 'selected' : '' }}>Urgent</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Priority --}}
                        <div>
                            <label for="priority" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Priority <span class="text-red-500">*</span>
                            </label>
                            <select name="priority"
                                    id="priority"
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                <option value="">Select priority...</option>
                                <option value="low" {{ old('priority', $announcement->priority) == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ old('priority', $announcement->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ old('priority', $announcement->priority) == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                            @error('priority')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Course (Optional) --}}
                        <div id="course-select" style="{{ old('type', $announcement->type) == 'course' ? '' : 'display: none;' }}">
                            <label for="course_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Course (Optional)
                            </label>
                            <select name="course_id"
                                    id="course_id"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                <option value="">All courses...</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id', $announcement->course_id) == $course->id ? 'selected' : '' }}>
                                        {{ $course->objective }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Batch (Optional) --}}
                        <div id="batch-select" style="{{ old('type', $announcement->type) == 'batch' ? '' : 'display: none;' }}">
                            <label for="batch_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Batch (Optional)
                            </label>
                            <select name="batch_id"
                                    id="batch_id"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                <option value="">All batches...</option>
                                @foreach($batches as $batch)
                                    <option value="{{ $batch->id }}" {{ old('batch_id', $announcement->batch_id) == $batch->id ? 'selected' : '' }}>
                                        {{ $batch->batch_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('batch_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Publish Date --}}
                        <div>
                            <label for="publish_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Publish Date (Optional)
                            </label>
                            <input type="datetime-local"
                                   name="publish_date"
                                   id="publish_date"
                                   value="{{ old('publish_date', $announcement->publish_date ? Carbon::parse($announcement->publish_date)->format('Y-m-d\TH:i') : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                            <p class="mt-1 text-xs text-gray-500">Leave empty to publish immediately</p>
                            @error('publish_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Expiry Date --}}
                        <div>
                            <label for="expiry_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Expiry Date (Optional)
                            </label>
                            <input type="datetime-local"
                                   name="expiry_date"
                                   id="expiry_date"
                                   value="{{ old('expiry_date', $announcement->expiry_date ? Carbon::parse($announcement->expiry_date)->format('Y-m-d\TH:i') : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                            <p class="mt-1 text-xs text-gray-500">Leave empty for no expiry</p>
                            @error('expiry_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Active Status --}}
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ old('is_active', $announcement->is_active) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                Active (visible to students)
                            </span>
                        </label>
                    </div>

                </div>

                {{-- Form Actions --}}
                <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-600 flex items-center justify-between">
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Created {{ $announcement->created_at->diffForHumans() }}
                        @if($announcement->reads()->count() > 0)
                            • Read by {{ $announcement->reads()->distinct('user_id')->count('user_id') }} students
                        @endif
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('instructor.announcements') }}"
                           class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                            Update Announcement
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- JavaScript for dynamic form --}}
    <script>
        // Show/hide course and batch selects based on type
        document.getElementById('type').addEventListener('change', function() {
            const courseSelect = document.getElementById('course-select');
            const batchSelect = document.getElementById('batch-select');

            if (this.value === 'course') {
                courseSelect.style.display = 'block';
                batchSelect.style.display = 'none';
                // Clear batch selection
                document.getElementById('batch_id').value = '';
            } else if (this.value === 'batch') {
                courseSelect.style.display = 'none';
                batchSelect.style.display = 'block';
                // Clear course selection
                document.getElementById('course_id').value = '';
            } else {
                courseSelect.style.display = 'none';
                batchSelect.style.display = 'none';
                // Clear both selections
                document.getElementById('course_id').value = '';
                document.getElementById('batch_id').value = '';
            }
        });
    </script>
</x-app-layout>
