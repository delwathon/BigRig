<!-- Card 1 -->
@if ($subscribers->isEmpty())
    <div class="col-span-full bg-white dark:bg-gray-800 shadow-sm rounded-xl">
        <div class="flex flex-col h-full text-center p-5">
            <div class="grow mb-1">
                <h3 class="text-lg text-gray-800 dark:text-gray-100 font-semibold mb-1">No record found.</h3>
            </div>
        </div>
    </div>
@else
    @foreach ($subscribers as $subscriber)
    
        <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
            <div class="flex flex-col h-full text-left p-5">
                <div class="grow mb-1">
                    <h3 class="text-lg text-gray-800 dark:text-gray-100 font-semibold mb-1">{{ $subscriber->email }}</h3>
                </div>
                {{-- <div>
                    <button type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.deleteModal.open({{ $subscriber->id }})" aria-controls="delete-modal">
                        <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                        </svg>
                    </button>
                </div> --}}
            </div>
        </div>
    @endforeach
@endif