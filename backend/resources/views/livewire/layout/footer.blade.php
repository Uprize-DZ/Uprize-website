@php
use App\Models\Entity;
$entity = Entity::find(1);
@endphp

<footer class="bg-gray-50 border-t border-gray-100 mt-auto font-sans">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">

        {{-- Section 1: Brand & Contact Identity --}}
        @if($entity)
        <div class="mb-16">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 pb-12">
                <div class="max-w-2xl">
                    <span class="inline-block px-3 py-1 rounded-full text-[10px] font-bold tracking-[0.2em] uppercase bg-indigo-600 text-white mb-6">
                        Established Presence
                    </span>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight mb-4">
                        {{ $entity->name }}<span class="text-indigo-600">.</span>
                    </h2>
                    @if($entity->slogan)
                    <p class="text-xl font-medium text-gray-500 italic mb-6">
                        "{{ $entity->slogan }}"
                    </p>
                    @endif
                    @if($entity->description)
                    <p class="text-gray-600 leading-relaxed text-lg">
                        {{ $entity->description }}
                    </p>
                    @endif
                </div>

                {{-- Floating Contact Badges --}}
                <div class="flex flex-wrap gap-3">
                    @if($entity->email)
                    <a href="mailto:{{ $entity->email }}" class="flex items-center gap-2 bg-white border border-gray-200 px-4 py-2 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-300 transition-all group">
                        <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">{{ $entity->email }}</span>
                    </a>
                    @endif

                    @if($entity->phone)
                    <div class="flex items-center gap-2 bg-white border border-gray-200 px-4 py-2 rounded-2xl shadow-sm">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">{{ $entity->phone }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif

        {{-- Section 2: Navigation Links --}}
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-12 mb-16 mt-10" style="margin-top: 3rem;">
            {{-- Column: Navigation --}}
            <div class="col-span-2 lg:col-span-1">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">Address</h3>
                <p class="text-sm text-gray-600 leading-6 italic">
                    {{ $entity->address ?? 'Headquarters Location' }}
                </p>
            </div>

            <div>
                <h3 class="text-xs font-bold text-gray-900 uppercase tracking-widest mb-6 font-mono">Company</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-indigo-600 hover:translate-x-1 inline-block transition-all">Our Story</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-indigo-600 hover:translate-x-1 inline-block transition-all">Careers</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-indigo-600 hover:translate-x-1 inline-block transition-all">Press Kit</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-bold text-gray-900 uppercase tracking-widest mb-6 font-mono">Resources</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-indigo-600 hover:translate-x-1 inline-block transition-all">Documentation</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-indigo-600 hover:translate-x-1 inline-block transition-all">Help Center</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-indigo-600 hover:translate-x-1 inline-block transition-all">Community</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-bold text-gray-900 uppercase tracking-widest mb-6 font-mono">Legal</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-indigo-600 hover:translate-x-1 inline-block transition-all">Privacy Policy</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-indigo-600 hover:translate-x-1 inline-block transition-all">Terms of Service</a></li>
                </ul>
            </div>
        </div>

        {{-- Section 3: Bottom Bar --}}
        <div class="pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-4">
                    <p class="text-xs font-medium text-gray-400">
                        &copy; {{ date('Y') }} {{ config('app.name') }}. Built with precision.
                    </p>
                </div>

                {{-- Social Icons --}}
                <div class="flex items-center gap-4">
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-white border border-gray-200 text-gray-400 hover:text-indigo-600 hover:border-indigo-600 hover:-translate-y-1 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-white border border-gray-200 text-gray-400 hover:text-blue-700 hover:border-blue-700 hover:-translate-y-1 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                        </svg>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-full bg-white border border-gray-200 text-gray-400 hover:text-black hover:border-black hover:-translate-y-1 transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>