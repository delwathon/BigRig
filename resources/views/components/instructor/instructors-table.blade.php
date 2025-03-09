<div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <header class="px-5 py-4">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">All Instructors <span class="text-gray-400 dark:text-gray-500 font-medium">{{ $count }}</span></h2>
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
                        {{-- <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Last order</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Total spent</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold">Refunds</div>
                        </th> --}}
                        @if (Auth::user()->hasPermission('update_instructors') || Auth::user()->hasPermission('delete_instructors'))
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
                        <tr @class(['text-red-500' => $instructor->user_visibility === 0])>
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
                                        <img class="rounded-full h-10 w-10" src="{{ Storage::url($instructor->profile_photo_path) }}" width="40" height="40" alt="{{ $instructor->firstName }} {{ $instructor->lastName }}" />
                                    </div>
                                    <div class="font-medium @class(['text-red-500' => $instructor->user_visibility === 0]) text-gray-800 dark:text-gray-100">{{ $instructor->firstName }} {{ $instructor->middleName }} {{ $instructor->lastName }}</div>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">{{ $instructor->email }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">{{ $instructor->role->role_name ?? 'No Role' }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-center">{{ $instructor->mobileNumber }}</div>
                            </td>
                            {{-- <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left font-medium text-sky-600">{{ $instructor->last_order }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left font-medium text-green-600">{{ $instructor->spent }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-center">@if($instructor->refunds > 0){{ $instructor->refunds }}@else{{ '-' }}@endif</div>
                            </td> --}}
                            @if (Auth::user()->hasPermission('update_instructors') || Auth::user()->hasPermission('delete_instructors'))
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
                                                <li>
                                                    <a class="font-medium text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 flex py-1 px-3" href="{{ route('users') }}" @click="open = false" @focus="open = true" @focusout="open = false">View</a>
                                                </li>
                                                <li>
                                                    <a class="font-medium text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-200 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Edit</a>
                                                </li>
                                                @php
                                                    $userVisibility = $instructor->user_visibility;
                                                @endphp

                                                <li>
                                                    <a 
                                                        class="font-medium text-sm flex py-1 px-3" 
                                                        :class="{{ $userVisibility }} === 1 ? 'text-red-500 hover:text-red-600' : 'text-green-500 hover:text-green-600'"
                                                        href="javascript:void(0)" 
                                                        @click="$store.deactivateModal.open({ id: {{ $instructor->id }}, user_visibility: {{ $userVisibility }} })"
                                                        aria-controls="delete-modal">
                                                        {{ $userVisibility === 1 ? 'Deactivate Account' : 'Activate Account' }}
                                                    </a>
                                                </li>
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
<div class="m-1.5" x-data>
    <!-- Modal backdrop -->
    <div
        class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
        x-show="$store.deactivateModal.modalOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        aria-hidden="true"
        x-cloak
    ></div>

    <!-- Modal dialog -->
    <div
        id="delete-modal"
        class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
        role="dialog"
        aria-modal="true"
        x-show="$store.deactivateModal.modalOpen"
        x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        x-cloak
    >
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="$store.deactivateModal.close()" @keydown.escape.window="$store.deactivateModal.close()">
            <div class="p-5 flex space-x-4">
                <!-- Icon -->
                <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-gray-100 dark:bg-gray-700">
                    <svg class="shrink-0 fill-current text-red-500" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z" />
                    </svg>
                </div>
                <!-- Content -->
                <div>
                    <!-- Modal header -->
                    <div class="mb-2">
                        <div class="text-lg font-semibold text-gray-800 dark:text-gray-100">Are you sure?</div>
                    </div>
                    <!-- Modal content -->
                    <div class="text-sm mb-10">
                        <div class="space-y-2">
                            <p x-text="$store.deactivateModal.data.user_visibility === 1 ? 'You are about to deactivate this user account. Do you want to proceed?' : 'You are about to activate this user account. Do you want to proceed?'"></p>
                        </div>                        
                    </div>
                    <!-- Modal footer -->
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="$store.deactivateModal.close()">
                            Cancel
                        </button>
                        <form x-bind:action="`/instructor/deactivate/${$store.deactivateModal.data.id}`" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn-sm bg-red-500 hover:bg-red-600 text-white">
                                Yes! Proceed
                            </button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // A basic demo function to handle "select all" functionality
    document.addEventListener('alpine:init', () => {
        Alpine.data('handleSelect', () => ({
            selectall: false,
            selectAction() {
                countEl = document.querySelector('.table-items-action');
                if (!countEl) return;
                checkboxes = document.querySelectorAll('input.table-item:checked');
                document.querySelector('.table-items-count').innerHTML = checkboxes.length;
                if (checkboxes.length > 0) {
                    countEl.classList.remove('hidden');
                } else {
                    countEl.classList.add('hidden');
                }
            },
            toggleAll() {
                this.selectall = !this.selectall;
                checkboxes = document.querySelectorAll('input.table-item');
                [...checkboxes].map((el) => {
                    el.checked = this.selectall;
                });
                this.selectAction();
            },
            uncheckParent() {
                this.selectall = false;
                document.getElementById('parent-checkbox').checked = false;
                this.selectAction();
            }
        }))
    })    
</script>