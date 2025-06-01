<!-- Transaction Panel -->
<div
    class="absolute inset-0 sm:left-auto z-20 shadow-xl duration-200 ease-in-out"
    :class="transactionOpen ? 'translate-x-0' : 'translate-x-full'"
    @click.outside="transactionOpen = false"
    @keydown.escape.window="transactionOpen = false"
    x-cloak
>
    <div class="sticky top-16 bg-gradient-to-b from-gray-100 to-white dark:from-[#151D2C] dark:to-gray-900 overflow-x-hidden overflow-y-auto no-scrollbar shrink-0 border-l border-gray-200 dark:border-gray-700/60 w-full sm:w-[390px] h-[calc(100dvh-64px)]">

        <button class="absolute top-0 right-0 mt-6 mr-6 group p-2" @click="transactionOpen = false">
            <svg class="fill-gray-400 group-hover:fill-gray-600" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="m7.95 6.536 4.242-4.243a1 1 0 1 1 1.415 1.414L9.364 7.95l4.243 4.242a1 1 0 1 1-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 0 1-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 0 1 1.414-1.414L7.95 6.536Z" />
            </svg>
        </button>

        <div class="py-8 px-4 lg:px-8">
            <div class="max-w-sm mx-auto lg:max-w-none">

                <div class="text-gray-800 dark:text-gray-100 font-semibold text-center mb-1">Add A New Instructor</div>
                <div class="text-sm text-center italic">{{ \Carbon\Carbon::now()->format('d/m/Y, g:i A') }}</div>

                <form method="POST" action="{{ route('instructor.store') }}" enctype="multipart/form-data">
                @csrf
                    <!-- Profile Photo -->
                    <div class="mt-6">
                        <div class="text-sm font-semibold text-gray-800 dark:text-gray-100 mb-2">Profile Photo</div>
                        <div class="rounded bg-gray-100 dark:bg-gray-700/30 border border-dashed border-gray-300 dark:border-gray-700/60 text-center px-5 py-8">
                            <svg class="inline-flex fill-gray-400 dark:fill-gray-500 mb-3" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 4c-.3 0-.5.1-.7.3L1.6 10 3 11.4l4-4V16h2V7.4l4 4 1.4-1.4-5.7-5.7C8.5 4.1 8.3 4 8 4ZM1 2h14V0H1v2Z" />
                            </svg>
                            <label for="upload" class="block text-sm text-gray-500 dark:text-gray-400 italic">We accept PNG and JPEG file only.</label>
                            <input class="sr-only" id="upload" name="profile_photo" type="file" />
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="mt-6">
                        <div class="mb-3">
                            <label for="userRole" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Assign Roles</label>
                            <select
                                id="userRole"
                                name="userRole[]"
                                multiple
                                class="form-select w-full dark:bg-gray-800 dark:text-gray-100 text-sm"
                            >
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="" for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-input w-full focus:border-gray-300" placeholder="First Name" />
                        </div>

                        <div class="mb-3">
                            <label class="" for="middleName">Middle Name</label>
                            <input type="text" id="middleName" name="middleName" class="form-input w-full focus:border-gray-300" placeholder="Middle Name" />
                        </div>

                        <div class="mb-3">
                            <label class="" for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-input w-full focus:border-gray-300" placeholder="Last Name" />
                        </div>

                        <div class="mb-3">
                            <label class="" for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-select w-full focus:border-gray-300">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-input w-full focus:border-gray-300" placeholder="Email Address" />
                        </div>

                        <div class="mb-3">
                            <label class="" for="mobileNumber">Mobile Number</label>
                            <input type="tel" id="mobileNumber" name="mobileNumber" class="form-input w-full focus:border-gray-300" placeholder="Mobile Number" />
                        </div>
                    </div>

                    <!-- Download / Report -->
                    <div class="flex items-center space-x-3 mt-6">
                        <div class="w-1/2">
                            <button type="submit" class="btn w-full border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-violet-500 dark:text-violet-500">
                                <svg class="fill-current text-violet-500" width="16" height="16" viewBox="0 0 16 16">
                                    <path d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z" />
                                </svg>
                                <span class="ml-2">Submit</span>
                            </button>
                        </div>
                        <div class="w-1/2">
                            <button @click="transactionOpen = false" class="btn w-full border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-red-500">
                                <svg class="fill-current text-red-500" width="16" height="16" viewBox="0 0 16 16"">
                                    <path d="m7.95 6.536 4.242-4.243a1 1 0 1 1 1.415 1.414L9.364 7.95l4.243 4.242a1 1 0 1 1-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 0 1-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 0 1 1.414-1.414L7.95 6.536Z" />
                                </svg>
                                <span class="ml-2">Cancel</span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new TomSelect('#userRole', {
            plugins: ['remove_button'],
            maxItems: null,
            placeholder: 'Select roles...',
            persist: false,
            create: false
        });
    });
</script>