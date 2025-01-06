<div class="grow">

    <!-- Panel body -->
    <div class="p-6 flex space-x-4">
        <section class="grid xl:grid-cols-1 gap-6 mb-8">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Achievements So Far</h3>
                <button 
                    @click="$store.createModal.open()" aria-controls="create-modal"
                    class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 ml-auto">
                    <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                </button>
            </div>

            @foreach ($achievements as $achievement)
                <article class="flex bg-white dark:bg-gray-800 shadow-sm rounded-xl overflow-hidden">
                    <!-- Image -->
                    <a class="relative block w-24 sm:w-56 xl:sidebar-expanded:w-40 2xl:sidebar-expanded:w-56 shrink-0" href="{{ route('meetups-post') }}">
                        <img class="absolute object-cover object-center w-full h-full" src="{{ Storage::url($achievement->picture) }}" width="220" height="236" alt="{{ $achievement->title }}" />
                    </a>
                    <!-- Content -->
                    <div class="grow p-5 flex flex-col">
                        <div class="grow">
                            <div class="text-sm font-semibold text-violet-500 uppercase mb-2">{{ $achievement->year }}</div>
                            <a class="inline-flex mb-2" href="{{ route('meetups-post') }}">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100">{{ $achievement->title }}</h3>
                            </a>
                            <div class="text-sm">{{ $achievement->description }}</div>
                        </div>
                        <!-- Footer -->
                        <div class="flex justify-between items-center mt-3">
                            <!-- Tag -->
                            <div class="text-xs inline-flex items-center font-medium border border-gray-200 dark:border-gray-700/60 text-gray-600 dark:text-gray-400 rounded-full text-center px-2.5 py-1">
                                <svg class="w-4 h-3 fill-gray-400 dark:fill-gray-500 mr-2" viewBox="0 0 16 12">
                                    <path d="m16 2-4 2.4V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7.6l4 2.4V2ZM2 10V2h8v8H2Z" />
                                </svg>
                            </div>
                            <!-- Avatars -->
                            <div class="flex items-center space-x-2">
                                <!-- Edit Button -->
                                <button type="button" @click="$store.editModal.open({
                                    id: {{ $achievement->id }},
                                    title: '{{ $achievement->title }}',
                                    year: '{{ $achievement->year }}',
                                    description: '{{ $achievement->description }}',
                                })" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                    <svg class="fill-current text-gray-400 dark:text-gray-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                        <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                    </svg>
                                </button>

                                <!-- Delete Button -->
                                <button type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.deleteModal.open({{ $achievement->id }})" aria-controls="delete-modal">
                                    <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                        <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

        </section>
    </div>
</div>

<!-- Create Achievement Modal -->
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
                    <div class="font-semibold text-gray-800 dark:text-gray-100">Add New Achievement</div>
                    <button class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400" @click="$store.createModal.close()">
                        <div class="sr-only">Close</div>
                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal content -->
            <form method="POST" action="{{ route('achievement.store') }}" enctype="multipart/form-data">
            @csrf

                <div class="px-5 py-4">
                    <div class="space-y-3 mt-3">
                        <!-- Form fields -->
                        <div>
                            <label class="block text-sm font-medium mb-1" for="title">Achievement Title <span class="text-red-500">*</span></label>
                            <input id="title" class="form-input w-full px-2 py-1" type="text" name="title" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="description">Details of Achievement <span class="text-red-500">*</span></label>
                            <textarea id="description" class="form-textarea w-full px-2 py-1" rows="10" name="description" required></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="year">Achievement Year <span class="text-red-500">*</span></label>
                            <input id="year" class="form-input w-full px-2 py-1" type="text" name="year" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="picture">Picture Upload <span class="text-red-500">*</span></label>
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="picture" required />
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

<!-- Edit Achievement Modal -->
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
                    <div class="font-semibold text-gray-800 dark:text-gray-100">Edit Achievement</div>
                    <button class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400" @click="$store.editModal.close()">
                        <div class="sr-only">Close</div>
                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal content -->
            <form method="POST" action="{{ route('achievement.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="px-5 py-4">
                    <div class="space-y-3 mt-3">
                        <!-- Form fields -->
                        <input type="hidden" x-model="$store.editModal.data.id" name="id">
                        <div>
                            <label class="block text-sm font-medium mb-1" for="title">Achievement Title <span class="text-red-500">*</span></label>
                            <input id="title" class="form-input w-full px-2 py-1" type="text" name="title" x-model="$store.editModal.data.title" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="description">Details of Achievement <span class="text-red-500">*</span></label>
                            <textarea id="description" class="form-textarea w-full px-2 py-1" rows="10" name="description" x-model="$store.editModal.data.description" required></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="year">Achievement Year <span class="text-red-500">*</span></label>
                            <input id="year" class="form-input w-full px-2 py-1" type="text" name="year" x-model="$store.editModal.data.year" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="picture">Picture Upload</label>
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="picture" />
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

<!-- Delete Achievement Modal -->
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
                            <p>You are about to delete an achievement, this action cannot be undone. Do you want to proceed?</p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.deleteModal.close()">
                            Cancel
                        </button>
                        <form x-bind:action="`/settings/client/destroy/${$store.deleteModal.achievementId}`" method="POST">
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

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('createModal', {
            modalOpen: false,
            open() {
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
            },
        });

        Alpine.store('editModal', {
            modalOpen: false,
            data: {
                id: null,
                title: '',
                year: '',
                description: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    title: '',
                    year: '',
                    description: ''
                };
            },
        });

        Alpine.store('deleteModal', {
            modalOpen: false,
            achievementId: null, // Track the ID of the objective to delete
            open(id) {
                this.achievementId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.achievementId = null;
            }
        });
    });
</script>