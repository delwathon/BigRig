@section('title', $objective->objective)
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full">

        <!-- Page content -->
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row lg:space-x-2 xl:space-x-4">

            <!-- Content -->
            <div>
                <div class="mb-6">
                    <a class="btn-sm px-3 bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" href="{{ route('course-management') }}">
                        <svg class="fill-current text-gray-400 dark:text-gray-500 mr-2" width="7" height="12" viewBox="0 0 7 12">
                            <path d="M5.4.6 6.8 2l-4 4 4 4-1.4 1.4L0 6z" />
                        </svg>
                        <span>Back To Cousres</span>
                    </a>
                </div>

                <div class="grid grid-cols-12 gap-4">
                    <div class="flex flex-col col-span-full sm:col-span-4 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                        <div class="px-5 py-3">
                            <header class="flex justify-between items-start mb-2">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Course Name</h2>
                            </header>
                            <div class="flex items-start">
                                <div class="text-2xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $objective->objective }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col col-span-full sm:col-span-4 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                        <div class="px-5 py-3">
                            <header class="flex justify-between items-start mb-2">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Course Duration</h2>
                            </header>
                            <div class="flex items-start">
                                <div class="text-2xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $objective->duration }} weeks</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col col-span-full sm:col-span-4 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                        <div class="px-5 py-3">
                            <header class="flex justify-between items-start mb-2">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Course Price</h2>
                            </header>
                            <div class="flex items-start">
                                <div class="text-2xl font-bold text-gray-800 dark:text-gray-100 mr-2">${{ $objective->price }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col col-span-full sm:col-span-full xl:col-span-full bg-white dark:bg-gray-800 shadow-sm rounded-lg">
                        <div class="px-5 py-3">
                            <header class="flex justify-between items-start mb-2">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Course Requirement(s)</h2>
                            </header>
                            <div class="items-start">
                                <p class="pb-4">The following are required to participate in the {{ strtolower($objective->objective) }} course</p>
                                <ul>
                                    @foreach(explode(',', $objective->requirement) as $requirement)
                                        <li class="flex items-center pl-4">
                                            <svg class="w-3 h-3 shrink-0 fill-current text-green-500 mr-2" viewBox="0 0 12 12">
                                                <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                                            </svg>
                                            <div class="text-sm">{{ ucfirst(trim($requirement)) }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company information (mobile) -->
                <div class="bg-white dark:bg-gray-800 p-5 shadow-lg rounded-xl mb-6 lg:hidden">
                    <div class="text-center mb-6">
                        <div class="inline-flex mb-3">
                            <img class="w-full h-32" src="{{ Storage::url($objective->image_url) }}" width="64" height="64" alt="{{ $objective->objective }}" />
                        </div>
                        <div class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-1">Revolut Ltd</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400 italic">179 Jobs Posted</div>
                    </div>
                    <div class="space-y-2 sm:flex sm:space-y-0 sm:space-x-2">
                        <button class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Apply Today -&gt;</button>
                        <button class="btn w-full border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">Company Profile</button>
                    </div>
                </div>

                <hr class="my-6 border-t border-gray-100 dark:border-gray-700/60" />

                <!-- About You -->
                <div>
                    <header class="pb-2 flex items-center">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Course Details</h2>
                        @if (Auth::user()->hasPermission('update_course_management'))
                        <div class="relative ml-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click="modalOpen = true" aria-controls="feedback-modal">
                            <button class="block" aria-haspopup="true" :aria-expanded="open" @focus="open = true" @focusout="open = false" @click.prevent>
                                <svg class="fill-current text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16">
                                    <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                </svg>
                            </button>
                            <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                <div class="bg-white dark:bg-gray-800 dark:text-gray-100 border border-gray-200 dark:border-gray-700/60 px-3 py-2 rounded-lg shadow-lg overflow-hidden mb-2" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
                                    <div class="text-xs text-center whitespace-nowrap">Update course details</div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </header>
                    <div class="space-y-6">
                        <p>The Professional Truck Driving Training Program is designed to equip students with the knowledge, skills, and hands-on experience needed to excel as professional truck drivers. This course provides in-depth training on truck operation, safety procedures, road regulations, and job preparation, ensuring students are prepared for a successful career in the trucking industry.</p>
                    </div>
                </div>

                <hr class="my-6 border-t border-gray-100 dark:border-gray-700/60" />

                <!-- About You -->
                <div>
                    <header class="pb-2 flex items-center">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Learning Objectives</h2>
                        @if (Auth::user()->hasPermission('update_course_management'))
                        <div class="relative ml-2" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" @click="modalOpen = true" aria-controls="feedback-modal">
                            <button class="block" aria-haspopup="true" :aria-expanded="open" @focus="open = true" @focusout="open = false" @click.prevent>
                                <svg class="fill-current text-gray-400 dark:text-gray-500" width="16" height="16" viewBox="0 0 16 16">
                                    <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                </svg>
                            </button>
                            <div class="z-10 absolute bottom-full left-1/2 -translate-x-1/2">
                                <div class="bg-white dark:bg-gray-800 dark:text-gray-100 border border-gray-200 dark:border-gray-700/60 px-3 py-2 rounded-lg shadow-lg overflow-hidden mb-2" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
                                    <div class="text-xs text-center whitespace-nowrap">Update learning objectives</div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </header>
                    <div class="space-y-6">
                        <ul>
                            <li>Understand the fundamentals of truck operations and mechanics.</li>
                            <li>Gain comprehensive knowledge of road safety and traffic regulations.</li>
                            <li>Master defensive driving techniques and accident prevention.</li>
                            <li>Acquire skills in cargo handling, securing, and load balancing.</li>
                            <li>Learn essential maintenance and inspection practices for trucks.</li>
                            <li>Prepare for the Commercial Driver’s License (CDL) exam.</li>
                        </ul>
                    </div>
                </div>

                <hr class="my-6 border-t border-gray-100 dark:border-gray-700/60" />

                <!-- Things You Might Do -->
                <div>
                    <h2 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-2">Course Materials</h2>
                    <div class="space-y-6">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- Card 1 -->
                            <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white dark:bg-gray-800 shadow-sm rounded-xl dark:border-transparent overflow-hidden">
                                <!-- Image -->
                                <img class="absolute w-full h-full object-cover" src="{{ asset('images/applications-image-17.jpg') }}" width="286" height="160" alt="Application 17" />
                                <!-- Popular label -->
                                <div class="absolute top-0 right-0 mt-4 mr-4">
                                    <div class="inline-flex items-center text-xs font-medium text-white bg-gray-900 rounded-full text-center px-2 py-0.5">
                                        <svg class="w-5 h-5 fill-current text-yellow-500" viewBox="0 0 32 32">
                                            <path d="M16 20c.3 0 .5-.1.7-.3l5.7-5.7-1.4-1.4-4 4V8h-2v8.6l-4-4L9.6 14l5.7 5.7c.2.2.4.3.7.3zM9 22h14v2H9z" />
                                        </svg>
                                        <span>Download</span>
                                    </div>
                                </div>
                                <!-- Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                <!-- Content -->
                                <div class="relative h-full p-5 flex flex-col justify-end">
                                    <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Vehicle Inspection</h3>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white dark:bg-gray-800 shadow-sm rounded-xl dark:border-transparent overflow-hidden">
                                <!-- Image -->
                                <img class="absolute w-full h-full object-cover" src="{{ asset('images/applications-image-18.jpg') }}" width="286" height="160" alt="Application 18" />
                                <!-- Popular label -->
                                <div class="absolute top-0 right-0 mt-4 mr-4">
                                    <div class="inline-flex items-center text-xs font-medium text-white bg-gray-900 rounded-full text-center px-2 py-0.5">
                                        <svg class="w-5 h-5 fill-current text-yellow-500" viewBox="0 0 32 32">
                                            <path d="M16 20c.3 0 .5-.1.7-.3l5.7-5.7-1.4-1.4-4 4V8h-2v8.6l-4-4L9.6 14l5.7 5.7c.2.2.4.3.7.3zM9 22h14v2H9z" />
                                        </svg>
                                        <span>Download</span>
                                    </div>
                                </div>
                                <!-- Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                <!-- Content -->
                                <div class="relative h-full p-5 flex flex-col justify-end">
                                    <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Driving Techniques</h3>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white dark:bg-gray-800 shadow-sm rounded-xl dark:border-transparent overflow-hidden">
                                <!-- Image -->
                                <img class="absolute w-full h-full object-cover" src="{{ asset('images/applications-image-20.jpg') }}" width="286" height="160" alt="Application 20" />
                                <!-- Popular label -->
                                <div class="absolute top-0 right-0 mt-4 mr-4">
                                    <div class="inline-flex items-center text-xs font-medium text-white bg-gray-900 rounded-full text-center px-2 py-0.5">
                                        <svg class="w-5 h-5 fill-current text-yellow-500" viewBox="0 0 32 32">
                                            <path d="M16 20c.3 0 .5-.1.7-.3l5.7-5.7-1.4-1.4-4 4V8h-2v8.6l-4-4L9.6 14l5.7 5.7c.2.2.4.3.7.3zM9 22h14v2H9z" />
                                        </svg>
                                        <span>Download</span>
                                    </div>
                                </div>
                                <!-- Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                <!-- Content -->
                                <div class="relative h-full p-5 flex flex-col justify-end">
                                    <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Highway Safety</h3>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white dark:bg-gray-800 shadow-sm rounded-xl dark:border-transparent overflow-hidden">
                                <!-- Image -->
                                <img class="absolute w-full h-full object-cover" src="{{ asset('images/applications-image-20.jpg') }}" width="286" height="160" alt="Application 20" />
                                <!-- Popular label -->
                                <div class="absolute top-0 right-0 mt-4 mr-4">
                                    <div class="inline-flex items-center text-xs font-medium text-white bg-gray-900 rounded-full text-center px-2 py-0.5">
                                        <svg class="w-5 h-5 fill-current text-yellow-500" viewBox="0 0 32 32">
                                            <path d="M16 20c.3 0 .5-.1.7-.3l5.7-5.7-1.4-1.4-4 4V8h-2v8.6l-4-4L9.6 14l5.7 5.7c.2.2.4.3.7.3zM9 22h14v2H9z" />
                                        </svg>
                                        <span>Download</span>
                                    </div>
                                </div>
                                <!-- Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                <!-- Content -->
                                <div class="relative h-full p-5 flex flex-col justify-end">
                                    <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Cargo Handling</h3>
                                </div>
                            </div>

                            <!-- Card 5 -->
                            <div class="relative col-span-full sm:col-span-6 xl:col-span-3 bg-white dark:bg-gray-800 shadow-sm rounded-xl dark:border-transparent overflow-hidden">
                                <!-- Image -->
                                <img class="absolute w-full h-full object-cover" src="{{ asset('images/applications-image-20.jpg') }}" width="286" height="160" alt="Application 20" />
                                <!-- Popular label -->
                                <div class="absolute top-0 right-0 mt-4 mr-4">
                                    <div class="inline-flex items-center text-xs font-medium text-white bg-gray-900 rounded-full text-center px-2 py-0.5">
                                        <svg class="w-5 h-5 fill-current text-yellow-500" viewBox="0 0 32 32">
                                            <path d="M16 20c.3 0 .5-.1.7-.3l5.7-5.7-1.4-1.4-4 4V8h-2v8.6l-4-4L9.6 14l5.7 5.7c.2.2.4.3.7.3zM9 22h14v2H9z" />
                                        </svg>
                                        <span>Download</span>
                                    </div>
                                </div>
                                <!-- Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent" aria-hidden="true"></div>
                                <!-- Content -->
                                <div class="relative h-full p-5 flex flex-col justify-end">
                                    <h3 class="text-lg text-white font-semibold mt-16 mb-0.5">Regulations</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Apply section -->
                <div class="mt-6">
                    <div class="flex justify-between items-center">
                        <!-- Apply button -->
                        <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white whitespace-nowrap">Upload New Material</button>
                    </div>
                </div>

                <hr class="my-6 border-t border-gray-100 dark:border-gray-700/60" />

                <!-- Related Jobs -->
                <div>
                    <h2 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-6">Class Curriculum & Schedule</h2>
                    <div class="space-y-2 mt-6">

                        <!-- Job 1 -->
                        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
                            <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
                                <!-- Left side -->
                                <div class="flex items-start space-x-3 md:space-x-4">
                                    <div class="w-9 h-9 shrink-0 mt-1">
                                        <img class="w-9 h-9 rounded-full" src="{{ asset('images/company-icon-03.svg') }}" width="36" height="36" alt="Company 03" />
                                    </div>
                                    <div>
                                        <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('job-post') }}">Introduction to Commercial Trucking</a>
                                        <div class="text-sm">Overview of the trucking industry, career opportunities, and job responsibilities.</div>
                                    </div>
                                </div>
                                <!-- Right side -->
                                <div class="flex items-center space-x-4 pl-10 md:pl-0">
                                    <div class="text-sm text-gray-500 dark:text-gray-400 italic whitespace-nowrap">Jan 15, 2:30PM</div>
                                    <button class="text-red-500 hover:text-red-600 rounded-full">
                                        <span class="sr-only">Delete</span>
                                        <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                            <path d="M13 15h2v6h-2zM17 15h2v6h-2z" />
                                            <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
                            <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
                                <!-- Left side -->
                                <div class="flex items-start space-x-3 md:space-x-4">
                                    <div class="w-9 h-9 shrink-0 mt-1">
                                        <img class="w-9 h-9 rounded-full" src="{{ asset('images/company-icon-03.svg') }}" width="36" height="36" alt="Company 03" />
                                    </div>
                                    <div>
                                        <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('job-post') }}">Commercial Driver's License (CDL) Preparation</a>
                                        <div class="text-sm">Study materials and practice for passing written and driving exams.</div>
                                    </div>
                                </div>
                                <!-- Right side -->
                                <div class="flex items-center space-x-4 pl-10 md:pl-0">
                                    <div class="text-sm text-gray-500 dark:text-gray-400 italic whitespace-nowrap">Jan 22, 12:00PM</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
                            <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
                                <!-- Left side -->
                                <div class="flex items-start space-x-3 md:space-x-4">
                                    <div class="w-9 h-9 shrink-0 mt-1">
                                        <img class="w-9 h-9 rounded-full" src="{{ asset('images/company-icon-03.svg') }}" width="36" height="36" alt="Company 03" />
                                    </div>
                                    <div>
                                        <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('job-post') }}">Vehicle Systems and Maintenance</a>
                                        <div class="text-sm">Study materials and practice for passing written and driving exams.</div>
                                    </div>
                                </div>
                                <!-- Right side -->
                                <div class="flex items-center space-x-4 pl-10 md:pl-0">
                                    <div class="text-sm text-gray-500 dark:text-gray-400 italic whitespace-nowrap">Jan 22, 12:00PM</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
                            <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
                                <!-- Left side -->
                                <div class="flex items-start space-x-3 md:space-x-4">
                                    <div class="w-9 h-9 shrink-0 mt-1">
                                        <img class="w-9 h-9 rounded-full" src="{{ asset('images/company-icon-03.svg') }}" width="36" height="36" alt="Company 03" />
                                    </div>
                                    <div>
                                        <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('job-post') }}">Defensive Driving Techniques</a>
                                        <div class="text-sm">Strategies for safe driving in different traffic and weather condition.</div>
                                    </div>
                                </div>
                                <!-- Right side -->
                                <div class="flex items-center space-x-4 pl-10 md:pl-0">
                                    <div class="text-sm text-gray-500 dark:text-gray-400 italic whitespace-nowrap">Jan 22, 12:00PM</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
                            <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
                                <!-- Left side -->
                                <div class="flex items-start space-x-3 md:space-x-4">
                                    <div class="w-9 h-9 shrink-0 mt-1">
                                        <img class="w-9 h-9 rounded-full" src="{{ asset('images/company-icon-03.svg') }}" width="36" height="36" alt="Company 03" />
                                    </div>
                                    <div>
                                        <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('job-post') }}">Logbook and Hours-of-Service Regulations</a>
                                        <div class="text-sm">Learning to track driving hours and comply with federal laws.</div>
                                    </div>
                                </div>
                                <!-- Right side -->
                                <div class="flex items-center space-x-4 pl-10 md:pl-0">
                                    <div class="text-sm text-gray-500 dark:text-gray-400 italic whitespace-nowrap">Jan 22, 12:00PM</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl px-5 py-4">
                            <div class="md:flex justify-between items-center space-y-4 md:space-y-0 space-x-2">
                                <!-- Left side -->
                                <div class="flex items-start space-x-3 md:space-x-4">
                                    <div class="w-9 h-9 shrink-0 mt-1">
                                        <img class="w-9 h-9 rounded-full" src="{{ asset('images/company-icon-03.svg') }}" width="36" height="36" alt="Company 03" />
                                    </div>
                                    <div>
                                        <a class="inline-flex font-semibold text-gray-800 dark:text-gray-100" href="{{ route('job-post') }}">Backing and Parking Maneuvers</a>
                                        <div class="text-sm">Practice with precision driving and parking in tight spaces.</div>
                                    </div>
                                </div>
                                <!-- Right side -->
                                <div class="flex items-center space-x-4 pl-10 md:pl-0">
                                    <div class="text-sm text-gray-500 dark:text-gray-400 italic whitespace-nowrap">Jan 22, 12:00PM</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="hidden lg:block space-y-4">

                <!-- Company information (desktop) -->
                <div class="bg-white dark:bg-gray-800 p-5 shadow-sm rounded-xl lg:w-72 xl:w-80">
                    <div class="text-center mb-6">
                        <div class="inline-flex mb-3">
                            <img class="w-full h-48" src="{{ Storage::url($objective->image_url) }}" width="64" height="64" alt="{{ $objective->objective }}" />
                        </div>
                        <div class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-1">{{ $objective->objective }}</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400 italic">5 Course Materials</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400 italic">6 Class Schedules</div>
                    </div>
                </div>

                <div class="py-8 px-4 lg:px-3 3xl:px-9">
                    <div class="max-w-sm mx-auto lg:max-w-none">
                        <h2 class="text-lg text-gray-800 dark:text-gray-100 font-bold mb-6">New Curriculum Form</h2>
                        <div class="space-y-6">

                            <div>
                                <div class="space-y-4">
                                    <!-- Card Number -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-nr">Topic <span class="text-red-500">*</span></label>
                                        <input id="card-nr" class="form-input w-full" type="text" placeholder="Introduction to Commercial Trucking" />
                                    </div>

                                    <!-- Name on Card -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-name">Summary <span class="text-red-500">*</span></label>
                                        <textarea id="feedback" class="form-textarea w-full focus:border-gray-300" rows="4" placeholder="Overview of the trucking industry, career opportunities, and job responsibilities." name="site_description"></textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium mb-1" for="card-country">Country <span class="text-red-500">*</span></label>
                                        <select id="card-country" class="form-select w-full">
                                            <option>Italy</option>
                                            <option>USA</option>
                                            <option>United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <div class="mb-4">
                                    <button class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Start -->
    <div x-data="{ modalOpen: false }">
        <!-- <button
            class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white"
            @click.prevent="modalOpen = true"
            aria-controls="feedback-modal"
        >Send Feedback</button> -->
        <!-- Modal backdrop -->
        <div
            class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
            x-show="modalOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-out duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            aria-hidden="true"
            x-cloak
        ></div>
        <!-- Modal dialog -->
        <div
            id="feedback-modal"
            class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
            role="dialog"
            aria-modal="true"
            x-show="modalOpen"
            x-transition:enter="transition ease-in-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in-out duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4"
            x-cloak
        >
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                <!-- Modal header -->
                <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700/60">
                    <div class="flex justify-between items-center">
                        <div class="font-semibold text-gray-800 dark:text-gray-100">Send Feedback</div>
                        <button class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400" @click="modalOpen = false">
                            <div class="sr-only">Close</div>
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Modal content -->
                <div class="px-5 py-4">
                    <div class="text-sm">
                        <div class="font-medium text-gray-800 dark:text-gray-100 mb-3">Let us know what you think 🙌</div>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium mb-1" for="name">Name <span class="text-red-500">*</span></label>
                            <input id="name" class="form-input w-full px-2 py-1" type="text" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="email">Email <span class="text-red-500">*</span></label>
                            <input id="email" class="form-input w-full px-2 py-1" type="email" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="feedback">Message <span class="text-red-500">*</span></label>
                            <textarea id="feedback" class="form-textarea w-full px-2 py-1" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="px-5 py-4 border-t border-gray-200 dark:border-gray-700/60">
                    <div class="flex flex-wrap justify-end space-x-2">
                        <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="modalOpen = false">Cancel</button>
                        <button class="btn-sm bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Send</button>
                    </div>
                </div>
            </div>
        </div>                                            
    </div>
    <!-- End -->
</x-app-layout>


