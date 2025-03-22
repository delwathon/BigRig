@section('title', 'Instructors')

<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{ transactionOpen: false }" @set-transactionopen.window="transactionOpen = true">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Instructors</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Delete button -->
                <x-actions.delete-button />

                {{-- <!-- Dropdown -->
                <x-date-select />

                <!-- Filter button -->
                <x-dropdown-filter align="right" /> --}}

                <!-- Add instructor button -->
                @if (Auth::user()->hasPermission('create_instructors'))
                    <button @click.stop="$dispatch('set-transactionopen', true)" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                        <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                        </svg>
                        <span class="max-xs:sr-only">Add Instructor</span>
                    </button>    
                @endif                        
                
            </div>

        </div>

        <!-- Table -->
        <x-instructor.instructors-table :instructors="$instructors" :count="$instructors_count" />
        
        <!-- Pagination -->
        <div class="mt-8">
            {{$instructors->links()}}
        </div>

        <!-- Add New Panel -->
        <x-instructor.add-new-panel :roles="$roles" />

    </div>
</x-app-layout>

@include('pages.app-layout-scripts.deactivate-instructor')
