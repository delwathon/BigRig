<div class="grow">

    <!-- Panel body -->
    <div class="p-6 space-y-6">

        <!-- Plans -->
        <section>
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold">Custom Services</h2>
                <button 
                    @click="$store.createModal.open()" 
                    class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 ml-auto">
                    <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                </button>
            </div>
        </section>

        <section>
            <div class="col-span-full bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="p-3">
            
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full dark:text-gray-300">
                            <!-- Table header -->
                            <thead class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Image</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Brief Description</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Actions</div>
                                    </th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                                <!-- Row -->
                                @foreach ($services as $service)
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <div class="shrink-0 rounded-full mr-2 sm:mr-3 bg-violet-500">
                                                    <img class="rounded-sm border-2 border-white dark:border-gray-800 box-content" src="{{ Storage::url($service->service_picture) }}" width="60" height="40" alt="User 01" />
                                                </div>
                                                <div class="font-medium text-gray-800 dark:text-gray-100">{{ $service->service_name }}</div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            {{ $service->service_description }}
                                        </td>
                                        <td class="p-2">
                                            <div class="flex items-center gap-1">
                                                <!-- Edit Button -->
                                                <button type="button" @click="$store.editModal.open({ id: {{ $service->id }}, service_name: '{{ $service->service_name }}', service_description: '{{ $service->service_description }}'})" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                                    <svg class="fill-current text-gray-400 dark:text-gray-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                                        <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                                    </svg>
                                                </button>

                                                <!-- Delete Button -->
                                                <button type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.deleteModal.open({{ $service->id }})" aria-controls="delete-modal">
                                                    <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                                        <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            
                    </div>
                </div>
            </div>
        </section>
        
    </div>

</div>

<!-- Create Service Modal -->
@include('components.modals.create-service-modal')

<!-- Edit Service Modal -->
@include('components.modals.edit-service-modal')

<!-- Delete Service Modal -->
@include('components.modals.delete-service-modal')