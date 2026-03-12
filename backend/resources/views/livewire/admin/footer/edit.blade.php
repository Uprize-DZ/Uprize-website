<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Footer / Entity Management</h1>
                <p class="mt-2 text-sm text-gray-600">Update the core information displayed in the website footer.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)]">
                Back to Dashboard
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form wire:submit.prevent="update" class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Basic Info -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Basic Information</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Entity Name</label>
                            <input type="text" wire:model="name"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all">
                            @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Slogan</label>
                            <input type="text" wire:model="slogan"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all">
                            @error('slogan') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea wire:model="description" rows="4"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"></textarea>
                            @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Contact Details</h3>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Website URL</label>
                            <input type="text" wire:model="website"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all">
                            @error('website') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" wire:model="email"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all">
                            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="text" wire:model="phone"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all">
                            @error('phone') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Physical Address</label>
                            <textarea wire:model="address" rows="2"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"></textarea>
                            @error('address') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <!-- Social Media Info -->
                <div class="space-y-6 pt-8 border-t border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">Social Media Link</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Facebook URL</label>
                            <input type="text" wire:model="facebook_url"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"
                                placeholder="https://facebook.com/your-page">
                            @error('facebook_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Instagram URL</label>
                            <input type="text" wire:model="instagram_url"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"
                                placeholder="https://instagram.com/your-profile">
                            @error('instagram_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Twitter (X) URL</label>
                            <input type="text" wire:model="twitter_url"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"
                                placeholder="https://twitter.com/your-profile">
                            @error('twitter_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">YouTube URL</label>
                            <input type="text" wire:model="youtube_url"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"
                                placeholder="https://youtube.com/c/your-channel">
                            @error('youtube_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn URL</label>
                            <input type="text" wire:model="linkedin_url"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"
                                placeholder="https://linkedin.com/in/your-profile">
                            @error('linkedin_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">TikTok URL</label>
                            <input type="text" wire:model="tiktok_url"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"
                                placeholder="https://tiktok.com/@your-profile">
                            @error('tiktok_url') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number</label>
                            <input type="text" wire:model="whatsapp_number"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] transition-all"
                                placeholder="+1234567890">
                            @error('whatsapp_number') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-6 border-t">
                    <button type="submit"
                        class="bg-[var(--primary-color)] text-white px-8 py-3 rounded-xl font-semibold hover:bg-[var(--secondary-color)] transition-all flex items-center justify-center gap-2">
                        <span wire:loading.remove>Save Changes</span>
                        <span wire:loading
                            class="animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>