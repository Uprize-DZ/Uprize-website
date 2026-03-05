<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Edit {{ $label }}
                </h1>
                <p class="mt-2 text-sm text-gray-600">Update the content displayed on the public {{ $label }} page.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#6b66ff]">
                Back to Dashboard
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form wire:submit.prevent="update" class="space-y-6">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Page Title</label>
                    <input type="text" wire:model="title"
                        class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[#6b66ff] focus:ring-[#6b66ff] transition-all">
                    @error('title') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                    <p class="text-xs text-gray-400 mb-2">Write your content using plain text. Press Enter to add a new paragraph.</p>
                    <textarea wire:model="body" rows="22"
                        class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[#6b66ff] focus:ring-[#6b66ff] transition-all font-mono text-sm leading-relaxed"></textarea>
                    @error('body') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end pt-4 border-t">
                    <button type="submit"
                        class="bg-[#6b66ff] text-white px-8 py-3 rounded-xl font-semibold hover:bg-[#5a56e6] transition-all flex items-center justify-center gap-2">
                        <span wire:loading.remove>Save Changes</span>
                        <span wire:loading
                            class="animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>