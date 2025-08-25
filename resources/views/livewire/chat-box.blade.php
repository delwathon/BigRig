<div 
    class="flex flex-col h-screen md:translate-x-0 duration-300 ease-in-out"
    :class="msgSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'"
    wire:ignore.self
    id="chat-scroll"
>
    <div class="sticky top-16 bg-white dark:bg-[#151D2C] overflow-x-hidden overflow-y-auto no-scrollbar shrink-0 border-r border-gray-200 dark:border-gray-700/60 h-[calc(100dvh-64px)]">
    <!-- Header -->
        <div class="flex-none sticky top-0 z-10">
            <div class="flex items-center justify-start before:absolute before:inset-0 before:backdrop-blur-md before:bg-gray-50/90 dark:before:bg-[#151D2C]/90 before:-z-10 border-b border-gray-200 dark:border-gray-700/60 px-4 sm:px-6 md:px-5 h-16">
                <div class="flex items-center">
                    <button
                        class="md:hidden text-gray-400 hover:text-gray-500 mr-4"
                        @click.stop="msgSidebarOpen = !msgSidebarOpen"
                        aria-controls="messages-sidebar"
                        :aria-expanded="msgSidebarOpen"
                    >
                        <span class="sr-only">Close sidebar</span>
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                        </svg>
                    </button>

                    <div class="flex -space-x-3 -ml-px">
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full w-8 h-8 border-2 border-white dark:border-gray-800 box-content" src="{{ Auth::user()->profile_photo_path ? Storage::url(Auth::user()->profile_photo_path) : Storage::url('users/avatar.png') }}" alt="User 01" />
                        </a>
                        <a class="block" href="javascript:void(0)">
                            <img
                                class="rounded-full w-8 h-8 border-2 border-white dark:border-gray-800 box-content"
                                src="{{ $receiver && $receiver->profile_photo_path
                                    ? Storage::url($receiver->profile_photo_path)
                                    : Storage::url('users/avatar.png') }}"
                                alt="{{ $receiver->firstName ?? 'User' }}"
                            />
                        </a>
                    </div>
                </div>

                <div class="flex text-left pl-2">
                    <a class="block" href="javascript:void(0)">{{ $receiver->firstName}} {{ $receiver->lastName}}</a>
                </div>

                <!-- <div class="flex">
                    <button class="p-1.5 shrink-0 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 shadow-sm ml-2">
                        <svg class="fill-current text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z" />
                        </svg>
                    </button>
                    <button class="p-1.5 shrink-0 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 shadow-sm ml-2">
                        <svg class="fill-current text-violet-500" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z" />
                        </svg>
                    </button>
                </div> -->
            </div>
        </div>

        <!-- Scrollable Message Area -->
        <div class="flex-1 h-screen overflow-y-auto px-4 sm:px-6 md:px-5 py-6 bg-white dark:bg-gray-900">
            @foreach ($messages as $date => $msgs)
                <div class="text-center text-xs text-gray-500 font-medium mb-6">
                    {{ $date }}
                </div>

                @foreach ($msgs as $msg)
                    @if ($msg['sender_id'] === Auth::id())
                        <div class="flex items-start mb-4 last:mb-0 justify-end">
                            <div>
                                <div class="text-xs bg-violet-500 text-white p-3 rounded-lg rounded-tr-none border border-transparent mb-1">
                                    {{ $msg['body'] }}
                                </div>
                                <div class="text-xs text-gray-500 font-medium text-right">{{ \Carbon\Carbon::parse($msg['created_at'])->format('H:i') }}</div>
                            </div>                    
                            <img
                                class="rounded-full w-8 h-8 ml-4"
                                src="{{ $msg['sender_profile'] }}"
                                alt="{{ $msg['sender_name'] }}"
                            />
                        </div>
                    @else
                        <div class="flex items-start mb-4 last:mb-0">                                           
                            <img
                                class="rounded-full w-8 h-8 mr-4"
                                src="{{ $msg['sender_profile'] }}"
                                alt="{{ $msg['sender_name'] }}"
                            />
                            <div>
                                <div class="text-xs bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100 p-3 rounded-lg rounded-tl-none mb-1 }}">
                                    {{ $msg['body'] }}
                                </div>
                                <div class="text-xs text-gray-500 font-medium">{{ \Carbon\Carbon::parse($msg['created_at'])->format('H:i') }}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

        <!-- Footer -->
        <div class="flex-none sticky bottom-0 z-10">
            <div class="flex items-center justify-between bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700/60 px-4 sm:px-6 md:px-5 h-16">
                <button class="shrink-0 text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 mr-3">
                    <span class="sr-only">Add</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12C23.98 5.38 18.62.02 12 0zm6 13h-5v5h-2v-5H6v-2h5V6h2v5h5v2z" />
                    </svg>
                </button>

                <form wire:submit.prevent="sendMessage" class="grow flex">
                    <div class="grow mr-3">
                        <label for="message-input" class="sr-only">Type a message</label>
                        <input id="message-input" wire:model.defer="body" class="form-input w-full bg-gray-100 dark:bg-gray-800 border-transparent dark:border-transparent focus:bg-white dark:focus:bg-gray-800 placeholder-gray-500" placeholder="Type a message..." />
                    </div>
                    <button type="submit" class="hidden btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white whitespace-nowrap">Send →</button>
                </form>
            </div>
        </div>
    </div>
</div>
