@section('title', 'Permissions')

<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Permissions</h1>
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
                    <table class="table-auto w-full dark:text-gray-300">
                        <!-- Table header -->
                        <thead class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-900/20 border-t border-b border-gray-100 dark:border-gray-700/60">
                            <tr>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-left">Permission</div>
                                </th>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-center">Create</div>
                                </th>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-center">Read</div>
                                </th>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-center">Update</div>
                                </th>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-center">Delete</div>
                                </th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="text-left">{{ ucwords($permission['name']) }}</div>
                                    </td>
                                    @foreach (['create', 'read', 'update', 'delete'] as $action)
                                        <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                            @php
                                                $actionPermission = collect($permission['actions'])->firstWhere('action', $action);
                                            @endphp
                                            @if ($actionPermission)
                                                <div class="flex items-center">
                                                    <label class="inline-flex">
                                                        <span class="sr-only">Select</span>
                                                        <input
                                                            class="table-item form-checkbox"
                                                            type="checkbox"
                                                            value="{{ $actionPermission['id'] . '_' . $action }}"
                                                            name="permissions[]"
                                                            {{ $actionPermission['checked'] ? 'checked' : '' }}
                                                        />
                                                    </label>
                                                </div>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                    {{-- @livewire('manage-role-permissions', ['roleId' => $roleId]) --}}
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
