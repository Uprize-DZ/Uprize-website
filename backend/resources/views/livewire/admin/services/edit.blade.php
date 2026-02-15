<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Services Management</h1>
                <p class="mt-2 text-sm text-gray-600">Create and manage the services offered by Uprize.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#6b66ff]">
                Back to Dashboard
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">
                        {{ $editingId ? 'Edit Service' : 'Add New Service' }}
                    </h2>

                    <form wire:submit.prevent="{{ $editingId ? 'update' : 'store' }}" enctype="multipart/form-data"
                        class="space-y-5">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Service Title</label>
                            <input type="text" wire:model="{{ $editingId ? 'editTitle' : 'title' }}"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[#6b66ff] focus:ring-[#6b66ff] transition-all"
                                placeholder="E.g. Web Development">
                            @error($editingId ? 'editTitle' : 'title') <span
                            class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea wire:model="{{ $editingId ? 'editDescription' : 'description' }}" rows="4"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[#6b66ff] focus:ring-[#6b66ff] transition-all"
                                placeholder="Describe the service..."></textarea>
                            @error($editingId ? 'editDescription' : 'description') <span
                            class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Button Text -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Button Text (Optional)</label>
                            <input type="text" wire:model="{{ $editingId ? 'editButtonText' : 'button_text' }}"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[#6b66ff] focus:ring-[#6b66ff] transition-all"
                                placeholder="Learn More">
                            @error($editingId ? 'editButtonText' : 'button_text') <span
                            class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Button URL -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Button URL (Optional)</label>
                            <input type="text" wire:model="{{ $editingId ? 'editButtonUrl' : 'button_url' }}"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[#6b66ff] focus:ring-[#6b66ff] transition-all"
                                placeholder="/more">
                            @error($editingId ? 'editButtonUrl' : 'button_url') <span
                            class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Service Image</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#6b66ff] transition-all">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-[#6b66ff] hover:text-[#5a56e6] focus-within:outline-none">
                                            <span>Upload an image</span>
                                            <input type="file" wire:model="{{ $editingId ? 'editImage' : 'image' }}"
                                                class="sr-only" accept="image/*">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                                    <div wire:loading wire:target="{{ $editingId ? 'editImage' : 'image' }}"
                                        class="text-xs text-[#6b66ff] mt-2">
                                        Uploading image...
                                    </div>
                                </div>
                            </div>
                            @error($editingId ? 'editImage' : 'image') <span
                            class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

                            <!-- Preview New Image -->
                            @if (($editingId && $editImage) || (!$editingId && $image))
                                <div class="mt-4">
                                    @if($editingId && $editImage)
                                        <img src="{{ $editImage->temporaryUrl() }}"
                                            class="h-24 object-cover rounded-lg border border-gray-100">
                                    @elseif(!$editingId && $image)
                                        <img src="{{ $image->temporaryUrl() }}"
                                            class="h-24 object-cover rounded-lg border border-gray-100">
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Video Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Service Video (Optional)</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#6b66ff] transition-all">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-[#6b66ff] hover:text-[#5a56e6] focus-within:outline-none">
                                            <span>Upload a video</span>
                                            <input type="file" wire:model="{{ $editingId ? 'editVideo' : 'video' }}"
                                                class="sr-only"
                                                accept="video/mp4,video/quicktime,video/x-msvideo,video/webm">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">MP4, MOV, AVI, WEBM up to 50MB</p>
                                    <div wire:loading wire:target="{{ $editingId ? 'editVideo' : 'video' }}"
                                        class="text-xs text-[#6b66ff] mt-2 flex items-center justify-center gap-2">
                                        <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        Uploading video...
                                    </div>
                                </div>
                            </div>


                            <!-- Preview New video -->
                            @if (($editingId && $editVideo) || (!$editingId && $video))
                                <div class="mt-4">
                                    <p class="text-xs text-gray-600 mb-2">New video preview:</p>
                                    @if($editingId && $editVideo)
                                        <video controls class="h-32 w-full rounded-lg border border-gray-100">
                                            <source src="{{ $editVideo->temporaryUrl() }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @elseif(!$editingId && $video)
                                        <video controls class="h-32 w-full rounded-lg border border-gray-100">
                                            <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            @endif

                            <!-- Show existing video if editing and no new video -->
                            @if ($editingId && $currentVideoUrl && !$editVideo)
                                <div class="mt-4">
                                    <p class="text-xs text-gray-600 mb-2">Current video:</p>
                                    <video controls class="h-32 w-full rounded-lg border border-gray-100">
                                        <source src="{{ $currentVideoUrl }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                        </div>

                        <!-- Active Toggle -->
                        <div class="flex items-center">
                            <input type="checkbox" wire:model="{{ $editingId ? 'editIsActive' : 'is_active' }}"
                                class="h-4 w-4 text-[#6b66ff] focus:ring-[#6b66ff] border-gray-300 rounded transition-all">
                            <label class="ml-2 block text-sm text-gray-900 font-medium">Is Active</label>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-3">
                            <button type="submit"
                                class="flex-1 bg-[#6b66ff] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#5a56e6] transition-all flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed"
                                wire:loading.attr="disabled"
                                wire:target="{{ $editingId ? 'update' : 'store' }}, {{ $editingId ? 'editImage,editVideo' : 'image,video' }}">
                                <span wire:loading.remove wire:target="{{ $editingId ? 'update' : 'store' }}">
                                    {{ $editingId ? 'Update Service' : 'Add Service' }}
                                </span>
                                <span wire:loading wire:target="{{ $editingId ? 'update' : 'store' }}"
                                    class="flex items-center gap-2">
                                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Processing...
                                </span>
                            </button>
                            @if($editingId)
                                <button type="button" wire:click="cancelEdit"
                                    class="px-6 py-3 rounded-xl font-semibold border-2 border-gray-200 text-gray-600 hover:bg-gray-50 transition-all">
                                    Cancel
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- List Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Service</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Media</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($services as $service)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $service->title }}</div>
                                        <div class="text-xs text-gray-500 h-10 overflow-hidden">
                                            {{ Str::limit($service->description, 60) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-col gap-2">
                                            <!-- Image thumbnail -->
                                            <div
                                                class="h-12 w-20 bg-gray-50 rounded-lg overflow-hidden border border-gray-100">
                                                <img src="{{ asset('storage/' . $service->image) }}"
                                                    class="h-full w-full object-cover" alt="{{ $service->title }}">
                                            </div>
                                            <!-- Video indicator -->
                                            @if($service->video_url)
                                                <span class="inline-flex items-center text-xs text-green-600">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" />
                                                    </svg>
                                                    Video
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button wire:click="toggleActive({{ $service->id }})"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <button wire:click="edit({{ $service->id }})"
                                            class="text-[#6b66ff] hover:text-[#5a56e6] font-semibold">Edit</button>
                                        <button wire:click="delete({{ $service->id }})"
                                            wire:confirm="Are you sure you want to delete this service?"
                                            class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500 italic">
                                        No services added yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>