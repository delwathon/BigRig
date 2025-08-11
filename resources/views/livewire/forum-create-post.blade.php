<div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5 max-w-3xl mx-auto mt-5">

    <!-- Create Post Form -->
    <form wire:submit.prevent="createPost" class="space-y-5">

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
            <input type="text" wire:model.defer="title" id="title" placeholder="Enter post title" class="form-input w-full focus:border-gray-300" />
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Body with CKEditor -->
        <div wire:ignore>
            <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content</label>
            <textarea name="body" id="editor" rows="10" cols="10" placeholder="Write your post content..." class="form-textarea w-full px-2 py-1"></textarea>
            @error('body') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category <span class="text-gray-400 text-xs">(optional)</span></label>
            <input type="text" wire:model.defer="category" id="category" placeholder="E.g. Hazmat, Defensive Driving, Truck Maintenance" class="form-input w-full focus:border-gray-300" />
            @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit" class="btn-sm bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white whitespace-nowrap">Create Post →</button>
        </div>

    </form>

</div>

<!-- CKEditor script -->
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    // Sync editor content to Livewire on change
                    editor.model.document.on('change:data', () => {
                        @this.set('body', editor.getData());
                    });

                    // Optional: reset content if Livewire emits event (for post success, etc.)
                    Livewire.on('resetEditor', () => {
                        editor.setData('');
                    });
                })
                .catch(error => {
                    console.error('CKEditor initialization error:', error);
                });
        });
    </script>
@endpush
