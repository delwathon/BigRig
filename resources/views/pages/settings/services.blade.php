@section('title', 'Settings')

<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">

            <!-- Title -->
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Website Management</h1>

        </div>

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl mb-8">
            <div class="flex flex-col md:flex-row md:-mr-px">

                <!-- Sidebar -->
                <x-settings.settings-sidebar />

        
                <x-settings.services-panel :services="$services" />

            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{$services->links()}}
        </div>

    </div>
</x-app-layout>

@include('pages.app-layout-scripts.services')