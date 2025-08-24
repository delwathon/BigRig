{{-- resources/views/instructor/materials/index.blade.php --}}
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                Course Materials
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Upload and manage course materials for your students
            </p>
        </div>

        {{-- Statistics --}}
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Total Files</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total_materials'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Total Size</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total_size'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Courses</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['courses_with_materials'] }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">This Week</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['recent_uploads'] }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Upload Form --}}
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                            Upload New Material
                        </h2>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('instructor.materials.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Select Course
                                </label>
                                <select name="course_id" required
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                                    <option value="">Choose a course...</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->objective }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Select File
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-gray-400 transition">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                            <label for="file-upload" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="file" type="file" class="sr-only" required
                                                       accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.zip,.rar,.jpg,.jpeg,.png,.gif">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            PDF, DOC, XLS, PPT up to 20MB
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Description (Optional)
                                </label>
                                <textarea name="description" rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100"
                                          placeholder="Brief description of the material..."></textarea>
                            </div>

                            <button type="submit"
                                    class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition">
                                Upload Material
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Materials List --}}
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                Recent Materials
                            </h2>
                            <div class="flex items-center space-x-2">
                                <input type="text"
                                       id="searchMaterials"
                                       placeholder="Search materials..."
                                       class="px-3 py-1.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100">
                            </div>
                        </div>
                    </div>

                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($materials as $material)
                            <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 material-item"
                                 data-name="{{ strtolower($material->file_name) }}"
                                 data-course="{{ strtolower($material->objective->objective ?? '') }}">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-start space-x-3">
                                        @php
                                            $extension = strtolower($material->file_type);
                                            $iconColor = match($extension) {
                                                'pdf' => 'text-red-500',
                                                'doc', 'docx' => 'text-blue-500',
                                                'xls', 'xlsx' => 'text-green-500',
                                                'ppt', 'pptx' => 'text-orange-500',
                                                'zip', 'rar' => 'text-purple-500',
                                                'jpg', 'jpeg', 'png', 'gif' => 'text-indigo-500',
                                                default => 'text-gray-500'
                                            };
                                        @endphp
                                        <div class="flex-shrink-0">
                                            <svg class="w-10 h-10 {{ $iconColor }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ $material->file_name }}
                                            </h3>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                {{ $material->objective->objective ?? 'Unknown Course' }}
                                            </p>
                                            @if($material->description)
                                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                                    {{ $material->description }}
                                                </p>
                                            @endif
                                            <div class="flex items-center space-x-3 mt-2 text-xs text-gray-500">
                                                <span>{{ $material->file_size }}</span>
                                                <span>•</span>
                                                <span>Uploaded {{ $material->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('instructor.materials.download', $material->id) }}"
                                           class="text-blue-600 hover:text-blue-700" title="Download">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('instructor.materials.destroy', $material->id) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this material?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700" title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-12 text-center">
                                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">No Materials Yet</h3>
                                <p class="text-gray-500 dark:text-gray-400">Upload your first material using the form on the left.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($materials->hasPages())
                        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                            {{ $materials->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript for search and file upload preview --}}
    <script>
        // Search functionality
        document.getElementById('searchMaterials').addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const items = document.querySelectorAll('.material-item');

            items.forEach(item => {
                const name = item.dataset.name;
                const course = item.dataset.course;

                if (name.includes(searchTerm) || course.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // File upload preview
        document.getElementById('file-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const fileSize = (file.size / 1024 / 1024).toFixed(2);
                const fileName = file.name;

                // Update the upload area with file info
                const uploadText = document.querySelector('.flex.text-sm.text-gray-600');
                if (uploadText) {
                    uploadText.innerHTML = `
                        <span class="text-green-600">Selected: ${fileName} (${fileSize} MB)</span>
                    `;
                }
            }
        });

        // Drag and drop functionality
        const dropZone = document.querySelector('.border-dashed');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-blue-500', 'bg-blue-50');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-blue-500', 'bg-blue-50');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            document.getElementById('file-upload').files = files;

            // Trigger change event
            const event = new Event('change', { bubbles: true });
            document.getElementById('file-upload').dispatchEvent(event);
        }
    </script>
</x-app-layout>
