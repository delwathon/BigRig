@section('title', 'Newsletter')
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-5">

            <!-- Title -->
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Newsletter & Email Subscribers</h1>

        </div>

        <!-- Search form -->
        {{-- <div class="max-w-xl mb-5">
            <form class="relative">
                <label for="app-search" class="sr-only">Search</label>
                <input id="app-search" class="form-input w-full pl-9 py-3 bg-white dark:bg-gray-800" type="search" />
                <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                    <svg class="shrink-0 fill-current text-gray-400 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-gray-400 ml-3 mr-2" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                        <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                    </svg>
                </button>
            </form>
        </div> --}}

        <!-- Page content -->
        <div>

            <!-- Cards 5 (Popular Categories) -->
            <div class="mt-8">
                <h2 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-5">All Subscribers</h2>
                <div class="grid grid-cols-12 gap-6">
                    <x-newsletter.subscribers :subscribers="$subscribers" />
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{$subscribers->links()}}
            </div>

        </div>

    </div>
</x-app-layout>
