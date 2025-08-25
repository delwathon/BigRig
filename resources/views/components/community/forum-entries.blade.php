@forelse ($posts as $post)
<!-- Post 1 -->
<article class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5">
    <div class="flex flex-start space-x-4">
        <!-- Avatar -->
        <div class="shrink-0 mt-1.5">
            <img class="w-8 h-8 rounded-full" src="{{ asset('images/user-avatar-32.png') }}" width="32" height="32" alt="User avatar" />
        </div>
        <!-- Content -->
        <div class="grow">
            <!-- Title -->
            <h2 class="font-semibold text-gray-800 dark:text-gray-100 mb-2">
                <a href="{{ route('forum.post', $post->id) }}">{{ $post->title }}</a>
            </h2>
            <!-- Footer -->
            <footer class="flex flex-wrap text-sm">
                <div class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-gray-400 dark:after:text-gray-600 after:px-2">
                    <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="javascript:void(0)">
                        <div class="flex items-center">
                            <svg class="mr-2 fill-current" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.686 5.708 10.291.313c-.4-.4-.999-.4-1.399 0s-.4 1 0 1.399l.6.6-6.794 3.696-1-1C1.299 4.61.7 4.61.3 5.009c-.4.4-.4 1 0 1.4l1.498 1.498 2.398 2.398L.6 14.001 2 15.4l3.696-3.697L9.692 15.7c.5.5 1.199.2 1.398 0 .4-.4.4-1 0-1.4l-.999-.998 3.697-6.695.6.6c.599.6 1.199.2 1.398 0 .3-.4.3-1.1-.1-1.499Zm-7.193 6.095L4.196 7.507l6.695-3.697 1.298 1.299-3.696 6.694Z" />
                            </svg>
                            {{ $post->user->firstName }} {{ $post->user->lastName }}
                        </div>
                    </a>
                </div>
                <div class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-gray-400 dark:after:text-gray-600 after:px-2">
                    <span class="text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <div class="flex items-center after:block after:content-['·'] last:after:content-[''] after:text-sm after:text-gray-400 dark:after:text-gray-600 after:px-2">
                    <span class="text-gray-500">💬 {{ $post->comments()->count() }} Comments</span>
                </div>
            </footer>
        </div>
        <!-- Upvote button -->
        <div class="shrink-0">
            <button class="text-xs font-semibold text-center h-12 w-12 border border-violet-500/60 rounded-lg flex flex-col justify-center items-center shadow-violet-500/20">
                <svg class="inline-flex fill-violet-500 mt-1.5 mb-1.5" width="12" height="6" xmlns="http://www.w3.org/2000/svg">
                    <path d="m0 6 6-6 6 6z" />
                </svg>
                <div>{{ $post->votes_count }}</div>
            </button>
        </div>
    </div>
</article>
@empty
    <div class="text-center text-gray-500 dark:text-gray-400 py-10">
        No forum posts yet. Be the first to post!
    </div>
@endforelse
