<div class="w-full hidden xl:block xl:w-72">
    <div class="lg:sticky lg:top-16 lg:h-[calc(100dvh-64px)] lg:overflow-x-hidden lg:overflow-y-auto no-scrollbar">
        <div class="md:py-8">

            <!-- Create Post Button -->
            <div class="mb-6">
                <a href="{{ route('forum.create') }}">
                    <button class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Create Post</button>
                </a>
            </div>

            <!-- Blocks -->
            <div class="space-y-4">
                
                <!-- Block 1: Forum Meetups -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-xl">
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">Forum Meetups</div>
                    <ul>
                        @foreach ($meetups as $meetup)
                        <li class="relative pb-4 last-of-type:pb-0">
                            <div class="pl-6">
                                <div class="text-xs font-medium uppercase text-violet-600 mb-0.5">{{ \Carbon\Carbon::parse($meetup->date)->format('D d M') }}</div>
                                <div class="text-sm mb-2">
                                    <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white" href="{{ $meetup->link }}" target="_blank">{{ $meetup->title }}</a>
                                </div>
                                <!-- Avatars -->
                                <div class="flex items-center space-x-2">
                                    <div class="flex -space-x-3 -ml-0.5">
                                        @foreach ($meetup->avatars as $avatar)
                                            <img class="rounded-full border-2 border-white dark:border-gray-800 box-content" src="{{ asset('images/' . $avatar) }}" width="28" height="28" alt="User" />
                                        @endforeach
                                    </div>
                                    <div class="text-xs font-medium text-gray-400 dark:text-gray-500 italic">+{{ $meetup->participants_count }}</div>
                                </div>
                            </div>
                            <!-- Timeline element -->
                            <div aria-hidden="true">
                                <div class="absolute top-0.5 -bottom-1 left-0.5 ml-px w-0.5 bg-gray-200 dark:bg-gray-700"></div>
                                <div class="absolute top-0.5 left-0 -ml-0.5 w-3 h-3 rounded-full bg-gray-400 dark:bg-gray-500 border-2 border-white dark:border-gray-800"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        <a href="javascript:void(0)">
                            <button class="btn-sm w-full bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">View All</button>
                        </a>
                    </div>
                </div>

                <!-- Block 2: Popular Stories -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-xl">
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">Popular Stories</div>
                    <ul class="space-y-3">
                        @foreach ($popularPosts as $popularPost)
                        <li>
                            <div class="text-sm mb-1">
                                <a class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white" href="{{ route('forum.post', $popularPost->id) }}">{{ $popularPost->title }}</a>
                            </div>
                            <div class="text-xs text-gray-500">
                                <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="javascript:void(0)">
                                    {{ $popularPost->user->firstName }} {{ $popularPost->user->lastName }}
                                </a> · {{ $popularPost->created_at->diffForHumans() }} · {{ $popularPost->comments_count }} comments
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('forum.list') }}">
                            <button class="btn-sm w-full bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">View All</button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
