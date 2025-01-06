@props(['business_data'])

<div class="grow">
    <form action="{{ route('site_settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Panel body -->
        <div class="p-6 space-y-6">
            <!-- <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-5">My Account</h2> -->

            <!-- Business Logo -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Business Logo</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="dark_theme_logo">Dark Theme Logo <span class="text-red-500">*</span></label>
                        <div class="mr-4">
                            <img class="w-40 h-20" src="{{ Storage::url($settings->dark_theme_logo) }}" width="80" height="80" alt="Dark Theme Logo" name="dark_theme_logo"/>
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="dark_theme_logo" />
                        </div>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="light_theme_logo">Light Theme Logo <span class="text-red-500">*</span></label>
                        <div class="mr-4">
                            <img class="w-40 h-20" src="{{ Storage::url($settings->light_theme_logo) }}" width="80" height="80" alt="Light Theme Logo" name="light_theme_logo"/>
                            <input id="picture" class="form-input w-full px-2 py-1" type="file" name="light_theme_logo" />
                        </div>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="favicon">Favicon <span class="text-red-500">*</span></label>
                        <div class="mr-4">
                            <img class="w-40 h-20" src="{{ Storage::url($settings->favicon) }}" width="80" height="80" alt="Favicon" name="favicon"/>
                            <input id="favicon" class="form-input w-full px-2 py-1" type="file" name="favicon" />
                        </div>
                    </div>
                </div>
            </section>

            <!-- Business Information -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Site Details</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="site_name">Site Name <span class="text-red-500">*</span></label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $settings->site_name }}" name="site_name"/>
                    </div>
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="site_tagline">Site Tagline</label>
                        <input id="business-id" class="form-input w-full" type="text" value="{{ $settings->site_tagline }}" name="site_tagline"/>
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-full">
                        <label class="block text-sm font-medium mb-1" for="site_description">Site Description <span class="text-red-500">*</span></label>
                        <textarea id="feedback" class="form-textarea w-full focus:border-gray-300" rows="4" placeholder="Site description" name="site_description">{{ $settings->site_description }}</textarea>
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-full">
                        <label class="block text-sm font-medium mb-1" for="site_keywords">Site Keyword(s) <span class="text-red-500">*</span></label>
                        <textarea id="feedback" class="form-textarea w-full focus:border-gray-300" rows="4" placeholder="Site keywords" name="site_keywords">{{ $settings->site_keywords }}</textarea>
                    </div>
                </div>
            </section>

            <!-- Contact Details -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Contact Details</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-full">
                        <label class="block text-sm font-medium mb-1" for="headquarters">Office Address <span class="text-red-500">*</span></label>
                        <textarea id="feedback" class="form-textarea w-full focus:border-gray-300" rows="4" placeholder="Enter your physical office address" name="headquarters">{{ $settings->headquarters }}</textarea>
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="business_email">Contact Email Address <span class="text-red-500">*</span></label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $settings->business_email }}" name="business_email"/>
                    </div>
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="secondary_email">Secondary Email</label>
                        <input id="business-id" class="form-input w-full" type="text" value="{{ $settings->secondary_email }}" name="secondary_email"/>
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="business_contact">Contact Phone Number <span class="text-red-500">*</span></label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $settings->business_contact }}" name="business_contact"/>
                    </div>
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="secondary_contact">Secondary Phone Number</label>
                        <input id="business-id" class="form-input w-full" type="text" value="{{ $settings->secondary_contact }}" name="secondary_contact"/>
                    </div>
                </div>
            </section>

            <!-- Socail Media Handles -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-bold mb-1">Social Media Handles</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="facebook_handle">Facebook</label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $settings->facebook_handle }}" name="facebook_handle"/>
                    </div>
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="twitter_handle">Twitter</label>
                        <input id="business-id" class="form-input w-full" type="text" value="{{ $settings->twitter_handle }}" name="twitter_handle"/>
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="instagram_handle">Instagram</label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $settings->instagram_handle }}" name="instagram_handle"/>
                    </div>
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="youtube_handle">Youtube</label>
                        <input id="business-id" class="form-input w-full" type="text" value="{{ $settings->youtube_handle }}" name="youtube_handle"/>
                    </div>
                </div>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="tiktok_handle">TikTok</label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $settings->tiktok_handle }}" name="tiktok_handle"/>
                    </div>
                    <div class="sm:w-1/2">
                        <label class="block text-sm font-medium mb-1" for="linkedin_handle">LinkedIn</label>
                        <input id="name" class="form-input w-full" type="text" value="{{ $settings->linkedin_handle }}" name="linkedin_handle"/>
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