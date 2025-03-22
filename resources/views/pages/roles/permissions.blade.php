@section('title', 'Permissions')

<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">{{ $roleName }} Permissions</h1>
                @if (Auth::user()->hasPermission('update_role_course_permission'))
                <a href="javascript:void(0)" @click="$store.editModal.open()" class="text-md md:text-sm text-violet-500 dark:text-violet-200 font-bold">
                    Click here to update the courses users with this role can take.
                </a>
                @endif
            </div>
            
            <!-- Right: Actions -->
            @if (Auth::user()->hasPermission('create_roles_and_permissions'))
            <form method="POST" action="{{ route('permission.store') }}">
                @csrf
                <div class="flex items-center">

                    <!-- Permission Name button -->
                    <div class="pr-5">
                        <input id="permission_name" class="form-input w-full" type="text" value="" placeholder="Permission Name" name="permission_name"/>
                    </div>

                    <!-- Create -->
                    <div class="pr-5">
                        <input class="table-item form-checkbox mr-1" type="checkbox" name="create" /> Create
                    </div>

                    <!-- Read button -->
                    <div class="pr-5">
                        <input class="table-item form-checkbox mr-1" type="checkbox" name="read" /> Read
                    </div>

                    <!-- Update button -->
                    <div class="pr-5">
                        <input class="table-item form-checkbox mr-1" type="checkbox" name="update" /> Update
                    </div>

                    <!-- Delete button -->
                    <div class="pr-5">
                        <input class="table-item form-checkbox mr-1" type="checkbox" name="delete" /> Delete
                    </div>

                    <!-- Add customer button -->
                    <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                        <span class="max-xs:sr-only">Submit</span>
                    </button>   
                </div>               
            </form>
            @endif
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl">
            <header class="px-5 py-4">
                <h2 class="font-semibold text-gray-800 dark:text-gray-100"><span class="text-gray-400 dark:text-gray-500 font-medium">{{ $roleName }}</span></h2>
            </header>
        
            <div>
        
                <!-- Table -->
                <div class="overflow-x-auto">
                    @livewire('manage-role-permissions', ['roleId' => $roleId])
                </div>
            </div>
        </div>


        <!-- Edit Role Course Modal -->
        @include('components.modals.manage-role-course-modal')

    </div>
</x-app-layout>

@include('pages.app-layout-scripts.permissions')