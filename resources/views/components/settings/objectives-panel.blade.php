<div class="grow">

    <!-- Panel body -->
    <div class="p-6 space-y-6">

        <!-- Plans -->
        <section>
            <div class="mb-8">
                <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-4">Training Objectives</h2>
                <!-- <div class="text-sm">This workspace’s Basic Plan is set to <strong class="font-medium">$34</strong> per month and will renew on <strong class="font-medium">July 9, 2024</strong>.</div> -->
            </div>

            <!-- Pricing -->
            <div x-data="{ annual: true }">
                <!-- Toggle switch -->
                <div class="flex items-center space-x-3 mb-6">
                <div class="text-sm text-gray-500 font-medium">Part Payment <span class="text-red-500">(+10%)</span></div>
                    <div class="form-switch">
                        <input type="checkbox" id="toggle" class="sr-only" x-model="annual" />
                        <label class="bg-gray-400 dark:bg-gray-700" for="toggle">
                            <span class="bg-white shadow-sm" aria-hidden="true"></span>
                            <span class="sr-only">Pay annually</span>
                        </label>
                    </div>
                    <div class="text-sm text-gray-500 font-medium">Full Payment</div>
                </div>
                <!-- Pricing tabs -->
                <div class="grid grid-cols-12 gap-6">
                    <!-- Tab 1 -->
                    @foreach ($objectives as $objective)
                        <div class="relative col-span-full xl:col-span-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 shadow-sm rounded-b-lg flex flex-col justify-between">
                            <div>
                                <!-- Top Section -->
                                <div class="absolute top-0 left-0 right-0 h-0.5 bg-green-500" aria-hidden="true"></div>
                                <div class="px-5 pt-5 pb-2 border-b border-gray-200 dark:border-gray-700/60">
                                    <header class="flex items-center mb-2">
                                        <div class="w-6 h-6 rounded-full shrink-0 bg-green-500 mr-3">
                                            <svg class="w-6 h-6 fill-current text-white" viewBox="0 0 24 24">
                                                <path d="M12 17a.833.833 0 01-.833-.833 3.333 3.333 0 00-3.334-3.334.833.833 0 110-1.666 3.333 3.333 0 003.334-3.334.833.833 0 111.666 0 3.333 3.333 0 003.334 3.334.833.833 0 110 1.666 3.333 3.333 0 00-3.334 3.334c0 .46-.373.833-.833.833z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg text-gray-800 dark:text-gray-100 font-semibold">{{ $objective->objective }}</h3>
                                    </header>
                                    <div class="w-full mb-2">
                                        <img class="w-full h-40" src="{{ Storage::url($objective->image_url) }}" width="80" height="80" alt="{{ $objective->objective }}" />
                                    </div>
                                    <!-- Price -->
                                    <div class="text-gray-800 dark:text-gray-100 font-bold mb-4">
                                        <span class="text-2xl">$</span>
                                        <span class="text-3xl" 
                                            x-text="annual ? '{{ $objective->price }}' : '{{ $objective->price + ($objective->price * 0.1) }}'">
                                            {{ $objective->price }}
                                        </span>
                                        <span class="text-gray-500 font-medium text-sm"></span>
                                    </div>
                                </div>
                                <div class="px-5 pt-4">
                                    <div class="text-xs text-gray-800 dark:text-gray-100 font-semibold uppercase mb-4">{{ $objective->duration }} weeks training period</div>
                                    <!-- List -->
                                    <ul>
                                        @foreach(explode(',', $objective->requirement) as $requirement)
                                            <li class="flex items-center py-1">
                                                <svg class="w-3 h-3 shrink-0 fill-current text-green-500 mr-2" viewBox="0 0 12 12">
                                                    <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                                                </svg>
                                                <div class="text-sm">{{ trim($requirement) }}</div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Bottom Buttons -->
                            <div class="px-5 pt-4 pb-5 mt-auto">
                                <div class="flex gap-2">
                                    <button 
                                        class="btn border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300 w-1/2" 
                                        @click="$store.editModal.open({
                                            id: {{ $objective->id }},
                                            objective: '{{ $objective->objective }}',
                                            price: {{ $objective->price }},
                                            duration: {{ $objective->duration }},
                                            requirements: '{{ $objective->requirement }}'
                                        })" 
                                        aria-controls="edit-modal">
                                        Edit
                                    </button>
                                    <button class="btn border-red-200 dark:border-red-700/60 hover:border-red-300 dark:hover:border-red-600 text-red-800 dark:text-red-300 w-1/2" @click="$store.deleteModal.open({{ $objective->id }})" aria-controls="delete-modal">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>                    
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact Sales -->
        <section>
            <div class="px-5 py-3 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04] rounded-lg text-center xl:text-left xl:flex xl:flex-wrap xl:justify-between xl:items-center">
                <div class="text-gray-800 dark:text-gray-100 font-semibold mb-2 xl:mb-0">Missing on an objective?</div>
                <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white" @click="$store.createModal.open()" aria-controls="create-modal">Add New</button>
            </div>
        </section>
        
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
                    <div class="font-semibold text-gray-800 dark:text-gray-100">Add New Training Objective</div>
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
                            <label class="block text-sm font-medium mb-1" for="name">Objective Name <span class="text-red-500">*</span></label>
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
                    <div class="font-semibold text-gray-800 dark:text-gray-100">Edit Training Objective</div>
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
                            <label class="block text-sm font-medium mb-1" for="name">Objective Name <span class="text-red-500">*</span></label>
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
                            <p>You are about to delete a tratining objective, this action cannot be undone. Do you want to proceed?</p>
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
                objective: '',
                price: '',
                duration: '',
                requirements: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    objective: '',
                    price: '',
                    duration: '',
                    requirements: ''
                };
            },
        });

        Alpine.store('deleteModal', {
            modalOpen: false,
            objectiveId: null, // Track the ID of the objective to delete
            open(id) {
                this.objectiveId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.objectiveId = null;
            }
        });
    });
</script>