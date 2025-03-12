<div class="grow">

    <!-- Panel body -->
    <div class="p-6 flex space-x-4">
        <section class="w-1/2 px-6 border-r-2">
            <div class="mb-8">
                <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-4">Enrolment Batch</h2>
            </div>

            <!-- Payment Details -->
            <div class="py-5">
                <form action="{{ route('enrolment-batch.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <div class="w-full">
                                <label class="text-sm font-medium mb-1" for="Batch Name">Batch Name<span class="text-red-500">*</span></label>
                                <input id="batch_name" class="form-input w-full" type="text" placeholder="2025 Batch A" name="batch_name" required />
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <div class="w-3/4">
                                <label class="text-sm font-medium mb-1" for="Commence Date">Commence Date<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input class="datepicker form-input pl-9 dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium w-full" name="commencement_date" placeholder="Select date" data-class="flatpickr-right" />
                                    <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
                                        <svg class="fill-current text-gray-400 dark:text-gray-500 ml-3" width="16" height="16" viewBox="0 0 16 16">
                                        <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                                        <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/4 text-right">
                                <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white mt-6">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>                    
                </form>
            </div>
        </section>
        <section class="w-1/2 px-6 border-r-2">
            <!-- Table -->
            <table class="table-auto w-full dark:text-gray-400">
                <!-- Table header -->
                <thead class="text-xs uppercase text-gray-400 dark:text-gray-500">
                    <tr class="flex flex-wrap md:table-row md:flex-no-wrap">
                        <th class="w-full hidden md:w-auto md:table-cell py-2">
                            <div class="font-semibold text-left">Batch Name</div>
                        </th>
                        <th class="w-full hidden md:w-auto md:table-cell py-2">
                            <div class="font-semibold text-left">Commencement Date</div>
                        </th>
                        <th class="w-full hidden md:w-auto md:table-cell py-2">
                            <div class="font-semibold text-left">Action</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm">
                    <!-- Row -->
                    @foreach ($batches as $enrolment_batch)
                        <tr class="flex flex-wrap md:table-row md:flex-no-wrap border-b border-gray-200 dark:border-gray-700/60 py-2 md:py-0">
                            <td class="w-full block md:w-auto md:table-cell py-0.5 md:py-2">
                                <div class="flex items-center">
                                    <div class="font-medium" :class="{{ $enrolment_batch->active_batch }} === 1 ? 'text-green-500' : 'text-gray-800 dark:text-gray-100'">{{ $enrolment_batch->batch_name }}</div>
                                </div>
                            </td>
                            <td class="w-full block md:w-auto md:table-cell py-0.5 md:py-2">
                                <div class="flex items-center">
                                    <div class="font-medium text-gray-800 dark:text-gray-100">{{ \Carbon\Carbon::parse($enrolment_batch->c_date)->format('D, M d, Y') }}</div>
                                </div>
                            </td>
                            @if ($enrolment_batch->active_batch === 0)
                                <td class="w-full block md:w-auto md:table-cell py-0.5 md:py-2">
                                    <button type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.updateActiveBatchModal.open({ id: {{ $enrolment_batch->id }}, active_batch: {{ $enrolment_batch->active_batch }} })" aria-controls="delete-modal">
                                        <svg class="fill-current text-green-500" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z" />
                                        </svg>
                                    </button>
                                    @if (\Carbon\Carbon::now()->toDateString() < \Carbon\Carbon::parse($enrolment_batch->c_date)->toDateString())
                                        <button type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.deleteModal.open({{ $enrolment_batch->id }})" aria-controls="delete-modal">
                                            <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                            </svg>
                                        </button>
                                    @endif
                                </td>
                            @endif                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </section>
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
                            <p>You are about to delete an enrolment batch, this action cannot be undone. Do you want to proceed?</p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.deleteModal.close()">
                            Cancel
                        </button>
                        <form x-bind:action="`/settings/enrolment_batch/destroy/${$store.deleteModal.batchId}`" method="POST">
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


<!-- Update Active Batch Modal -->
<div class="m-1.5" x-data>
    <!-- Modal backdrop -->
    <div
        class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
        x-show="$store.updateActiveBatchModal.modalOpen"
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
        x-show="$store.updateActiveBatchModal.modalOpen"
        x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        x-cloak
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="$store.updateActiveBatchModal.close()" @keydown.escape.window="$store.updateActiveBatchModal.close()">
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
                            <p x-text="$store.updateActiveBatchModal.data.active_batch === 1 ? 'You are about to set this session to inactive. Do you want to proceed?' : 'You are about to set this session to active. Do you want to proceed?'"></p>
                        </div>                        
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.updateActiveBatchModal.close()">
                            Cancel
                        </button>
                        <form x-bind:action="`/settings/enrolment_batch/set-active-batch/${$store.updateActiveBatchModal.data.id}`" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn-sm bg-red-500 hover:bg-red-600 text-white">
                                Yes! Proceed
                            </button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>