<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-6">Edit Home Page</h2>

                <form wire:submit.prevent="update" class="space-y-6">

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" wire:model="title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)]">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subtitle -->
                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700">Subtitle</label>
                        <textarea id="subtitle" wire:model="subtitle" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)]"></textarea>
                        @error('subtitle')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button Text -->
                    <div>
                        <label for="button_text" class="block text-sm font-medium text-gray-700">Button Text</label>
                        <input type="text" id="button_text" wire:model="button_text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)]">
                        @error('button_text')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button URL -->
                    <div>
                        <label for="button_url" class="block text-sm font-medium text-gray-700">Button URL</label>
                        <input type="text" id="button_url" wire:model="button_url"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)]">
                        @error('button_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="newImage" class="block text-sm font-medium text-gray-700">Hero Image</label>
                        <input type="file" id="newImage" wire:model="newImage" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                        @error('newImage')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        {{-- Show preview of newly uploaded image --}}
                        @if($newImage)
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 mb-1">New Image Preview:</p>
                                <img src="{{ $newImage->temporaryUrl() }}" alt="Preview" class="h-32 rounded-lg shadow-md">
                            </div>
                        @elseif($existingImage)
                            {{-- Show current saved image --}}
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                                <img src="{{ asset('storage/' . $existingImage) }}" alt="Current"
                                    class="h-32 rounded-lg shadow-md">
                            </div>
                        @endif
                    </div>


                    <div class="flex justify-end">
                        <button type="submit"
                            class="group inline-flex items-center px-6 py-3 text-base font-semibold text-white bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-xl transition-all shadow-lg hover:shadow-xl hover:scale-105">
                            Save Changes
                            <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('alert', event => {
        alert(event.detail.message);
    });
</script>