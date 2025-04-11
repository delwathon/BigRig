
<ul class="space-y-4">
    @if ($schedules->isEmpty())
        <div class="col-span-full bg-white dark:bg-gray-800 shadow-sm rounded-xl">
            <div class="flex flex-col h-full text-center p-5">
                <div class="grow mb-1">
                    <h3 class="text-lg text-gray-800 dark:text-gray-100 font-semibold mb-1">No record found.</h3>
                </div>
            </div>
        </div>
    @else
        @foreach ($schedules as $schedule)
            <li>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
                    <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
                        <!-- Left side -->
                        <div class="flex items-start space-x-3 md:space-x-4">
                            <div>
                                <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('schedule') }}">
                                    Lesson {{ $loop->index + 1 }}: {{ $schedule->topic->topic }}
                                </a>
                                <div class="text-sm"></div>
                            </div>
                        </div>
                        <!-- Right side -->
                        <div class="flex items-center space-x-4 pl-10 md:pl-0">
                            <div class="text-xs inline-flex font-medium rounded-full text-center px-2.5 py-1 bg-yellow-500/20 text-yellow-700">{{ $schedule->course->objective }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400 italic whitespace-nowrap">{{ \Carbon\Carbon::parse($schedule->schedule_date)->format('M d,') }} {{ \Carbon\Carbon::parse($schedule->time_start)->format('h:i A') }}</div>
                        </div>
                    </div>
                </div>    
            </li>
        @endforeach
    @endif
</ul>