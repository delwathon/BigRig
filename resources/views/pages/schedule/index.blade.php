@section('title', 'Training Schedule')
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">
        
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Training Schedule Management</h1>
            </div>
        
        </div>

        <!-- Page content -->
        <div class="flex flex-col space-y-10 sm:flex-row sm:space-x-6 sm:space-y-0 md:flex-col md:space-x-0 md:space-y-10 xl:flex-row xl:space-x-6 xl:space-y-0 mt-9">

            <!-- Job list -->
            <div class="w-full space-y-2">
                <x-schedule.index :objectives="$objectives" :instructors="$instructors" :students="$students" :schedules="$schedules" :batches="$batches"/>
            </div>

        </div>
        <!-- Pagination -->
        <div class="mt-6">
            {{$schedules->links()}}
        </div>
    </div>
</x-app-layout>

@include('pages.app-layout-scripts.schedule')


    