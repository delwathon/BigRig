<div class="m-1.5" x-data>
    <!-- Modal backdrop -->
    <div
        class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
        x-show="$store.uploadCourseMaterials.modalOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        aria-hidden="true"
        x-cloak
    ></div>
    <!-- Modal dialog -->
    <div
        id="course-materials-modal"
        class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
        role="dialog"
        aria-modal="true"
        x-show="$store.uploadCourseMaterials.modalOpen"
        x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        x-cloak
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="$store.uploadCourseMaterials.modalOpen = true" @keydown.escape.window="$store.uploadCourseMaterials.modalOpen = true">
            <form method="POST" action="{{ route('upload-course-materials') }}" enctype="multipart/form-data">
            @csrf
                <!-- Modal header -->
                <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700/60">
                    <div class="flex justify-between items-center">
                        <div class="font-semibold text-gray-800 dark:text-gray-100">{{ $objective->objective }} Course Materials Upload</div>
                        <button type="button" class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400" @click="$store.uploadCourseMaterials.modalOpen = false">
                            <div class="sr-only">Close</div>
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Modal content -->
                <div class="px-5 py-4">
                    <div class="space-y-3" x-data="fileUploadPreview()">
                        <input type="hidden" x-model="$store.uploadCourseMaterials.data.id" name="id">
                        <!-- Dropzone -->
                        <div 
                            id="dropzone" 
                            class="dropzone border border-dashed p-12 rounded-md"
                            @dragover.prevent
                            @drop.prevent="handleDrop"
                            @click="$refs.fileInput.click()"
                        >
                            <div class="dz-message">Drag and drop files here, or click to select files.</div>
                            <input 
                                type="file" 
                                class="hidden" 
                                x-ref="fileInput" 
                                multiple 
                                name="files[]"
                                @change="handleFileSelection"
                            />
                        </div>
                    
                        <!-- File Previews -->
                        <div class="file-previews grid grid-cols-2 gap-2">
                            <template x-for="(file, index) in files" :key="index">
                                <div class="file-preview flex items-center space-x-2 border p-2 rounded">
                                    <template x-if="file.type.startsWith('image/')">
                                        <img :src="file.preview" alt="Preview" class="w-16 h-16 object-cover rounded">
                                    </template>
                                    <template x-if="!file.type.startsWith('image/')">
                                        <div class="file-icon w-16 h-16 flex items-center justify-center bg-gray-100 text-gray-500 rounded">
                                            <span x-text="file.extension.toUpperCase()"></span>
                                        </div>
                                    </template>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700 truncate" x-text="file.name"></p>
                                        <p class="text-xs text-gray-500" x-text="formatFileSize(file.size)"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>                        
                </div>
                <!-- Modal footer -->
                <div class="px-5 py-4 border-t border-gray-200 dark:border-gray-700/60">
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button type="button" class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.uploadCourseMaterials.modalOpen = false">Cancel</button>
                        <button type="submit" class="btn-sm bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>                                            
</div>