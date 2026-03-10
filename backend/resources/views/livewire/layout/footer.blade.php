@php
use App\Models\Entity;
$entity = Entity::find(1);
@endphp

<footer class="bg-gray-50 border-t border-gray-200 font-sans relative overflow-hidden">


    <div class="max-w-6xl mx-auto px-6 py-16 space-y-12">

        {{-- TOP: Brand + Contact --}}
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-10">
            <div>
                <p class="text-[10px] tracking-[0.18em] uppercase text-primary mb-4">✦ Creative Agency</p>
                <h2 class="font-['Syne'] text-5xl font-extrabold text-gray-900 tracking-tight leading-none mb-3">
                    {{ $entity->name ?? config('app.name') }}<span class="text-primary font-['Fraunces'] italic font-normal">.</span>
                </h2>
                @if($entity?->slogan)
                <p class="text-gray-500 text-sm font-light italic">"{{ $entity->slogan }}"</p>
                @endif

            </div>

            <div class="flex flex-col gap-3">
                @if($entity?->email)
                <a href="mailto:{{ $entity->email }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 hover:bg-primary/5 transition-all">
                    <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-sm text-gray-700">{{ $entity->email }}</span>
                </a>

                @endif
                @if($entity?->phone)
                <div class="flex items-center gap-3 rounded-2xl px-4 py-3">
                    <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center text-primary shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <span class="text-sm text-gray-700">{{ $entity->phone }}</span>
                </div>

                @endif
            </div>
        </div>

        {{-- MID: Address + Links --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 py-10 border-t border-b border-gray-200">
            <div>
                <p class="text-[10px] uppercase tracking-widest text-gray-400 font-semibold mb-4">Location</p>
                <p class="text-sm text-gray-500 leading-relaxed font-light italic">{{ $entity?->address ?? '—' }}</p>
            </div>


        </div>

        {{-- BOTTOM: Copyright + Socials --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-xs text-gray-400">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <div class="flex items-center gap-2">
                @foreach([
                ['Twitter', 'M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.844'],
                ['LinkedIn', 'M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z'],
                ['Instagram', 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z'],
                ] as [$label, $path])
                <a href="#" aria-label="{{ $label }}" class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 hover:text-primary hover:border-primary/40 hover:-translate-y-0.5 transition-all">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="{{ $path }}" />
                    </svg>
                </a>

                @endforeach
            </div>
        </div>

    </div>
</footer>