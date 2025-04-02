@section('title', 'Testimonials')
<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <!-- Content -->
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-4 md:mb-2">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Testimonials</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Delete button -->
                <div class="table-items-action hidden">
                    <div class="flex items-center">
                        <div class="hidden xl:block text-sm italic mr-2 whitespace-nowrap"><span class="table-items-count"></span> items selected</div>
                        <button class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-red-500">Delete</button>
                    </div>
                </div>

                <!-- Search form -->
                <x-search-form />

                <!-- Export button -->
                <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white"  @click="$store.createModal.open()" aria-controls="create-modal">New Testimony</button>                            
                
            </div>

        </div>

        <!-- Table -->
        <x-testimonials.testimonials-table :testimonials="$testimonials" />
        
        <!-- Pagination -->
        <div class="mt-8">
            {{$testimonials->links()}}
        </div>

    </div>
</x-app-layout>

@include('pages.app-layout-scripts.testimonials')
