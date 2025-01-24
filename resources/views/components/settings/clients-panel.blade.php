<div class="grow">

    <!-- Panel body -->
    <div class="p-6 flex space-x-4">
        <section class="w-1/2 px-6 border-r-2">
            <div class="mb-8">
                <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-4">Clients</h2>
            </div>

            <!-- Payment Details -->
            <div class="py-5 border-b">
                <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div>
                        <input type="text" class="hidden" value="client" name="type">
                        <div>
                            <div class="flex gap-2">
                                <div class="w-full">
                                    <label class="flex-col text-sm font-medium mb-1" for="client_logo">Client Logo <span class="text-red-500">*</span></label>
                                    <input id="client_logo" class="form-input w-full" type="file" name="client_logo" required />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3/4">
                                <label class="text-sm font-medium mb-1" for="client_name">Client Name <span class="text-red-500">*</span></label>
                                <input id="client_name" class="form-input w-full" type="text" placeholder="FRSC" name="client_name" required />
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

            <!-- Table -->
            <table class="table-auto w-full dark:text-gray-400">
                <!-- Table header -->
                <thead class="text-xs uppercase text-gray-400 dark:text-gray-500">
                    <tr class="flex flex-wrap md:table-row md:flex-no-wrap">
                        <th class="w-full hidden md:w-auto md:table-cell py-2">
                            <div class="font-semibold text-left">Clients</div>
                        </th>
                        <th class="w-full hidden md:w-auto md:table-cell py-2">
                            <div class="font-semibold text-left">Action</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm">
                    <!-- Row -->
                    @foreach ($clients as $client)
                        <tr class="flex flex-wrap md:table-row md:flex-no-wrap border-b border-gray-200 dark:border-gray-700/60 py-2 md:py-0">
                            <td class="w-full block md:w-auto md:table-cell py-0.5 md:py-2">
                                <div class="flex items-center">
                                    <div class="shrink-0 rounded-full mr-2 sm:mr-3">
                                        <img class="rounded-sm border-2 border-white dark:border-gray-800 box-content" src="{{ Storage::url($client->logo) }}" width="60" height="40" alt="User 01" />
                                    </div>
                                    <div class="font-medium text-gray-800 dark:text-gray-100">{{ $client->name }}</div>
                                </div>
                            </td>
                            <td class="w-full block md:w-auto md:table-cell py-0.5 md:py-2">
                                <button type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.deleteModal.open({{ $client->id }})" aria-controls="delete-modal">
                                    <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                        <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </section>

        <section class="w-1/2 px-6">
            <div class="mb-8">
                <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-4">Partners</h2>
            </div>

            <!-- Payment Details -->
            <div class="pt-5 pb-3 border-b">
                <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div>
                        <input type="text" class="hidden" value="partner" name="type">
                        <div class="flex gap-2">
                            <div class="w-full">
                                <label class="flex-col text-sm font-medium mb-1" for="client_name">Partner Name <span class="text-red-500">*</span></label>
                                <input id="client_name" class="form-input w-full" type="text" placeholder="BigRig Truck Driving School" name="client_name" required />
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <div class="mb-4">
                            <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Save</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Table -->
            <table class="table-auto w-full dark:text-gray-400">
                <!-- Table header -->
                <thead class="text-xs uppercase text-gray-400 dark:text-gray-500">
                    <tr class="flex flex-wrap md:table-row md:flex-no-wrap">
                        <th class="w-full hidden md:w-auto md:table-cell py-2">
                            <div class="font-semibold text-left">Partner Name</div>
                        </th>
                        <th class="w-full hidden md:w-auto md:table-cell py-2">
                            <div class="font-semibold text-left">Action</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm">
                    <!-- Row -->
                    @foreach ($partners as $partner)
                        <tr class="flex flex-wrap md:table-row md:flex-no-wrap border-b border-gray-200 dark:border-gray-700/60 py-2 md:py-0">
                            <td class="w-full block md:w-auto md:table-cell py-0.5 md:py-2">
                                <div class="flex items-center">
                                    <div class="font-medium text-gray-800 dark:text-gray-100">{{ $partner->name }}</div>
                                </div>
                            </td>
                            <td class="w-full block md:w-auto md:table-cell py-0.5 md:py-2">
                                <button type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.deleteModal.open({{ $partner->id }})" aria-controls="delete-modal">
                                    <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                        <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                    </svg>
                                </button>
                            </td>
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
                            <p>You are about to delete a client/partner, this action cannot be undone. Do you want to proceed?</p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.deleteModal.close()">
                            Cancel
                        </button>
                        <form x-bind:action="`/settings/client/destroy/${$store.deleteModal.clientId}`" method="POST">
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