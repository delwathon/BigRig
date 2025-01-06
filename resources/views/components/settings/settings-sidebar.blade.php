<div class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-3 py-6 border-b md:border-b-0 md:border-r border-gray-200 dark:border-gray-700/60 min-w-60 md:space-y-3">
    <!-- Group 1 -->
    <div>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-3">Business settings</div>
        <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('site_settings')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('site_settings') }}">
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('site_settings')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">Site Information</span>
                </a>
            </li>
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('sliders')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('sliders') }}">
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('sliders')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">Homepage Sliders</span>
                </a>
            </li>
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('founder')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('founder') }}">
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">Welcome Message</span>
                </a>
            </li>
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('about-company')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('about-company') }}">
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('about-company')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">About The Company</span>
                </a>
            </li>
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('achievements')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('achievements') }}">
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('achievements')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">Achievements</span>
                </a>
            </li>
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('custom-services')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('custom-services') }}">
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('custom-services')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">Custom Services</span>
                </a>
            </li>
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('clients')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('clients') }}">
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('clients')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">Clients &amp; Partners</span>
                </a>
            </li>
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('faqs')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('faqs') }}">
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('faqs')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">Frequently Asked Questions</span>
                </a>
            </li>
            <li class="mr-0.5 md:mr-0 md:mb-0.5">
                <a class="flex items-center px-2.5 py-2 rounded-lg whitespace-nowrap @if(Route::is('objectives')){{ 'bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }}@endif" href="{{ route('objectives') }}">                
                    <svg class="shrink-0 fill-current mr-2 @if(Route::is('founder')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-400 dark:text-gray-500' }}@endif" width="16" height="16" viewBox="0 0 16 16">
                        <path d="m9 12.614 4.806 1.374a.15.15 0 0 0 .174-.21L8.133 2.082a.15.15 0 0 0-.268 0L2.02 13.777a.149.149 0 0 0 .174.21L7 12.614V9a1 1 0 1 1 2 0v3.614Zm-1 1.794-5.257 1.503c-1.798.514-3.35-1.355-2.513-3.028L6.076 1.188c.791-1.584 3.052-1.584 3.845 0l5.848 11.695c.836 1.672-.714 3.54-2.512 3.028L8 14.408Z" />
                    </svg>
                    <span class="text-sm font-medium @if(Route::is('objectives')){{ 'text-violet-500 dark:text-violet-400' }}@else{{ 'text-gray-600 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200' }}@endif">Subscription Plans</span>
                </a>
            </li>
        </ul>
    </div>
</div>