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
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.stop> <!-- Prevent clicks inside the modal from closing it -->
            <!-- Modal header -->
            <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700/60">
                <div class="flex justify-between items-center">
                    <div class="font-semibold text-gray-800 dark:text-gray-100">Role Course</div>
                    <button class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400" @click="$store.editModal.close()">
                        <div class="sr-only">Close</div>
                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal content -->
            @livewire('manage-role-courses', ['roleId' => $roleId])

        </div>
    </div>
</div>