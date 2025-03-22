<div class="m-1.5">
    <!-- Modal backdrop -->
    <div
        class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
        x-show="$store.editModal.modalOpen"
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
        id="edit-modal"
        class="fixed inset-0 z-50 overflow-hidden flex items-center justify-center px-4 sm:px-6"
        role="dialog"
        aria-modal="true"
        x-show="$store.editModal.modalOpen"
        x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        x-cloak
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-4xl w-full max-h-full" @click.stop>
            <!-- Modal header -->
            <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700/60">
                <div class="flex justify-between items-center">
                    <div class="font-semibold text-gray-800 dark:text-gray-100">Edit Course</div>
                    <button class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400" @click="$store.editModal.close()">
                        <div class="sr-only">Close</div>
                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal content -->
            <form method="POST" action="{{ route('objective.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="px-5 py-4">
                    <div class="space-y-3 mt-3">
                        <!-- Form fields -->
                        <input type="hidden" x-model="$store.editModal.data.id" name="id">
                        <div class="flex gap-4">
                            <div class="sm:w-1/3">
                                <label class="block text-sm font-medium mb-1" for="name">Course Title <span class="text-red-500">*</span></label>
                                <input id="name" class="form-input w-full px-2 py-1" type="text" name="objective" x-model="$store.editModal.data.objective"  />
                            </div>
                            <div class="sm:w-1/3">
                                <label class="block text-sm font-medium mb-1" for="price">Course Price ($) <span class="text-red-500">*</span></label>
                                <input id="price" class="form-input w-full px-2 py-1" type="string" name="price" x-model="$store.editModal.data.price"  />
                            </div>
                            <div class="sm:w-1/3">
                                <label class="block text-sm font-medium mb-1" for="duration">Course Duration (Weeks) <span class="text-red-500">*</span></label>
                                <input id="duration" class="form-input w-full px-2 py-1" type="number" name="duration" x-model="$store.editModal.data.duration"  />
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="sm:w-1/3">
                                <label class="block text-sm font-medium mb-1" for="theory_session">Theory Session (Hours) <span class="text-red-500">*</span></label>
                                <input id="theory_session" class="form-input w-full px-2 py-1" type="number" name="theory_session"  x-model="$store.editModal.data.theory_session"/>
                            </div>
                            <div class="sm:w-1/3">
                                <label class="block text-sm font-medium mb-1" for="practical_session">Practical Session (Hours) <span class="text-red-500">*</span></label>
                                <input id="practical_session" class="form-input w-full px-2 py-1" type="number" name="practical_session"  x-model="$store.editModal.data.practical_session"/>
                            </div>
                            <div class="sm:w-1/3">
                                <label class="block text-sm font-medium mb-1" for="examination">Examination <span class="text-red-500">*</span></label>
                                <input id="examination" class="form-input w-full px-2 py-1" type="text" name="examination" placeholder="20 Mins+ 30 Mins"  x-model="$store.editModal.data.examination"  />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="requirements">Requirements <span class="text-red-500">*</span></label>
                            <textarea name="requirements" class="form-textarea w-full px-2 py-1" id="editor1" rows="10" cols="80"></textarea>
                        </div>
                        <div class="flex gap-4">
                            <div class="sm:w-1/2">
                                <label class="block text-sm font-medium mb-1" for="image_url">Display Picture</label>
                                <input id="picture" class="form-input w-full px-2 py-1" type="file" name="image_url"  />
                                <span class="text-xs">.jpg and .png extensions only.</span>
                            </div>
                            <div class="sm:w-1/2">
                                <label class="block text-sm font-medium mb-1" for="video_thumbnail_url">Video Thumbnail</label>
                                <input id="picture" class="form-input w-full px-2 py-1" type="file" name="video_thumbnail_url" />
                                <span class="text-xs">.jpg and .png extensions only.</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="video_url">Video URL</label>
                            <input id="video_url" class="form-input w-full px-2 py-1" type="url" x-model="$store.editModal.data.video_url" name="video_url" />
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="px-5 py-4 border-t border-gray-200 dark:border-gray-700/60">
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button type="button" class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.editModal.close()">Cancel</button>
                        <button type="submit" class="btn-sm bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>