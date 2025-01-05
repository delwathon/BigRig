<div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
    <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
        <!-- Left side -->
        <div class="flex items-start space-x-3 md:space-x-4">
            <div class="w-9 h-9 shrink-0 mt-1">
                <img class="w-9 h-9 rounded-full" src="{{ asset('images/' . $job->image) }}" width="36" height="36" alt="{{ $job->company }}" />
            </div>
            <div>
                <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('job-post') }}">{{ $job->role }}</a>
                <div class="text-sm">{{ $job->details }}</div>
            </div>
        </div>
        <!-- Right side -->
        <div class="flex items-center space-x-4 pl-10 md:pl-0">
            <div class="text-sm text-gray-500 dark:text-gray-400 italic whitespace-nowrap">{{ \Carbon\Carbon::parse($job->created_at)->format('M j') }}</div>
            <div class="text-xs inline-flex font-medium rounded-full text-center px-2.5 py-1 @if($job->type === 'Featured'){{'bg-yellow-500/20 text-yellow-700'}}@else{{'bg-green-500/20 text-green-700'}}@endif">{{ $job->type }}</div>
            <button class="@if($job->fav){{'text-yellow-500'}}@else{{'text-gray-300 dark:text-gray-600 hover:text-gray-400 dark:hover:text-gray-500'}}@endif">
                <span class="sr-only">Bookmark</span>
                <svg class="w-3 h-4 fill-current" width="12" height="16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 0C.9 0 0 .9 0 2v14l6-3 6 3V2c0-1.1-.9-2-2-2H2Z" />
                </svg>
            </button>
        </div>
    </div>
</div>