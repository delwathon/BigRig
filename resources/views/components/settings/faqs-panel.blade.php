<div x-data="{ addNew: false }" class="grow">

    <!-- Panel body -->
    <div class="p-6 space-y-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold">Frequently Asked Questions</h2>
            <button 
                @click="addNew = !addNew" 
                class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 ml-auto">
                <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
            </button>
        </div>

        <!-- FAQ Section -->
        <section>
            <ul>
                <!-- Add New FAQ -->
                <template x-if="addNew">
                    <form method="POST" action="{{ route('faqs.store') }}">
                    @csrf
                        <li class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-700/60">
                            <div class="sm:w-4/5">
                                <div class="text-gray-800 dark:text-gray-100 font-semibold">Add New</div>
                                <div>
                                    <div class="sm:w-full">
                                        <label class="block text-sm font-medium mb-1" for="question">Question <span class="text-red-500">*</span></label>
                                        <input id="question" class="form-input sm:w-full mb-1" type="text" placeholder="Type your question here..." name="question" />
                                    </div>
                                    <div class="sm:w-full">
                                        <label class="block text-sm font-medium mb-1" for="answer">Answer <span class="text-red-500">*</span></label>
                                        <textarea id="answer" class="form-textarea sm:w-full focus:border-gray-300" rows="4" placeholder="Your answer goes here..." name="answer"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:w-1/5 flex items-center ml-4 justify-center gap-1">
                                <!-- Add Button -->
                                <button type="submit" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                    <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                        <path d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z" />
                                    </svg>
                                </button>

                                <!-- Cancel Button -->
                                <button type="button" @click="addNew = false" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                    <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                        <path d="M6.586 8L.293 1.707 1.707.293 8 6.586 14.293.293l1.414 1.414L9.414 8l6.293 6.293-1.414 1.414L8 9.414l-6.293 6.293-1.414-1.414z"></path>
                                    </svg>
                                </button>
                            </div>
                        </li>
                    </form>
                </template>

                <!-- Existing FAQs -->
                @if ($faqs->isEmpty())
                    <div class="col-span-full shadow-sm rounded-xl">
                        <div class="flex flex-col h-full text-center p-5">
                            <div class="grow mb-1">
                                <h3 class="text-lg text-gray-800 dark:text-gray-100 font-semibold mb-1">No record found.</h3>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($faqs as $faq)
                    <form method="POST" action="{{ route('faqs.update') }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $faq->id }}">

                        <li x-data="{ isEditing: false, editedQuestion: '{{ $faq['question'] }}', editedAnswer: '{{ $faq['answer'] }}' }" 
                            class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-700/60">
                            <div class="sm:w-4/5">
                                <template x-if="!isEditing">
                                    <div>
                                        <div class="text-gray-800 dark:text-gray-100 font-semibold">{{ $faq['question'] }}</div>
                                        <div class="text-sm">{{ $faq['answer'] }}</div>
                                    </div>
                                </template>

                                <template x-if="isEditing">
                                    <div>
                                        <div class="sm:w-full">
                                            <label class="block text-sm font-medium mb-1" for="question">Question <span class="text-red-500">*</span></label>
                                            <input id="question" class="form-input sm:w-full mb-1" type="text" x-model="editedQuestion" name="question" />
                                        </div>
                                        <div class="sm:w-full">
                                            <label class="block text-sm font-medium mb-1" for="answer">Answer <span class="text-red-500">*</span></label>
                                            <textarea id="answer" class="form-textarea sm:w-full focus:border-gray-300" rows="4" x-model="editedAnswer" name="answer"></textarea>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Right -->
                            <div class="sm:w-1/5 flex items-center ml-4 justify-center">
                                <div class="m-1.5">
                                    <!-- Edit Button -->
                                    <button type="button" x-show="!isEditing" @click="isEditing = !isEditing" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                        <svg class="fill-current text-gray-400 dark:text-gray-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                        </svg>
                                    </button>

                                    <!-- Delete Button -->
                                    <button type="button" x-show="!isEditing" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600" @click="$store.deleteModal.open({{ $faq->id }})" aria-controls="delete-modal">
                                        <svg class="fill-current text-red-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                        </svg>
                                    </button>

                                    <!-- Save Button -->
                                    <button
                                        x-show="isEditing"
                                        type="submit"
                                        class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                        <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M14.3 2.3L5 11.6 1.7 8.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z" />
                                        </svg>
                                    </button>

                                    <!-- Cancel Button -->
                                    <button type="button" x-show="isEditing" @click="isEditing = false" class="btn bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600">
                                        <svg class="fill-current text-violet-500 shrink-0" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M6.586 8L.293 1.707 1.707.293 8 6.586 14.293.293l1.414 1.414L9.414 8l6.293 6.293-1.414 1.414L8 9.414l-6.293 6.293-1.414-1.414z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </form>
                    @endforeach
                @endif
            </ul>
        </section>
    </div>
</div>


<!-- Delete FAQ Modal -->
@include('components.modals.delete-faq-modal')