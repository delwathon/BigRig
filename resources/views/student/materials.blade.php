{{-- resources/views/student/materials.blade.php --}}
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Course Materials
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Download and access your learning resources
            </p>
        </div>

        {{-- Materials Grid --}}
        @if($materials->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($materials as $material)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
                        <div class="p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    @php
                                        $extension = pathinfo($material->file_name, PATHINFO_EXTENSION);
                                        $iconColor = match(strtolower($extension)) {
                                            'pdf' => 'text-red-500',
                                            'doc', 'docx' => 'text-blue-500',
                                            'xls', 'xlsx' => 'text-green-500',
                                            'ppt', 'pptx' => 'text-orange-500',
                                            'zip', 'rar' => 'text-purple-500',
                                            'jpg', 'jpeg', 'png', 'gif' => 'text-indigo-500',
                                            default => 'text-gray-500'
                                        };
                                    @endphp
                                    <svg class="w-12 h-12 {{ $iconColor }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ $material->file_name }}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Course: {{ $material->course_name ?? 'Unknown' }}
                                    </p>
                                    @if($material->description)
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-500">
                                            {{ Str::limit($material->description, 100) }}
                                        </p>
                                    @endif
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-500">
                                        Uploaded {{ $material->created_at->diffForHumans() }}
                                        @if($material->file_size)
                                            • {{ $material->file_size }}
                                        @endif
                                    </p>
                                    <a href="{{ route('student.download-material', $material->id) }}"
                                    class="mt-3 inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                        </svg>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $materials->links() }}
            </div>
        @else
            {{-- Empty state remains the same --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-12 text-center">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">No Materials Available</h3>
                <p class="text-gray-500 dark:text-gray-400">Course materials will appear here once uploaded by instructors.</p>
            </div>
        @endif
    </div>
</x-app-layout>
