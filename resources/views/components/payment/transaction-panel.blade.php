<!-- Transaction Panel -->
<div
    class="absolute inset-0 sm:left-auto z-20 shadow-xl duration-200 ease-in-out"
    :class="transactionOpen ? 'translate-x-0' : 'translate-x-full'"
    @click.outside="transactionOpen = false"
    @keydown.escape.window="transactionOpen = false"
    x-cloak
>
    <div class="sticky top-16 bg-gradient-to-b from-gray-100 to-white dark:from-[#151D2C] dark:to-gray-900 overflow-x-hidden overflow-y-auto no-scrollbar shrink-0 border-l border-gray-200 dark:border-gray-700/60 w-full sm:w-[390px] h-[calc(100dvh-64px)]">

        <button class="absolute top-0 right-0 mt-6 mr-6 group p-2" @click="transactionOpen = false">
            <svg class="fill-gray-400 group-hover:fill-gray-600" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="m7.95 6.536 4.242-4.243a1 1 0 1 1 1.415 1.414L9.364 7.95l4.243 4.242a1 1 0 1 1-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 0 1-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 0 1 1.414-1.414L7.95 6.536Z" />
            </svg>
        </button>

        <div class="py-8 px-4 lg:px-8">
            <div class="max-w-sm mx-auto lg:max-w-none">

                <div class="text-gray-800 dark:text-gray-100 font-semibold text-center mb-1"><span x-text="transaction.payment_method"></span></div>
                <div class="text-sm text-center italic">
                    <span x-text="new Intl.DateTimeFormat('en-GB', { 
                        day: '2-digit', month: '2-digit', year: 'numeric', 
                        hour: '2-digit', minute: '2-digit', hour12: true 
                    }).format(new Date(transaction.updated_at))">
                    </span>
                </div>                

                <!-- Details -->
                <div class="drop-shadow-md mt-12">
                    <!-- Top -->
                    <div class="bg-white dark:bg-gray-800 rounded-t-xl px-5 pb-2.5 text-center">
                        <div class="mb-3 text-center">
                            <img class="inline-flex w-12 h-12 rounded-full -mt-6" src="{{ asset('images/transactions-image-02.svg') }}" width="48" height="48" alt="Transaction 04" />
                        </div>
                        <div class="text-2xl font-semibold text-green-500 mb-1">
                            +$<span x-text="Number(transaction.total_amount).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })"></span>
                        </div>                        
                        <div class="text-sm font-medium text-gray-800 dark:text-gray-100 mb-3"><span x-text="transaction.user.firstName"></span> <span x-text="transaction.user.lastName"></span></div>
                        <div class="text-xs inline-flex font-medium bg-gray-400/20 text-gray-500 dark:text-gray-400 rounded-full text-center px-2.5 py-1"><span x-text="transaction.payment_status"></span></div>
                    </div>
                    <!-- Divider -->
                    <div class="flex justify-between items-center" aria-hidden="true">
                        <svg class="fill-white dark:fill-gray-800" width="20" height="20"xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 20c5.523 0 10-4.477 10-10S5.523 0 0 0h20v20H0Z" />
                        </svg>
                        <div class="grow w-full h-5 bg-white dark:bg-gray-800 flex flex-col justify-center">
                            <div class="h-px w-full border-t border-dashed border-gray-200 dark:border-gray-700"></div>
                        </div>
                        <svg class="fill-white dark:fill-gray-800 rotate-180" width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 20c5.523 0 10-4.477 10-10S5.523 0 0 0h20v20H0Z" />
                        </svg>
                    </div>
                    <!-- Bottom -->
                    <div class="bg-white dark:bg-gray-800 rounded-b-xl p-5 pt-2.5 text-sm space-y-3">
                        <div class="flex justify-between space-x-1">
                            <span class="italic">Ref:</span>
                            <span class="font-medium text-gray-700 dark:text-gray-100 text-right" x-text="transaction.payment_reference"></span>
                        </div>
                        <div class="flex justify-between space-x-1">
                            <span class="italic">Amount:</span>
                            <span class="font-medium text-gray-700 dark:text-gray-100 text-right">₦<span x-text="Number(transaction.subtotal).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })"></span>
                        </div>
                        <div class="flex justify-between space-x-1">
                            <span class="italic">Tax:</span>
                            <span class="font-medium text-gray-700 dark:text-gray-100 text-right">₦<span x-text="Number(transaction.tax).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })"></span>
                        </div>
                        <div class="flex justify-between space-x-1">
                            <span class="italic">Total:</span>
                            <span class="font-medium text-gray-700 dark:text-gray-100 text-right">₦<span x-text="Number(transaction.total_amount).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })"></span>
                        </div>
                    </div>
                </div>

                <!-- Receipts -->
                {{-- <div class="mt-6">
                    <div class="text-sm font-semibold text-gray-800 dark:text-gray-100 mb-2">Receipts</div>
                    <form class="rounded bg-gray-100 dark:bg-gray-700/30 border border-dashed border-gray-300 dark:border-gray-700/60 text-center px-5 py-8">
                        <svg class="inline-flex fill-gray-400 dark:fill-gray-500 mb-3" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4c-.3 0-.5.1-.7.3L1.6 10 3 11.4l4-4V16h2V7.4l4 4 1.4-1.4-5.7-5.7C8.5 4.1 8.3 4 8 4ZM1 2h14V0H1v2Z" />
                        </svg>
                        <label for="upload" class="block text-sm text-gray-500 dark:text-gray-400 italic">We accept PNG, JPEG, and PDF files.</label>
                        <input class="sr-only" id="upload" type="file" />
                    </form>
                </div> --}}

                <!-- Notes -->
                <div class="mt-6">
                    <div class="text-sm font-semibold text-gray-800 dark:text-gray-100 mb-2">Being Payment For</div>
                    {{-- <form> --}}
                        <label class="sr-only" for="notes"></label>
                        <textarea 
                            id="notes" 
                            class="form-textarea w-full focus:border-gray-300" 
                            rows="4" 
                            x-model="transaction.objectives.map(obj => obj.objective).join(',\n')" 
                            readonly
                        ></textarea>
                    {{-- </form> --}}
                </div>

                <!-- Download / Report -->
                <div class="flex items-center space-x-3 mt-6">
                    <div class="w-full">
                        <button class="btn w-full border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">
                            <svg class="fill-current text-gray-400 dark:text-gray-500 shrink-0 rotate-180" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 4c-.3 0-.5.1-.7.3L1.6 10 3 11.4l4-4V16h2V7.4l4 4 1.4-1.4-5.7-5.7C8.5 4.1 8.3 4 8 4ZM1 2h14V0H1v2Z" />
                            </svg>
                            <span class="ml-2">Download Receipt</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>