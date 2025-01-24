<div class="grow">

    <!-- Panel body -->
    <div class="p-6 space-y-6">
        <section>
            <div class="mb-8">
                <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-4">Sliders</h2>
            </div>

            <ul>
                @foreach ($sliders as $slider)
                    <li class="sm:flex items-center py-6 border-b border-gray-200 dark:border-gray-700/60">
                        <a class="block mb-4 sm:mb-0 mr-5 md:w-32 xl:w-auto shrink-0" href="javascript:void(0)">
                            <img class="rounded-sm h-40" src="{{ Storage::url($slider->image_url) }}" width="200" height="142" alt="{{ $slider->title }}" />
                        </a>
                        <div class="grow">
                            <a href="javascript:void(0)">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-1">{{$slider->title }}</h3>
                            </a>
                            <div class="text-sm mb-4">{{ $slider->text }}</div>
                            <div class="text-sm text-yellow-500 mb-2">Button: <a href="{{ url($slider->button_url) }}" title="{{ $slider->button_url }}">{{ $slider->button_name }}</a></div>
                            <!-- Product meta -->
                            <div class="flex flex-wrap justify-between items-center">
                                <!-- Rating and price -->
                                <div class="flex flex-wrap items-center space-x-2 mr-2">
                                </div>
                                <button class="text-sm text-red-500 underline hover:no-underline" @click="$store.deleteModal.open({{ $slider->id }})" aria-controls="delete-modal">Remove</button>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
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
                            <p>You are about to delete a slider, this action cannot be undone. Do you want to proceed?</p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.deleteModal.close()">
                            Cancel
                        </button>
                        <form x-bind:action="`/settings/sliders/destroy/${$store.deleteModal.sliderId}`" method="POST">
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