<div class="flex items-center">
    <div class="form-switch">
        <input type="checkbox" id="switch-{{ $testimonial->id }}" class="sr-only"
               wire:model.lazy="website_visibility" />
        <label class="bg-gray-400 dark:bg-gray-700" for="switch-{{ $testimonial->id }}">
            <span class="bg-white shadow-sm" aria-hidden="true"></span>
        </label>
    </div>
    <!-- Livewire dynamic text update -->
    <div class="text-sm text-gray-400 dark:text-gray-500 italic ml-2">
        {{ $website_visibility ? 'Visible' : 'Hidden' }}
    </div>
</div>
