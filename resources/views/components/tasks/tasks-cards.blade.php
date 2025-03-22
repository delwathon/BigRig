<!-- Column 1 -->
<div class="col-span-full sm:col-span-6 xl:col-span-3">

    <!-- Column header -->
    <header>
        <div class="flex items-center justify-between mb-2">
            <h2 class="grow font-semibold text-gray-800 dark:text-gray-100 truncate">To Do’s</h2>
            <button class="shrink-0 text-violet-500 hover:text-violet-600 dark:hover:text-violet-400 ml-2">
                <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
            </button>
        </div>

        <!-- Cards -->
        <div class="grid gap-2">

            <!-- Card 1 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100 mb-1">Managing teams (book)</h2>
                    <!-- Content -->
                    <div>
                        <div class="text-sm">#7764 created by <a class="font-medium text-gray-800 hover:underline" href="javascript:void(0)">markus-james</a></div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <div class="flex shrink-0 -space-x-3 -ml-px">
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-07.jpg') }}"" width="28" height="28" alt="User 07" />
                        </a>
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-11.jpg') }}"" width="28" height="28" alt="User 11" />
                        </a>
                    </div>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- Like button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">4</div>
                        </button>
                        <!-- Replies button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">7</div>
                        </button>
                        <!-- Attach button -->
                        <button class="text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0zM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100 mb-1">User should receive a daily digest email</h2>
                    <!-- Content -->
                    <div>
                        <div class="text-sm">Dedicated form for a category of users that will perform actions.</div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <button class="p-2 shrink-0 rounded-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-violet-500 transition">
                        <span class="sr-only">Add</span>
                        <svg class="w-3 h-3 fill-current" viewBox="0 0 12 12">
                            <path d="M11 5H7V1a1 1 0 00-2 0v4H1a1 1 0 000 2h4v4a1 1 0 002 0V7h4a1 1 0 000-2z" />
                        </svg>
                    </button>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- Date -->
                        <div class="flex items-center text-yellow-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                                <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                            </svg>
                            <div class="text-sm text-yellow-600">Mar 27</div>
                        </div>
                        <!-- Replies button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">6</div>
                        </button>
                        <!-- Attach button -->
                        <button class="text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0zM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100 mb-1">Change license and remove references to products</h2>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <div class="flex shrink-0 -space-x-3 -ml-px">
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-03.jpg') }}"" width="28" height="28" alt="User 03" />
                        </a>
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-10.jpg') }}"" width="28" height="28" alt="User 10" />
                        </a>
                    </div>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- Replies button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">4</div>
                        </button>
                        <!-- Attach button -->
                        <button class="text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0zM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </header>
</div>

<!-- Column 2 -->
<div class="col-span-full sm:col-span-6 xl:col-span-3">

    <!-- Column header -->
    <header>
        <div class="flex items-center justify-between mb-2">
            <h2 class="grow font-semibold text-gray-800 dark:text-gray-100 truncate">In Progress</h2>
            <button class="shrink-0 text-violet-500 hover:text-violet-600 dark:hover:text-violet-400 ml-2">
                <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
            </button>
        </div>

        <!-- Cards -->
        <div class="grid gap-2">

            <!-- Card 1 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100 mb-1">Managing teams (book)</h2>
                </div>
                <!-- Meta -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <div class="flex shrink-0 -space-x-3 -ml-px">
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-06.jpg') }}"" width="28" height="28" alt="User 06" />
                        </a>
                    </div>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- To-do info -->
                        <div class="flex items-center text-gray-400 dark:text-gray-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M6.974 14c-.3 0-.7-.2-.9-.5l-2.2-3.7-2.1 2.8c-.3.4-1 .5-1.4.2-.4-.3-.5-1-.2-1.4l3-4c.2-.3.5-.4.9-.4.3 0 .6.2.8.5l2 3.3 3.3-8.1c0-.4.4-.7.8-.7s.8.2.9.6l4 8c.2.5 0 1.1-.4 1.3-.5.2-1.1 0-1.3-.4l-3-6-3.2 7.9c-.2.4-.6.6-1 .6z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">1/3</div>
                        </div>
                        <!-- Attach button -->
                        <button class="text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0zM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- List -->
                <ul class="mt-3">
                    <li class="flex items-center border-t border-gray-100 dark:border-gray-700/60 py-2">
                        <svg class="w-3 h-3 shrink-0 fill-current text-green-500 mr-2" viewBox="0 0 12 12">
                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                        </svg>
                        <div class="text-sm text-gray-400 dark:text-gray-500 line-through">Implement new designs</div>
                    </li>
                    <li class="flex items-center border-t border-gray-100 dark:border-gray-700/60 py-2">
                        <svg class="w-3 h-3 shrink-0 fill-current text-gray-400 dark:text-gray-500 mr-2" viewBox="0 0 12 12">
                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                        </svg>
                        <div class="text-sm">Usability testing</div>
                    </li>
                    <li class="flex items-center border-t border-gray-100 dark:border-gray-700/60 py-2">
                        <svg class="w-3 h-3 shrink-0 fill-current text-gray-400 dark:text-gray-500 mr-2" viewBox="0 0 12 12">
                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                        </svg>
                        <div class="text-sm">Design navigation changes</div>
                    </li>
                </ul>
            </div>

            <!-- Card 2 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100 mb-1">Product Update - Q4 2024</h2>
                    <!-- Content -->
                    <div>
                        <div class="text-sm">Dedicated form for a category of users that will perform actions.</div>
                        <img class="w-full mt-3" src="{{ asset('images/task-image-01.jpg') }}"" width="259" height="142" alt="Task 01" />
                    </div>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <div class="flex shrink-0 -space-x-3 -ml-px">
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-05.jpg') }}"" width="28" height="28" alt="User 05" />
                        </a>
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-02.jpg') }}"" width="28" height="28" alt="User 02" />
                        </a>
                    </div>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- Date -->
                        <div class="flex items-center text-yellow-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                                <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                            </svg>
                            <div class="text-sm text-yellow-600">Mar 27</div>
                        </div>
                        <!-- Attach button -->
                        <button class="text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0zM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </header>
</div>

<!-- Column 3 -->
<div class="col-span-full sm:col-span-6 xl:col-span-3">

    <!-- Column header -->
    <header>
        <div class="flex items-center justify-between mb-2">
            <h2 class="grow font-semibold text-gray-800 dark:text-gray-100 truncate">Completed</h2>
            <button class="shrink-0 text-violet-500 hover:text-violet-600 dark:hover:text-violet-400 ml-2">
                <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
            </button>
        </div>

        <!-- Cards -->
        <div class="grid gap-2">

            <!-- Card 1 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100 mb-1">Design new diagrams</h2>
                    <!-- Content -->
                    <div>
                        <div class="text-sm">#7896 created by <a class="font-medium text-gray-800 hover:underline" href="javascript:void(0)">jerzy-wierzy</a></div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <div class="flex shrink-0 -space-x-3 -ml-px">
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-12.jpg') }}"" width="28" height="28" alt="User 12" />
                        </a>
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-02.jpg') }}"" width="28" height="28" alt="User 02" />
                        </a>
                    </div>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- Like button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">4</div>
                        </button>
                        <!-- Replies button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">7</div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100 mb-1">Manage internal feedback</h2>
                </div>
                <!-- Meta -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <div class="flex shrink-0 -space-x-3 -ml-px">
                        <a class="block" href="javascript:void(0)">
                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-08.jpg') }}"" width="28" height="28" alt="User 08" />
                        </a>
                    </div>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- To-do info -->
                        <div class="flex items-center text-gray-400 dark:text-gray-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M6.974 14c-.3 0-.7-.2-.9-.5l-2.2-3.7-2.1 2.8c-.3.4-1 .5-1.4.2-.4-.3-.5-1-.2-1.4l3-4c.2-.3.5-.4.9-.4.3 0 .6.2.8.5l2 3.3 3.3-8.1c0-.4.4-.7.8-.7s.8.2.9.6l4 8c.2.5 0 1.1-.4 1.3-.5.2-1.1 0-1.3-.4l-3-6-3.2 7.9c-.2.4-.6.6-1 .6z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">2/2</div>
                        </div>
                        <!-- Attach button -->
                        <button class="text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0zM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- List -->
                <ul class="mt-3">
                    <li class="flex items-center border-t border-gray-100 dark:border-gray-700/60 py-2">
                        <svg class="w-3 h-3 shrink-0 fill-current text-green-500 mr-2" viewBox="0 0 12 12">
                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                        </svg>
                        <div class="text-sm text-gray-400 dark:text-gray-500 line-through">Call with incoming clients</div>
                    </li>
                    <li class="flex items-center border-t border-gray-100 dark:border-gray-700/60 py-2">
                        <svg class="w-3 h-3 shrink-0 fill-current text-green-500 mr-2" viewBox="0 0 12 12">
                            <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                        </svg>
                        <div class="text-sm text-gray-400 dark:text-gray-500 line-through">Manage inbound deals</div>
                    </li>
                </ul>
            </div>

        </div>
    </header>
</div>

<!-- Column 4 -->
<div class="col-span-full sm:col-span-6 xl:col-span-3">

    <!-- Column header -->
    <header>
        <div class="flex items-center justify-between mb-2">
            <h2 class="grow font-semibold text-gray-800 dark:text-gray-100 truncate">Notes</h2>
            <button class="shrink-0 text-violet-500 hover:text-violet-600 dark:hover:text-violet-400 ml-2">
                <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
            </button>
        </div>

        <!-- Cards -->
        <div class="grid gap-2">

            <!-- Card 1 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <div class="flex items-center mb-2">
                        <div class="flex shrink-0 -space-x-3 -ml-px mr-2">
                            <a class="block" href="javascript:void(0)">
                                <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-12.jpg') }}"" width="28" height="28" alt="User 12" />
                            </a>
                        </div>
                        <div class="grow">
                            <a class="inline-flex text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white" href="javascript:void(0)">
                                <h2 class="font-semibold text-gray-800 dark:text-gray-100">Adrian Przetocki</h2>
                            </a>
                            <div class="text-xs font-medium text-gray-500">11:51 AM Jan 12</div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div>
                        <div class="text-sm">Publishing industries for previewing layouts and visual <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="javascript:void(0)">#family</a> 🔥</div>
                        <img class="w-full mt-3" src="{{ asset('images/task-image-02.jpg') }}"" width="259" height="142" alt="Task 02" />
                    </div>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <div></div>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- Like button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">4</div>
                        </button>
                        <!-- Replies button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">16</div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <!-- Body -->
                <div class="mb-3">
                    <!-- Title -->
                    <div class="flex items-center mb-2">
                        <div class="flex shrink-0 -space-x-3 -ml-px mr-2">
                            <a class="block" href="javascript:void(0)">
                                <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/user-28-12.jpg') }}"" width="28" height="28" alt="User 12" />
                            </a>
                        </div>
                        <div class="grow">
                            <a class="inline-flex text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white" href="javascript:void(0)">
                                <h2 class="font-semibold text-gray-800 dark:text-gray-100">Adrian Przetocki</h2>
                            </a>
                            <div class="text-xs font-medium text-gray-500">11:51 AM Jan 12</div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div>
                        <div class="text-sm">Dedicated form for a category of users that will perform actions? <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="javascript:void(0)">#viewall</a></div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="flex items-center justify-between">
                    <!-- Left side -->
                    <div></div>
                    <!-- Right side -->
                    <div class="flex items-center">
                        <!-- Like button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M14.682 2.318A4.485 4.485 0 0011.5 1 4.377 4.377 0 008 2.707 4.383 4.383 0 004.5 1a4.5 4.5 0 00-3.182 7.682L8 15l6.682-6.318a4.5 4.5 0 000-6.364zm-1.4 4.933L8 12.247l-5.285-5A2.5 2.5 0 014.5 3c1.437 0 2.312.681 3.5 2.625C9.187 3.681 10.062 3 11.5 3a2.5 2.5 0 011.785 4.251h-.003z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">6</div>
                        </button>
                        <!-- Replies button -->
                        <button class="flex items-center text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                            </svg>
                            <div class="text-sm text-gray-500 dark:text-gray-400">7</div>
                        </button>
                        <!-- Attach button -->
                        <button class="text-gray-400 dark:text-gray-500 hover:text-violet-500  dark:hover:text-violet-500 ml-3">
                            <svg class="shrink-0 fill-current mr-1.5" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M11 0c1.3 0 2.6.5 3.5 1.5 1 .9 1.5 2.2 1.5 3.5 0 1.3-.5 2.6-1.4 3.5l-1.2 1.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l1.1-1.2c.6-.5.9-1.3.9-2.1s-.3-1.6-.9-2.2C12 1.7 10 1.7 8.9 2.8L7.7 4c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4l1.2-1.1C8.4.5 9.7 0 11 0zM8.3 12c.4-.4 1-.5 1.4-.1.4.4.4 1 0 1.4l-1.2 1.2C7.6 15.5 6.3 16 5 16c-1.3 0-2.6-.5-3.5-1.5C.5 13.6 0 12.3 0 11c0-1.3.5-2.6 1.5-3.5l1.1-1.2c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4L2.9 8.9c-.6.5-.9 1.3-.9 2.1s.3 1.6.9 2.2c1.1 1.1 3.1 1.1 4.2 0L8.3 12zm1.1-6.8c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-4.2 4.2c-.2.2-.5.3-.7.3-.2 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l4.2-4.2z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </header>
</div>