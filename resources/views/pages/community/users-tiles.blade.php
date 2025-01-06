@section('title', 'Users')
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Users</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Search form -->
                <x-search-form />

                <!-- Add member button -->
                <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Add User</span>
                </button>                            
                
            </div>

        </div>

        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">
            
            <!-- Users cards -->
            @foreach($users as $user)
                <x-community.users-tiles-cards :user="$user" />
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{$users->links()}}
        </div>

    </div>



<!-- Make Admin Modal -->
<div class="m-1.5" x-data>
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
        class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
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
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="$store.editModal.close()" @keydown.escape.window="$store.editModal.close()">
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
                        <div class="text-lg font-semibold text-gray-800 dark:text-gray-100">Confirmation</div>
                    </div>
                    <!-- Modal content -->
                    <div class="text-sm mb-10">
                        <div class="space-y-2">
                            <p>You are about to about to make <span x-text="$store.editModal.data.name"></span> an Admin. Do you want to proceed?</p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.editModal.close()">
                            No
                        </button>
                        <form x-bind:action="{{ route('make.admin') }}" method="POST">
                            @csrf
                            <input type="hidden" x-model="$store.editModal.data.id">
                            <button type="submit" class="btn-sm bg-red-500 hover:bg-red-600 text-white">
                                Yes
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
        Alpine.store('editModal', {
            modalOpen: false,
            data: {
                id: null,
                name: '',
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    name: '',
                };
            },
        });
    })
</script>
</x-app-layout>
