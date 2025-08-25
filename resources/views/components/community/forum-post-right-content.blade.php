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
                
                <!-- Block 1: About the Author -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-xl">
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-4">About the Author</div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 shrink-0 mr-3">
                            <img class="rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($post->user->firstName . ' ' . $post->user->lastName) }}&background=4F46E5&color=fff" width="40" height="40" alt="{{ $post->user->firstName }}" />
                        </div>
                        <div>
                            <div class="font-semibold text-gray-800 dark:text-gray-100">{{ $post->user->firstName }} {{ $post->user->lastName }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 italic">Member of BigRig Intl 🚛</div>
                        </div>
                    </div>
                    <ul class="text-sm space-y-2">
                        <li>🤟 <span class="font-medium">0</span> Karma</li>
                        <li>🔥 <span class="font-medium">{{ $post->user->forumPosts()->count() }}</span> Posts</li>
                        <li>✍️ <span class="font-medium">{{ $post->user->forumComments()->count() }}</span> Comments</li>
                    </ul>
                    <div class="mt-4">
                        <button class="btn-sm w-full bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">Follow</button>
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
                                </a> · {{ $popularPost->created_at->diffForHumans() }} · {{ $popularPost->comments()->count() }} comments
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
