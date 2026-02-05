<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Trusted By Management</h1>
                <p class="mt-2 text-sm text-gray-600">Manage the companies and partners displayed on the homepage.</p>
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
                        {{ $editingId ? 'Edit Company' : 'Add New Company' }}</h2>

                    <form wire:submit.prevent="{{ $editingId ? 'update' : 'store' }}" class="space-y-5">
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                            <input type="text" wire:model="{{ $editingId ? 'editName' : 'name' }}"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[#6b66ff] focus:ring-[#6b66ff] transition-all"
                                placeholder="Google, Apple, etc.">
                            @error($editingId ? 'editName' : 'name') <span
                            class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- URL -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Website URL</label>
                            <input type="text" wire:model="{{ $editingId ? 'editUrl' : 'url' }}"
                                class="w-full px-4 py-2 rounded-xl border-gray-200 focus:border-[#6b66ff] focus:ring-[#6b66ff] transition-all"
                                placeholder="https://example.com">
                            @error($editingId ? 'editUrl' : 'url') <span
                            class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Logo (SVG/PNG)</label>
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
                                            <span>Upload a file</span>
                                            <input type="file" wire:model="{{ $editingId ? 'editImage' : 'image' }}"
                                                class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, SVG up to 1MB</p>
                                </div>
                            </div>
                            @error($editingId ? 'editImage' : 'image') <span
                            class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

                            <!-- Preview New Image -->
                            @php
                                $previewSource = null;
                                try {
                                    if ($editingId && $editImage) {
                                        $previewSource = $editImage->temporaryUrl();
                                    } elseif (!$editingId && $image) {
                                        $previewSource = $image->temporaryUrl();
                                    }
                                } catch (\Exception $e) {
                                    $previewSource = null;
                                }
                            @endphp

                            @if ($previewSource)
                                <div class="mt-4">
                                    <p class="text-xs text-gray-500 mb-2">Preview:</p>
                                    <img src="{{ $previewSource }}"
                                        class="h-16 object-contain rounded-lg border border-gray-100">
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
                                class="flex-1 bg-[#6b66ff] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#5a56e6] transition-all flex items-center justify-center gap-2">
                                <span wire:loading.remove>{{ $editingId ? 'Update Company' : 'Add Company' }}</span>
                                <span wire:loading
                                    class="animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full"></span>
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
                                    Company</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Logo</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    URL</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($companies as $company)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $company->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="h-10 w-24 bg-gray-50 rounded-lg p-2 flex items-center justify-center border border-gray-100">
                                            <img src="{{ asset('storage/' . $company->image) }}"
                                                class="max-h-full max-w-full object-contain filter grayscale hover:grayscale-0 transition-all">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <a href="{{ $company->url }}" target="_blank"
                                            class="text-[#6b66ff] hover:underline">{{ Str::limit($company->url, 20) }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button wire:click="toggleActive({{ $company->id }})"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $company->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $company->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <button wire:click="edit({{ $company->id }})"
                                            class="text-[#6b66ff] hover:text-[#5a56e6] font-semibold">Edit</button>
                                        <button wire:click="delete({{ $company->id }})"
                                            wire:confirm="Are you sure you want to delete this company?"
                                            class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 italic">
                                        No companies added yet. Start by adding one on the left.
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