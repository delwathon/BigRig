@section('title', 'User Roles')

<x-app-layout>
    <!-- Profile background -->
    <div class="h-56 bg-gray-200 dark:bg-gray-900">
        <img class="object-cover h-full w-full" src="{{ asset('images/company-bg.jpg') }}" width="2560" height="440" alt="Company background" />
    </div>

    <!-- Header -->
    <header class="text-center bg-white/30 dark:bg-gray-800/30 pb-6 border-b border-gray-200 dark:border-gray-700/60">
        <div class="px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-3xl mx-auto">
        
                <!-- Avatar -->
                <div class="-mt-12 mb-2">
                    <div class="inline-flex -ml-1 -mt-1 sm:mb-0">
                        <img class="rounded-full border-4 border-white dark:border-gray-900 bg-black" src="{{ Storage::url($settings->dark_theme_logo) }}" width="104" height="104" alt="Avatar" />
                    </div>
                </div>

                <!-- Company name and info -->
                <div class="mb-4">
                    <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-2">{{ $settings->site_name }}</h2>
                    {{-- <p>We're building a financial superapp that combines all the best tools into one place 🚀</p> --}}
                </div>
                <!-- Meta -->
                <div class="inline-flex flex-wrap justify-center sm:justify-start space-x-4">
                    <div class="flex items-center">
                        <svg class="fill-current shrink-0 text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0ZM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12Zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2Z" />
                        </svg>

                        <span class="text-sm font-medium whitespace-nowrap text-gray-500 dark:text-gray-400 ml-2 mr-2">User Roles &amp; Permissions Management</span>    
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- Page content -->
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full" x-data="{ addNew: false }">            
        <div class="max-w-3xl mx-auto">

            <!-- Job list -->
            <div class="space-y-6">

                <!-- Group 1 -->
                <div>
                    <div class="inline-flex flex-wrap justify-center sm:justify-start space-x-4">
                        <div class="flex items-center">
                            <h4 class="text-gray-800 dark:text-gray-100 font-medium mb-4 mr-4">All User Role</h4>
                            @if (Auth::user()->hasPermission('create_roles_and_permissions'))
                                <!-- Right side -->
                                <div class="flex items-center space-x-4 pl-10 md:pl-0 -mt-4">
                                    <button @click="addNew = !addNew"  type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.createModal.open()" aria-controls="create-modal">
                                        <span class="sr-only">Create Role</span>
                                        <svg class="fill-current text-purple-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-2">

                        <!-- Add New Role -->
                        <template x-if="addNew">
                            <form method="POST" action="{{ route('user-roles.store') }}">
                            @csrf
                                <li class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-700/60">
                                    <div class="sm:w-4/5">
                                        <div>
                                            <div class="sm:w-full">
                                                <label class="block text-sm font-medium mb-1" for="role_name"></label>
                                                <input id="role_name" class="form-input sm:w-full mb-1" type="text" placeholder="Role name" name="role_name" required/>
                                            </div>
                                            <div class="sm:w-full">
                                                <label class="block text-sm font-medium mb-1" for="role_description"></label>
                                                <textarea id="role_description" class="form-textarea sm:w-full focus:border-gray-300" rows="2" placeholder="Role description" name="role_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:w-1/5 flex items-center ml-4 justify-center gap-1">
                                        <!-- Add Button -->
                                        <button type="submit" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                            <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z" />
                                            </svg>
                                        </button>

                                        <!-- Cancel Button -->
                                        <button type="button" @click="addNew = false" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                            <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M6.586 8L.293 1.707 1.707.293 8 6.586 14.293.293l1.414 1.414L9.414 8l6.293 6.293-1.414 1.414L8 9.414l-6.293 6.293-1.414-1.414z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </li>
                            </form>
                        </template>

                        <!-- Roles -->
                        @foreach ($roles as $role)
                            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
                                <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
                                    <!-- Left side -->
                                    <div class="flex items-start space-x-3 md:space-x-4">
                                        <div class="w-9 h-9 shrink-0 mt-1">
                                            <img class="w-9 h-9 rounded-full" src="{{ asset('images/company-icon-01.svg') }}" width="36" height="36" alt="Company 01" />
                                        </div>
                                        <div>
                                            <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('user-permissions', ['roleId' => $role->id]) }}">{{ $role->role_name }}</a>
                                            <div class="text-sm">{{ $role->role_description }}</div>
                                        </div>
                                    </div>
                                    @if (Auth::user()->hasPermission('delete_roles_and_permissions'))
                                        <!-- Right side -->
                                        <div class="flex items-center space-x-4 pl-10 md:pl-0">
                                            <button type="button" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.deleteModal.open({{ $role->id }})" aria-controls="delete-modal">
                                                <span class="sr-only">Delete Role</span>
                                                <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                                    <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                                </svg>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Delete Role Modal -->
    @include('components.modals.delete-user-role-modal')
</x-app-layout>

{{-- Delete User Role Script --}}
@include('pages.app-layout-scripts.delete-user-role')