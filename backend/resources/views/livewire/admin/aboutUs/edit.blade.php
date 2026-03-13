<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-8">

        {{-- Page Header --}}
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Edit About Us Page</h1>
            <p class="text-sm text-gray-500 mt-1">Update the content displayed on the About Us page.</p>
        </div>

        {{-- ─── HERO SECTION ─── --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
            <div class="p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <span class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </span>
                    Hero Section
                </h2>

                <form wire:submit.prevent="update" class="space-y-5">
                    {{-- Hero Title --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Hero Title</label>
                        <input type="text" wire:model="hero_title"
                            class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary">
                        @error('hero_title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- Hero Subtitle --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Hero Subtitle</label>
                        <textarea wire:model="hero_subtitle" rows="3"
                            class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary"></textarea>
                        @error('hero_subtitle')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    {{-- Hero Image --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Hero Image (Fallback / Legacy)</label>
                        <input type="file" wire:model="newHeroImage" accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                        @error('newHeroImage')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror

                        @if($newHeroImage)
                            <div class="mt-3">
                                <p class="text-xs text-gray-500 mb-1">Preview:</p>
                                <img src="{{ $newHeroImage->temporaryUrl() }}" class="h-32 rounded-xl shadow-md object-cover">
                            </div>
                        @elseif($existingHeroImage)
                            <div class="mt-3">
                                <p class="text-xs text-gray-500 mb-1">Current Image:</p>
                                <img src="{{ asset('storage/' . $existingHeroImage) }}" class="h-32 rounded-xl shadow-md object-cover">
                            </div>
                        @endif
                    </div>

                    <div class="border-t border-gray-100 my-8"></div>

                    <h3 class="text-md font-bold text-gray-900 mb-4 flex items-center gap-2">SaaS Storytelling Media & Content</h3>

                    <div class="grid grid-cols-2 gap-4">
                        {{-- Label --}}
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Section Label <span class="text-xs text-gray-400 font-normal">(e.g. "Our Story")</span></label>
                            <input type="text" wire:model="label"
                                class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary">
                        </div>

                        {{-- Media Type --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Media Type</label>
                            <select wire:model.live="media_type" 
                                class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary">
                                <option value="image">Cloudinary Image</option>
                                <option value="video">Cloudinary Video</option>
                            </select>
                        </div>

                        {{-- Media URL / Upload --}}
                        <div x-data="{ type: @entangle('media_type') }">
                            <label class="block text-sm font-medium text-gray-700 mb-1" x-text="type === 'video' ? 'Upload Cloudinary Video' : 'Cloudinary Image URL'"></label>
                            
                            <!-- Image URL Input -->
                            <div x-show="type === 'image'">
                                <input type="url" wire:model="media_url" placeholder="https://res.cloudinary.com/..."
                                    class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary text-sm">
                            </div>

                            <!-- Video Upload Input -->
                            <div x-show="type === 'video'" x-cloak>
                                <input type="file" wire:model="newMediaVideo" accept="video/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                @error('newMediaVideo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                <div wire:loading wire:target="newMediaVideo" class="mt-2 text-sm text-primary">Uploading video...</div>
                            </div>
                        </div>
                        </div>
                    </div>

                    {{-- Bullets --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Supporting Points <span class="text-xs text-gray-400 font-normal">(Optional bullet points)</span></label>
                        <div class="space-y-3">
                            <input type="text" wire:model="bullet1" placeholder="Bullet point 1 (e.g. Expert creative teams)"
                                class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary text-sm">
                            <input type="text" wire:model="bullet2" placeholder="Bullet point 2 (e.g. Fast project delivery)"
                                class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary text-sm">
                            <input type="text" wire:model="bullet3" placeholder="Bullet point 3 (e.g. Scalable digital services)"
                                class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary text-sm">
                        </div>
                    </div>

                    <div class="border-t border-gray-100 my-8"></div>

                    {{-- CTA --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">CTA Button Text</label>
                            <input type="text" wire:model="cta_text"
                                class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">CTA Button URL</label>
                            <input type="text" wire:model="cta_url"
                                class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary">
                        </div>
                    </div>

                    {{-- Stats --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Statistics</label>
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach([1,2,3,4] as $i)
                            <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                                <p class="text-xs font-semibold text-gray-500 uppercase">Stat {{ $i }}</p>
                                <input type="text" wire:model="stat{{ $i }}_number" placeholder="e.g. 200+"
                                    class="block w-full rounded-lg border-gray-200 text-sm focus:border-primary focus:ring-primary">
                                <input type="text" wire:model="stat{{ $i }}_label" placeholder="e.g. Projects Done"
                                    class="block w-full rounded-lg border-gray-200 text-sm focus:border-primary focus:ring-primary">
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Mission / Vision / Values --}}
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700">Mission / Vision / Values</label>

                        @foreach([
                            ['title' => 'mission_title', 'desc' => 'mission_description', 'label' => 'Mission'],
                            ['title' => 'vision_title', 'desc' => 'vision_description', 'label' => 'Vision'],
                            ['title' => 'values_title', 'desc' => 'values_description', 'label' => 'Values'],
                        ] as $card)
                        <div class="bg-gray-50 rounded-xl p-4 grid grid-cols-3 gap-4 items-start">
                            <div>
                                <label class="text-xs text-gray-500 mb-1 block">{{ $card['label'] }} Title</label>
                                <input type="text" wire:model="{{ $card['title'] }}"
                                    class="block w-full rounded-lg border-gray-200 text-sm focus:border-primary focus:ring-primary">
                            </div>
                            <div class="col-span-2">
                                <label class="text-xs text-gray-500 mb-1 block">{{ $card['label'] }} Description</label>
                                <textarea wire:model="{{ $card['desc'] }}" rows="2"
                                    class="block w-full rounded-lg border-gray-200 text-sm focus:border-primary focus:ring-primary"></textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit"
                            class="group inline-flex items-center px-6 py-3 text-base font-semibold text-white bg-primary hover:bg-secondary rounded-xl transition-all shadow-lg hover:shadow-xl hover:scale-105">
                            <svg wire:loading wire:target="update" class="animate-spin mr-2 w-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            Save Changes
                            <svg wire:loading.remove wire:target="update" class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ─── HOW WE WORK STEPS ─── --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
            <div class="p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <span class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </span>
                    How We Work – Steps
                </h2>

                {{-- Existing Steps --}}
                @if(count($steps) > 0)
                <div class="space-y-3 mb-6">
                    @foreach($steps as $step)
                    <div class="flex items-start gap-4 bg-gray-50 rounded-xl p-4">
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                            <span class="text-sm font-bold text-primary">{{ $step['step_number'] }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-900 text-sm">{{ $step['title'] }}</p>
                            <p class="text-gray-500 text-xs mt-0.5 line-clamp-2">{{ $step['description'] }}</p>
                        </div>
                        <button wire:click="deleteStep({{ $step['id'] }})" wire:confirm="Delete this step?"
                            class="shrink-0 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg p-1.5 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-400 text-sm mb-6">No steps yet. Add your first step below.</p>
                @endif

                {{-- Add New Step --}}
                <div class="border-t border-gray-100 pt-6">
                    <p class="text-sm font-medium text-gray-700 mb-4">Add New Step</p>
                    <div class="space-y-3">
                        <input type="text" wire:model="newStepTitle" placeholder="Step title (e.g. Discovery &amp; Research)"
                            class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary text-sm">
                        <textarea wire:model="newStepDescription" placeholder="Brief description of this step..." rows="2"
                            class="block w-full rounded-xl border-gray-200 shadow-sm focus:border-primary focus:ring-primary text-sm"></textarea>
                        <button wire:click="addStep"
                            class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-primary hover:bg-secondary rounded-xl transition-all shadow hover:shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Add Step
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    window.addEventListener('alert', event => {
        alert(event.detail.message);
    });
</script>
