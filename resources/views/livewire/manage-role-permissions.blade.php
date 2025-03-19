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