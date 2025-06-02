<div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">All Instructors</h2>
    </header>

    <div x-data="handleSelect">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full dark:text-gray-300">
                <!-- Table header -->
                <thead class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-900/20 border-t border-b border-gray-100 dark:border-gray-700/60">
                    <tr>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                            <div class="flex items-center">
                                <label class="inline-flex">
                                    <span class="sr-only">Select all</span>
                                    <input id="parent-checkbox" class="form-checkbox" type="checkbox" @click="toggleAll" />
                                </label>
                            </div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Full Name</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Email</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Role</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Mobile Number</div>
                        </th>
                        @if (Auth::user()->hasPermission('update_website_management'))
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Website Visibility</div>
                            </th>
                        @endif
                        @if (Auth::user()->hasPermission('update_instructors') || Auth::user()->hasPermission('delete_instructors') || Auth::user()->hasPermission('update_suspend_user_account'))
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <span class="font-semibold text-left">Actions</span>
                            </th>
                        @endif
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">

                    <!-- Row -->
                    @foreach($instructors as $instructor)
                        <tr @class(['text-red-500' => !$instructor->user_active])>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="flex items-center">
                                    <label class="inline-flex">
                                        <span class="sr-only">Select</span>
                                        <input class="table-item form-checkbox" type="checkbox" @click="uncheckParent" />
                                    </label>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                        <img class="rounded-full h-10 w-10" src="{{ $instructor->profile_photo_path ? Storage::url($instructor->profile_photo_path) : Storage::url('users/avatar.png') }}" width="40" height="40" alt="{{ $instructor->firstName }} {{ $instructor->lastName }}" />
                                    </div>
                                    <div class="font-medium @class(['text-red-500' => !$instructor->user_active]) text-gray-800 dark:text-gray-100">{{ $instructor->firstName }} {{ $instructor->middleName }} {{ $instructor->lastName }}</div>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">{{ $instructor->email }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">
                                    {{ $instructor->roles->pluck('role_name')->implode(', ') ?: 'No Role' }}
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">{{ $instructor->mobileNumber }}</div>
                            </td>
                            @if (Auth::user()->hasPermission('update_website_management'))
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    {{-- <livewire:website-visibility :user="$instructor" /> --}}
                                    @livewire('website-visibility', ['user' => $instructor])
                                </td>                            
                            @endif
                            @if (Auth::user()->hasPermission('update_instructors') || Auth::user()->hasPermission('delete_instructors') || Auth::user()->hasPermission('update_suspend_user_account'))
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                    <div class="relative inline-flex" x-data="{ open: false }">
                                        <button
                                            class="rounded-full"
                                            :class="open ? 'bg-gray-100 dark:bg-gray-700/60 text-gray-500 dark:text-gray-400': 'text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400'"          
                                            aria-haspopup="true"
                                            @click.prevent="open = !open"
                                            :aria-expanded="open"
                                        >
                                            <span class="sr-only">Action</span>
                                            <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                <circle cx="16" cy="16" r="2" />
                                                <circle cx="10" cy="16" r="2" />
                                                <circle cx="22" cy="16" r="2" />
                                            </svg>
                                        </button>
                                        <div
                                            class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1"                
                                            @click.outside="open = false"
                                            @keydown.escape.window="open = false"
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-200 transform"
                                            x-transition:enter-start="opacity-0 -translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-out duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            x-cloak                
                                        >
                                            <ul>
                                                @if (Auth::user()->hasPermission('read_instructors'))
                                                    <li>
                                                        <a class="font-medium text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 flex py-1 px-3" href="javascript:void(0)" @click="open = false" @focus="open = true" @focusout="open = false">View</a>
                                                    </li>
                                                @endif
                                                @if (Auth::user()->hasPermission('update_instructors'))
                                                <li>
                                                    <a class="font-medium text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 flex py-1 px-3" href="javascript:void(0)" @click="open = false" @focus="open = true" @focusout="open = false">Edit</a>
                                                </li>
                                                @endif
                                                @if (Auth::user()->hasPermission('update_suspend_user_account'))
                                                    @php
                                                        $userVisibility = $instructor->user_active;
                                                    @endphp

                                                    <li>
                                                        <a 
                                                            class="font-medium text-sm flex py-1 px-3" 
                                                            :class="{{ $userVisibility }} ? 'text-red-500 hover:text-red-600' : 'text-green-500 hover:text-green-600'"
                                                            href="javascript:void(0)" 
                                                            @click="$store.deactivateModal.open({ id: {{ $instructor->id }}, user_active: {{ $userVisibility }} })"
                                                            aria-controls="delete-modal">
                                                            {{ $userVisibility ? 'Suspend Account' : 'Activate Account' }}
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        </tr>                    
                    @endforeach
                    
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Deactivate Instructor Account Modal -->
@include('components.modals.deactivate-user-modal')