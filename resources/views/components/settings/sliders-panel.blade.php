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

<!-- Delete Slider Modal -->
@include('components.modals.delete-slider-modal')