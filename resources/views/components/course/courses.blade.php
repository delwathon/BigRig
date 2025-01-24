<div class="space-y-8">
    <!-- Alert -->
    <div class="relative bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04] rounded-lg p-5">
        <div class="absolute bottom-0 -mb-3">
            <svg width="44" height="42" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="ill-b">
                        <stop stop-color="#B7ACFF" offset="0%" />
                        <stop stop-color="#9C8CFF" offset="100%" />
                    </linearGradient>
                    <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="ill-c">
                        <stop stop-color="#4634B1" offset="0%" />
                        <stop stop-color="#4634B1" stop-opacity="0" offset="100%" />
                    </linearGradient>
                    <path id="ill-a" d="m20 0 20 40-20-6.25L0 40z" />
                </defs>
                <g transform="scale(-1 1) rotate(-51 -11.267 67.017)" fill="none" fill-rule="evenodd">
                    <mask id="ill-d" fill="#fff">
                        <use xlink:href="#ill-a" />
                    </mask>
                    <use fill="url(#ill-b)" xlink:href="#ill-a" />
                    <path fill="url(#ill-c)" mask="url(#ill-d)" d="M20.586-7.913h25v47.5h-25z" />
                </g>
            </svg>
        </div>
        <div class="relative">
            <div class="text-sm font-medium text-gray-800 dark:text-violet-200 mb-2">Remember to keep track of your courses.</div>
            <div class="text-right">
                <a class="text-sm font-medium text-violet-500 hover:text-violet-600" href="javascript:void(0)" @click="$store.createModal.open()" aria-controls="create-modal">Create New Course -&gt;</a>
            </div>
        </div>
    </div>
    <!-- White box -->
    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5 min-w-60">
        <div class="grid md:grid-cols-2 xl:grid-cols-1 gap-6">
            <!-- Group 1 -->
            <div>
                <h2 class="text-gray-800 dark:text-gray-100 font-semibold mb-2">Course List</h2>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                    <ul class="space-y-3">
                        @foreach($objectives as $objective)
                        <!-- Item -->
                        <li class="sm:flex sm:items-center sm:justify-between border-b border-gray-200 dark:border-gray-700/60 p-2">
                            <div class="sm:grow flex items-center text-sm">
                                <!-- Icon -->
                                <div class="w-12 h-12 shrink-0 my-2 mr-3">
                                    <img class="w-full h-12" src="{{ Storage::url($objective->image_url) }}" width="20" height="20" alt="{{ $objective->objective }}" />
                                </div>
                                <!-- Position -->
                                <a href="{{ route('course-details', ['id' => $objective->id]) }}">
                                    <div class="font-medium text-gray-800 dark:text-gray-100">{{ $objective->objective }}</div>
                                    <div class="flex flex-nowrap items-center space-x-2 whitespace-nowrap">
                                        <div>Duration: {{ $objective->duration }} weeks</div>
                                        <div class="text-gray-400 dark:text-gray-600">|</div>
                                        <div>Cost: ${{ $objective->price }}</div>
                                        <div class="text-gray-400 dark:text-gray-600">|</div>
                                        <div>Status: Active</div>
                                    </div>
                                </a>
                            </div>
                            <!-- Tags -->
                            <div class="sm:ml-2 mt-2 sm:mt-0">
                                <div class="flex items-center space-x-2">
                                    <!-- Edit Button -->
                                    <button type="button"  @click="$store.editModal.open({
                                            id: {{ $objective->id }},
                                            objective: '{{ $objective->objective }}',
                                            price: {{ $objective->price }},
                                            duration: {{ $objective->duration }},
                                            requirements: '{{ $objective->requirement }}'
                                        })" 
                                        aria-controls="edit-modal" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                        <svg class="fill-current text-gray-400 dark:text-gray-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                        </svg>
                                    </button>

                                    <!-- Delete Button -->
                                    <button type="button" @click="$store.deleteModal.open({{ $objective->id }})" aria-controls="delete-modal" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" aria-controls="delete-modal">
                                        <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Create Objective Modal -->
<div class="m-1.5">
    <!-- Modal backdrop -->
    <div
        class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
        x-show="$store.createModal.modalOpen"
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
        id="create-modal"
        class="fixed inset-0 z-50 overflow-hidden flex items-center justify-center px-4 sm:px-6"
        role="dialog"
        aria-modal="true"
        x-show="$store.createModal.modalOpen"
        x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        x-cloak
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" 
             @click.outside="$store.createModal.close()" 
             @keydown.escape.window="$store.createModal.close()">
            <!-- Modal header -->
            <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700/60">
                <div class="flex justify-between items-center">
                    <div class="font-semibold text-gray-800 dark:text-gray-100">Add New Course</div>
                    <button class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400" @click="$store.createModal.close()">
                        <div class="sr-only">Close</div>
                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal content -->
            <form method="POST" action="{{ route('objective.store') }}" enctype="multipart/form-data">
            @csrf

                <div class="px-5 py-4">
                    <div class="space-y-3 mt-3">
                        <!-- Form fields -->
                        <div>
                            <label class="block text-sm font-medium mb-1" for="name">Course Title <span class="text-red-500">*</span></label>
                            <input id="name" class="form-input w-full px-2 py-1" type="text" name="objective" required />
                        </div>
                        <div class="flex gap-4">
                            <div class="sm:w-1/2">
                                <label class="block text-sm font-medium mb-1" for="price">Price ($) <span class="text-red-500">*</span></label>
                                <input id="price" class="form-input w-full px-2 py-1" type="string" name="price" required />
                            </div>
                            <div class="sm:w-1/2">
                                <label class="block text-sm font-medium mb-1" for="duration">Duration (Weeks) <span class="text-red-500">*</span></label>
                                <input id="duration" class="form-input w-full px-2 py-1" type="number" name="duration" required />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="requirements">Requirements <span class="text-red-500">*</span></label>
                            <textarea id="requirements" class="form-textarea w-full px-2 py-1" rows="4" name="requirements" required></textarea>
                            <span class="text-xs">Separate requirements with commas (,).</span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="image_url">Picture Upload <span class="text-red-500">*</span></label>
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="image_url" required />
                            <span class="text-xs">.jpg and .png extensions only.</span>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="px-5 py-4 border-t border-gray-200 dark:border-gray-700/60">
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button type="button" class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.createModal.close()">Cancel</button>
                        <button type="submit" class="btn-sm bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Objective Modal -->
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
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" 
             @click.outside="$store.editModal.close()" 
             @keydown.escape.window="$store.editModal.close()">
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
                        <div>
                            <label class="block text-sm font-medium mb-1" for="name">Course Title <span class="text-red-500">*</span></label>
                            <input id="name" class="form-input w-full px-2 py-1" type="text" name="objective" x-model="$store.editModal.data.objective" required />
                        </div>
                        <div class="flex gap-4">
                            <div class="sm:w-1/2">
                                <label class="block text-sm font-medium mb-1" for="price">Price ($) <span class="text-red-500">*</span></label>
                                <input id="price" class="form-input w-full px-2 py-1" type="string" name="price" x-model="$store.editModal.data.price" required />
                            </div>
                            <div class="sm:w-1/2">
                                <label class="block text-sm font-medium mb-1" for="duration">Duration (Weeks) <span class="text-red-500">*</span></label>
                                <input id="duration" class="form-input w-full px-2 py-1" type="number" name="duration" x-model="$store.editModal.data.duration" required />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="requirements">Requirements <span class="text-red-500">*</span></label>
                            <textarea id="requirements" class="form-textarea w-full px-2 py-1" rows="4" name="requirements" x-model="$store.editModal.data.requirements" required></textarea>
                            <span class="text-xs">Separate requirements with commas (,).</span>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="image_url">Picture Upload</label>
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="image_url" />
                            <span class="text-xs">.jpg and .png extensions only.</span>
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

<!-- Delete Objective Modal -->
<div class="m-1.5" x-data>
    <!-- Modal backdrop -->
    <div
        class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
        x-show="$store.deleteModal.modalOpen"
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
        id="delete-modal"
        class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
        role="dialog"
        aria-modal="true"
        x-show="$store.deleteModal.modalOpen"
        x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        x-cloak
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="$store.deleteModal.close()" @keydown.escape.window="$store.deleteModal.close()">
            <div class="p-5 flex space-x-4">
                <!-- Icon -->
                <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-gray-100 dark:bg-gray-700">
                    <svg class="shrink-0 fill-current text-red-500" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z" />
                    </svg>
                </div>
                <!-- Content -->
                <div>
                    <!-- Modal header -->
                    <div class="mb-2">
                        <div class="text-lg font-semibold text-gray-800 dark:text-gray-100">Are you sure?</div>
                    </div>
                    <!-- Modal content -->
                    <div class="text-sm mb-10">
                        <div class="space-y-2">
                            <p>You are about to delete this course, this action cannot be undone. Do you want to proceed?</p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.deleteModal.close()">
                            Cancel
                        </button>
                        <form x-bind:action="`/settings/objectives/destroy/${$store.deleteModal.objectiveId}`" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn-sm bg-red-500 hover:bg-red-600 text-white">
                                Yes, Delete it
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

