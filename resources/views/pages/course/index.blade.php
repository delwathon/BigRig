@section('title', 'Course Management')
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">
        
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Course Management</h1>
            </div>
        
            <!-- Post a job button -->
            <!-- <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Post A Job</button> -->
        
        </div>

        <!-- Page content -->
        <div class="flex flex-col space-y-10 sm:flex-row sm:space-x-6 sm:space-y-0 md:flex-col md:space-x-0 md:space-y-10 xl:flex-row xl:space-x-6 xl:space-y-0 mt-9">

            <!-- Job list -->
            <div class="w-1/2 space-y-2">
                <x-course.courses :objectives="$objectives"/>
            </div>

            <div class="w-1/2">

                <!-- Jobs header -->
                <div class="flex justify-between items-center mb-4">
                    <div class="text-sm text-gray-500 dark:text-gray-400 italic">Upcoming Lessons</div>
                </div>

                <div class="w-full space-y-2">
                    <x-course.lessons />
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{$jobs->links()}}
                </div>

            </div>

        </div>

    </div>
</x-app-layout>
