<div class="px-2 sm:px-3 lg:px-4 py-4 flex flex-col col-span-full sm:col-span-12 xl:col-span-8 bg-white dark:bg-gray-800 shadow-sm rounded-xl" x-data="calendar" x-init="initCalendar">

    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-4">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold"><span x-text="`${monthNames[month]} ${year} Schedule`"></span></h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- Previous month button -->
            <button
                class="btn px-2.5 bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 disabled:border-gray-200 dark:disabled:border-gray-700 disabled:bg-gray-100 dark:disabled:bg-gray-800 disabled:text-gray-400 dark:disabled:text-gray-600 disabled:cursor-not-allowed"
                :disabled="month === 0 ? true : false"
                @click="month--; getDays()"
            >
                <span class="sr-only">Previous month</span><wbr />
                <svg class="fill-current text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16">
                    <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z" />
                </svg>
            </button>                                    
            
            <!-- Next month button -->
            <button
                class="btn px-2.5 bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 disabled:border-gray-200 dark:disabled:border-gray-700 disabled:bg-gray-100 dark:disabled:bg-gray-800 disabled:text-gray-400 dark:disabled:text-gray-600 disabled:cursor-not-allowed"
                :disabled="month === 11 ? true : false"
                @click="month++; getDays()"
            >
                <span class="sr-only">Next month</span><wbr />
                <svg class="fill-current text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16">
                    <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                </svg>
            </button>

            <hr class="w-px h-full bg-gray-200 dark:bg-gray-700/60 border-none mx-1" />
            
            <!-- Create event button -->
            <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Go To Schedule</button>
        
        </div>

    </div>

    <!-- Calendar table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden" x-cloak>

        <!-- Days of the week -->
        <div class="grid grid-cols-7 gap-px border-b border-gray-200 dark:border-gray-700/60">
            <template x-for="(day, index) in dayNames" :key="index">	
                <div class="px-1 py-3">
                    <div class="text-gray-500 text-sm font-medium text-center lg:hidden" x-text="day.substring(0,3)"></div>
                    <div class="text-gray-500 dark:text-gray-400 text-sm font-medium text-center hidden lg:block" x-text="day"></div>
                </div>
            </template>
        </div>

        <!-- Day cells -->
        <div class="grid grid-cols-7 gap-px bg-gray-200 dark:bg-gray-700/60">
            <!-- Diagonal stripes pattern -->
            <svg class="sr-only">
                <defs>
                    <pattern id="stripes" patternUnits="userSpaceOnUse" width="5" height="5" patternTransform="rotate(135)">
                        <line class="stroke-current text-gray-200 dark:text-gray-700 opacity-50" x1="0" y="0" x2="0" y2="5" stroke-width="2" />
                    </pattern>
                </defs>
            </svg>
            <!-- Empty cells (previous month) -->
            <template x-for="blankday in startingBlankDays">
                <div class="bg-gray-50 dark:bg-gray-800 h-20 sm:h-28 lg:h-36">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <rect width="100%" height="100%" fill="url(#stripes)" />
                    </svg>
                </div>
            </template>
            <!-- Days of the current month -->
            <template x-for="(day, dayIndex) in daysInMonth" :key="dayIndex">	
                <div class="relative bg-white dark:bg-gray-800 h-20 sm:h-28 lg:h-36 overflow-hidden">
                    <div class="h-full flex flex-col justify-between">
                        <!-- Events -->
                        <div class="grow flex flex-col relative p-0.5 sm:p-1.5 overflow-hidden">
                            <template x-for="event in getEvents(day)">	
                                <a href="{{ route('schedule') }}" class="relative w-full text-left mb-1" :title="event.eventName">
                                    <div
                                        class="px-2 py-0.5 rounded-lg overflow-hidden"
                                        :class="{
                                            'text-white bg-sky-500': event.eventColor === 'sky',
                                            'text-white bg-violet-500': event.eventColor === 'indigo',
                                            'text-white bg-yellow-500': event.eventColor === 'yellow',
                                            'text-white bg-green-500': event.eventColor === 'green',
                                            'text-white bg-red-500': event.eventColor === 'red',
                                        }"
                                    >
                                        <!-- Event name -->
                                        <div class="text-xs font-semibold truncate" x-text="event.eventName"></div>
                                        <!-- Event time -->
                                        <div class="text-xs uppercase truncate hidden sm:block">
                                            <!-- Start date -->
                                            <template x-if="event.eventStart">
                                                <span x-text="event.eventStart.toLocaleTimeString([], {hour12: true, hour: 'numeric', minute:'numeric'})"></span>
                                            </template>
                                            <!-- End date -->
                                            <template x-if="event.eventEnd">
                                                <span>
                                                    - <span x-text="event.eventEnd.toLocaleTimeString([], {hour12: true, hour: 'numeric', minute:'numeric'})"></span>
                                                </span>
                                            </template>
                                        </div> 
                                    </div>
                                </a>
                            </template>
                            <div class="absolute bottom-0 left-0 right-0 h-4 bg-gradient-to-t from-white dark:from-gray-800 to-transparent pointer-events-none" aria-hidden="true"></div>
                        </div>
                        <!-- Cell footer -->
                        <div class="flex justify-between items-center p-0.5 sm:p-1.5">
                            <!-- More button (if more than 2 events) -->
                            <template x-if="getEvents(day).length > 2">
                                <button class="text-xs text-gray-500 dark:text-gray-300 font-medium whitespace-nowrap text-center sm:py-0.5 px-0.5 sm:px-2 border border-gray-200 dark:border-gray-700/60 rounded-lg">
                                    <span class="md:hidden">+</span><span x-text="getEvents(day).length - 2"></span> <span class="hidden md:inline">more</span>
                                </button>
                            </template>
                            <!-- Day number -->
                            <button
                                class="inline-flex ml-auto w-6 h-6 items-center justify-center text-xs sm:text-sm dark:text-gray-300 font-medium text-center rounded-full hover:bg-violet-100 dark:hover:bg-gray-600"
                                :class="{'text-violet-500': isToday(day) }"	
                                x-text="day"
                            ></button>                                                
                        </div>
                    </div>
                </div>
            </template>
            <!-- Empty cells (next month) -->
            <template x-for="blankday in endingBlankDays">
                <div class="bg-gray-50 dark:bg-gray-800 h-20 sm:h-28 lg:h-36">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                        <rect width="100%" height="100%" fill="url(#stripes)" />
                    </svg>
                </div>
            </template>	                                    
        </div>
    </div>

</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('calendar', () => ({
            month: null,
            year: null,
            daysInMonth: [],
            startingBlankDays: [],
            endingBlankDays: [],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            events: [
                @foreach ($schedules as $schedule)
                {
                    eventStart: new Date({{ \Carbon\Carbon::parse($schedule->schedule_date)->format('Y') }}, {{ \Carbon\Carbon::parse($schedule->schedule_date)->format('m') }} - 1, {{ \Carbon\Carbon::parse($schedule->schedule_date)->format('d') }}, {{ \Carbon\Carbon::parse($schedule->time_start)->format('H') }}, {{ \Carbon\Carbon::parse($schedule->time_start)->format('i') }}),
                    eventEnd: new Date({{ \Carbon\Carbon::parse($schedule->schedule_date)->format('Y') }}, {{ \Carbon\Carbon::parse($schedule->schedule_date)->format('m') }} - 1, {{ \Carbon\Carbon::parse($schedule->schedule_date)->format('d') }}, {{ \Carbon\Carbon::parse($schedule->time_stop)->format('H') }}, {{ \Carbon\Carbon::parse($schedule->time_stop)->format('i') }}),
                    eventName: '{{ ($schedule->curriculum->topic) }}',
                    eventColor: 'sky'
                },                   
                @endforeach
            ],

            initCalendar() {
                const today = new Date();
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.getDays();
            },

            isToday(date) {
                const today = new Date();
                const day = new Date(this.year, this.month, date);
                return today.toDateString() === day.toDateString() ? true : false;
            },

            getEvents(date) {
                return this.events.filter(e => new Date(e.eventStart).toDateString() === new Date(this.year, this.month, date).toDateString());
            },

            getDays() {
                const daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                // starting empty cells (previous month)
                const startingDayOfWeek = new Date(this.year, this.month).getDay();
                let startingBlankDaysArray = [];
                for (let i = 1; i <= startingDayOfWeek; i++) {
                    startingBlankDaysArray.push(i);
                }

                // ending empty cells (next month)
                const endingDayOfWeek = new Date(this.year, this.month + 1, 0).getDay();
                let endingBlankDaysArray = [];
                for (let i = 1; i < 7 - endingDayOfWeek; i++) {
                    endingBlankDaysArray.push(i);
                }                    

                // current month cells
                let daysArray = [];
                for (let i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }

                this.startingBlankDays = startingBlankDaysArray;
                this.endingBlankDays = endingBlankDaysArray;
                this.daysInMonth = daysArray;
            }
        }))
    })
</script>
