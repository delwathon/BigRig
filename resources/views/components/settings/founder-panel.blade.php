<div class="grow">

<form action="{{ route('founder.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Panel body -->
        <div class="p-6 space-y-6">

            <section>
                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">A warm welcome message.</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="founder_name">Founder's Full Name  <span class="text-red-500">*</span></label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $founder->founder_name }}" name="founder_name"/>
                    </div>
                    <div class="sm:w-1/2 flex ml-auto">
                        <label class="block text-sm font-medium mb-1" for="">Signature</label>
                        <img class="rounded-sm h-12 mt-5" src="{{ Storage::url($founder->signature) }}" width="200" height="142" alt="Founder Signature" />
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-full">
                        <label class="block text-sm font-medium mb-1" for="speech_title">Title <span class="text-red-500">*</span></label>
                        <textarea id="feedback" class="form-textarea w-full focus:border-gray-300" rows="4" placeholder="Speech Title" name="speech_title">{{ $founder->speech_title }}</textarea>
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-full">
                        <label class="block text-sm font-medium mb-1" for="speech_content">Speech Content <span class="text-red-500">*</span></label>
                        <textarea id="feedback" class="form-textarea w-full focus:border-gray-300" rows="8" placeholder="Welcome message" name="speech_content">{{ $founder->speech_content }}</textarea>
                    </div>
                </div>
            </section>

            <!-- Socail Media Handles -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Social Media Handles</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="facebook_handle">Facebook</label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $founder->facebook_handle }}" name="facebook_handle"/>
                    </div>
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="twitter_handle">Twitter</label>
                        <input id="business-id" class="form-input w-full" type="text" value="{{ $founder->twitter_handle }}" name="twitter_handle"/>
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="linkedin_handle">LinkedIn</label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $founder->linkedin_handle }}" name="linkedin_handle"/>
                    </div>
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="instagram_handle">Instagram</label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $founder->instagram_handle }}" name="instagram_handle"/>
                    </div>
                </div>
            </section>

            <!-- Business Logo -->
            <section>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="founder_picture">Founder's Picture</label>
                        <div class="mr-4">
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="founder_picture" />
                        </div>
                        <!-- <button class="btn-sm dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">Change</button> -->
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="secondary_picture">Complementing Picture</label>
                        <div class="mr-4">
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="secondary_picture" />
                        </div>
                        <!-- <button class="btn-sm dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">Change</button> -->
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="signature">Signature</label>
                        <div class="mr-4">
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="signature" />
                        </div>
                        <!-- <button class="btn-sm dark:bg-gray-800 border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300">Change</button> -->
                    </div>
                </div>
            </section>
        </div>

        <!-- Panel footer -->
        <footer>
            <div class="flex flex-col px-6 py-5 border-t border-gray-200 dark:border-gray-700/60">
                <div class="flex self-end">
                    <button type="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white ml-3">Save Changes</button>
                </div>
            </div>
        </footer>
    </form>
</div>