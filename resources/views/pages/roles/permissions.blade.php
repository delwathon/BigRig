@section('title', 'Permissions')

<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">{{ $roleName }} Permissions</h1>
                <a href="javascript:void(0)" @click="$store.editModal.open()" class="text-md md:text-sm text-violet-500 dark:text-violet-200 font-bold">
                    Click here to update the courses users with this role can take.
                </a>
            </div>

            <!-- Right: Actions -->
            <form method="POST" action="{{ route('permission.store') }}">
                @csrf
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Permission Name button -->
                    <input id="permission_name" class="form-input w-full" type="text" value="" placeholder="Permission Name" name="permission_name"/>

                    <!-- Create -->
                    <input class="table-item form-checkbox" type="checkbox" name="create" /> Create

                    <!-- Read button -->
                    <input class="table-item form-checkbox" type="checkbox" name="read" /> Read

                    <!-- Update button -->
                    <input class="table-item form-checkbox" type="checkbox" name="update" /> Update

                    <!-- Delete button -->
                    <input class="table-item form-checkbox" type="checkbox" name="delete" /> Delete

                    <!-- Add customer button -->
                    <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                        <span class="max-xs:sr-only">Submit</span>
                    </button>   
                </div>               
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl">
            <header class="px-5 py-4">
                <h2 class="font-semibold text-gray-800 dark:text-gray-100"><span class="text-gray-400 dark:text-gray-500 font-medium">{{ $roleName }}</span></h2>
            </header>
        
            <div>
        
                <!-- Table -->
                <div class="overflow-x-auto">
                    @livewire('manage-role-permissions', ['roleId' => $roleId])
                </div>
            </div>
        </div>


        <!-- Edit Role Course Modal -->
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
                @click.stop> <!-- Prevent clicks inside the modal from closing it -->
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

    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach event listener to all checkboxes
        document.querySelectorAll('.table-item').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                const roleId = {{ $roleId }}; // Pass the role ID dynamically
                const [permissionId, action] = this.value.split('_');
                const checked = this.checked;

                // Prepare the body data
                const requestBody = {
                    role_id: roleId,
                    permission_id: permissionId,
                    action: action,
                    checked: checked,
                };

                // Log the request body to the console
                console.log('Request Body:', requestBody);

                // AJAX request
                fetch('{{ route('update-role-permission') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify(requestBody),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Trigger success notification
                            document.getElementById('success-notification').__x.$data.open = true;
                            document.getElementById('success-notification').__x.$data.message = 'Permission updated successfully!';
                        } else {
                            // Trigger error notification
                            document.getElementById('error-notification').__x.$data.open = true;
                            document.getElementById('error-notification').__x.$data.message = 'Failed to update permission.';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

<script>

    document.addEventListener('alpine:init', () => {
        Alpine.store('editModal', {
            modalOpen: false,
            open(data) {
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
            },
        });
    });
</script>
