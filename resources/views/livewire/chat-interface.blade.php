<div class="flex h-screen w-full">
    <div id="messages-sidebar" x-data="{ openSearch: false }"
        class="absolute z-20 top-0 bottom-0 w-full md:w-auto md:static md:top-auto md:bottom-auto -mr-px md:translate-x-0 duration-200 ease-in-out"
        :class="msgSidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        >
        <div class="sticky top-16 bg-white dark:bg-[#151D2C] overflow-x-hidden overflow-y-auto no-scrollbar shrink-0 border-r border-gray-200 dark:border-gray-700/60 md:w-[22rem] xl:w-[26rem] h-[calc(100dvh-64px)]">

            
            <div>
                
                <div class="sticky top-0 z-10">
                    <div class="flex items-center bg-white dark:bg-[#151D2C] border-b border-gray-200 dark:border-gray-700/60 px-5 h-16">
                        <div class="w-full flex items-center justify-between">
                            
                            <div class="relative" x-data="{ open: false }">
                                <button
                                    class="grow flex items-center truncate"
                                    aria-haspopup="true"
                                    @click.prevent="open = !open"
                                    :aria-expanded="open"
                                >
                                    <img class="w-8 h-8 rounded-full mr-2" src="{{ asset('images/channel-01.png') }}" width="32" height="32" alt="Group 01" />
                                    <div class="truncate">
                                        <span class="font-semibold text-gray-800 dark:text-gray-100">Chats</span>
                                    </div>
                                </button>
                            </div>
                            
                            <button @click="openSearch = !openSearch" class="p-1.5 shrink-0 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 shadow-sm ml-2">
                                <svg class="fill-current text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 2a8 8 0 105.293 14.707l4.147 4.146a1 1 0 001.414-1.414l-4.146-4.147A8 8 0 0010 2zm0 2a6 6 0 110 12A6 6 0 0110 4z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="px-5 py-4">
                    
                    <!-- Search Input Field (Fixed) -->
                    <div class="mt-3" x-cloak x-show="openSearch">
                        <input
                            type="text"
                            placeholder="Search users…"
                            class="form-input w-full pl-3 bg-white dark:bg-gray-800"
                            wire:model.lazy="searchQuery"
                            wire:input="search"
                        />
                    </div>
                    
                    <div class="mt-4">
                       <div class="flex items-center justify-between mb-3">
                            <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase">
                                Direct messages
                            </div>
                            <div wire:loading wire:target="search" class="ml-2">
                                <svg class="animate-spin h-3 w-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                </svg>
                            </div>
                        </div>
                        <ul class="mb-6">
                            @foreach ($users as $user)
                                <li :key="{{ $user['id'] }}">
                                    <button
                                        wire:click="selectUser({{ $user['id'] }})"
                                        class="flex items-center justify-between w-full p-2 rounded-lg 
                                            {{ $user['unread'] > 0 
                                                    ? 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' 
                                                    : 'bg-transparent' }} 
                                            border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800"
                                        @click="msgSidebarOpen = false; $refs.contentarea.scrollTop = 99999999;"
                                    >
                                        <div class="flex items-center truncate w-full">
                                            <img
                                                class="w-8 h-8 rounded-full mr-2"
                                                src="{{ $user['profile_photo_path'] ? Storage::url($user['profile_photo_path']) : Storage::url('users/avatar.png') }}"
                                                width="32"
                                                height="32"
                                                alt="User"
                                            />
                                            <div class="truncate w-full">
                                                <span class="block text-left text-sm font-medium text-gray-800 dark:text-gray-100">
                                                    {{ $user['firstName'] }} {{ $user['lastName'] }}
                                                </span>
                                                <div class="flex items-center justify-between mb-3">
                                                    <div class="text-xs text-gray-500 dark:text-gray-400 text-left">
                                                        {{ \Illuminate\Support\Str::limit($user['last_message_preview'] ?? '', 30) }}
                                                    </div>
                                                    <div class="text-xs text-gray-400 ml-2 whitespace-nowrap">
                                                        {{ $user['last_message_time_human'] ?? '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center ml-2">
                                            @if ($user['unread'] > 0)
                                                <div class="text-xs inline-flex font-medium bg-red-500 text-white rounded-full text-center leading-5 px-2">
                                                    {{ $user['unread'] }}
                                                </div>
                                            @endif
                                        </div>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="h-screen w-full">
        @if ($selectedUserId)
            <livewire:chat-box :receiverId="$selectedUserId" :key="$selectedUserId" />
        @else
            {{-- <p>Select a user to start chatting.</p> --}}
        @endif
    </div>

    @push('scripts')
    <script>
        window.addEventListener('scrollToBottom', () => {
            const el = document.getElementById('chat-scroll');
            el.scrollTop = el.scrollHeight;
        });
    </script>
    @endpush
</div>
