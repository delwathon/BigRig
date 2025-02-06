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
            <div class="sm:w-full md:w-full lg:w-1/2 xl:w-1/2 space-y-2">
                <x-course.courses :objectives="$objectives"/>
            </div>

            <div class="sm:w-full md:w-full lg:w-1/2 xl:w-1/2">

                <!-- Jobs header -->
                <div class="flex justify-between items-center mb-4">
                    <div class="text-sm text-gray-500 dark:text-gray-400 italic">This Week Schedule</div>
                </div>

                <div class="w-full space-y-2">
                    <x-course.schedules :schedules="$schedules" />
                </div>

            </div>

        </div>

    </div>
</x-app-layout>
<script>

    document.addEventListener('alpine:init', () => {
        Alpine.store('createModal', {
            modalOpen: false,
            open() {
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
            },
        });

        Alpine.store('editModal', {
            modalOpen: false,
            data: {
                id: null,
                objective: '',
                price: '',
                duration: '',
                requirements: ''
            },
            open(data) {
                this.data = { ...data };
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.data = {
                    id: null,
                    objective: '',
                    price: '',
                    duration: '',
                    requirements: ''
                };
            },
        });

        Alpine.store('deleteModal', {
            modalOpen: false,
            objectiveId: null, // Track the ID of the objective to delete
            open(id) {
                this.objectiveId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.objectiveId = null;
            }
        });
    });
</script>