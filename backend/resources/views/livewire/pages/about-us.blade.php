<x-app-layout>

    {{-- ───────────────────────────── HERO ───────────────────────────── --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white pt-20 pb-32">
        <livewire:layout.background></livewire:layout.background>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                {{-- Left Content --}}
                <div class="space-y-8 animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full">
                        <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                        <span class="text-sm font-semibold text-primary tracking-wide uppercase">About Us</span>
                    </div>

                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight tracking-tight">
                        {{ $aboutUs->hero_title ?? 'Who We Are &amp; What We Stand For' }}
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                        {{ $aboutUs->hero_subtitle ?? 'We are a passionate team of designers, developers, and strategists dedicated to elevating your brand through innovation and creativity.' }}
                    </p>

                    @if($aboutUs->cta_text)
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ $aboutUs->cta_url ?? '#' }}"
                            class="group inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white bg-primary hover:bg-secondary rounded-xl transition-all shadow-lg hover:shadow-xl hover:scale-105">
                            {{ $aboutUs->cta_text }}
                            <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                    @endif
                </div>

                {{-- Right Visual --}}
                <div class="relative lg:pl-8 animate-fade-in" style="animation-delay: 0.2s;">
                    @if($aboutUs->hero_image)
                    <div class="relative aspect-square max-w-lg mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#e8e7ff] to-[#f4f4ff] rounded-3xl transform rotate-6 opacity-50"></div>
                        <div class="relative bg-white rounded-3xl shadow-2xl p-2 border border-gray-100">
                            <img src="{{ asset('storage/' . $aboutUs->hero_image) }}" alt="{{ $aboutUs->hero_title }}"
                                class="w-full h-full object-cover rounded-2xl">
                        </div>
                    </div>
                    @else
                    <div class="relative aspect-square max-w-lg mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#e8e7ff] to-[#f4f4ff] rounded-3xl transform rotate-6 opacity-50"></div>
                        <div class="relative bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 flex items-center justify-center">
                            <div class="text-center space-y-4">
                                <div class="w-24 h-24 bg-primary/10 rounded-3xl flex items-center justify-center mx-auto">
                                    <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-400 font-medium text-sm">Your Team Photo Here</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Background blobs --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-[#e8e7ff] rounded-full filter blur-3xl opacity-20 animate-float"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 rounded-full filter blur-3xl opacity-20 animate-float" style="animation-delay: 1s;"></div>
    </section>

    {{-- ───────────────────────────── STATS ───────────────────────────── --}}
    @php
        $stats = collect([
            ['number' => $aboutUs->stat1_number, 'label' => $aboutUs->stat1_label],
            ['number' => $aboutUs->stat2_number, 'label' => $aboutUs->stat2_label],
            ['number' => $aboutUs->stat3_number, 'label' => $aboutUs->stat3_label],
            ['number' => $aboutUs->stat4_number, 'label' => $aboutUs->stat4_label],
        ])->filter(fn($s) => !empty($s['number']));

        $defaultStats = [
            ['number' => '5+', 'label' => 'Years of Experience'],
            ['number' => '200+', 'label' => 'Projects Delivered'],
            ['number' => '50+', 'label' => 'Happy Clients'],
            ['number' => '15+', 'label' => 'Team Members'],
        ];
        $displayStats = $stats->count() ? $stats : collect($defaultStats);
    @endphp

    <section class="py-16 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($displayStats as $stat)
                <div class="text-center group">
                    <div class="text-4xl lg:text-5xl font-bold text-primary group-hover:scale-110 transition-transform duration-300">
                        {{ $stat['number'] }}
                    </div>
                    <div class="mt-2 text-sm font-medium text-gray-500 uppercase tracking-wide">
                        {{ $stat['label'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ───────────────────────────── MISSION / VISION / VALUES ───────────────────────────── --}}
    <section class="py-24 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full text-sm font-semibold text-primary tracking-wide uppercase mb-4">Our Foundation</span>
                <h2 class="text-4xl font-bold text-gray-900">Driven by Purpose</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Mission --}}
                <div class="group bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-all hover:-translate-y-1">
                    <div class="w-14 h-14 bg-blue-50 group-hover:bg-primary rounded-2xl flex items-center justify-center mb-6 transition-all">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $aboutUs->mission_title ?? 'Our Mission' }}</h3>
                    <p class="text-gray-500 leading-relaxed">{{ $aboutUs->mission_description ?? 'To empower businesses of all sizes through high-impact design, cutting-edge technology, and strategic digital solutions that drive real results.' }}</p>
                </div>

                {{-- Vision --}}
                <div class="group bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-all hover:-translate-y-1">
                    <div class="w-14 h-14 bg-purple-50 group-hover:bg-primary rounded-2xl flex items-center justify-center mb-6 transition-all">
                        <svg class="w-7 h-7 text-purple-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $aboutUs->vision_title ?? 'Our Vision' }}</h3>
                    <p class="text-gray-500 leading-relaxed">{{ $aboutUs->vision_description ?? 'To be the leading creative agency that transforms ideas into impactful digital experiences, setting new standards for excellence in the industry.' }}</p>
                </div>

                {{-- Values --}}
                <div class="group bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-lg transition-all hover:-translate-y-1">
                    <div class="w-14 h-14 bg-green-50 group-hover:bg-primary rounded-2xl flex items-center justify-center mb-6 transition-all">
                        <svg class="w-7 h-7 text-green-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $aboutUs->values_title ?? 'Our Values' }}</h3>
                    <p class="text-gray-500 leading-relaxed">{{ $aboutUs->values_description ?? 'Integrity, innovation, and client-first thinking guide every decision we make. We believe in transparent communication and delivering excellence without compromise.' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ───────────────────────────── HOW WE WORK ───────────────────────────── --}}
    @if($steps->count() > 0)
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full text-sm font-semibold text-primary tracking-wide uppercase mb-4">Our Process</span>
                <h2 class="text-4xl font-bold text-gray-900">How We Work</h2>
                <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">A transparent, collaborative process designed to bring your vision to life efficiently and effectively.</p>
            </div>

            <div class="relative">
                {{-- Connecting line --}}
                <div class="hidden lg:block absolute top-10 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>

                <div class="grid md:grid-cols-2 lg:grid-cols-{{ min($steps->count(), 4) }} gap-8">
                    @foreach($steps as $index => $step)
                    <div class="relative group">
                        {{-- Step number circle --}}
                        <div class="relative z-10 w-20 h-20 bg-white border-2 border-primary/20 group-hover:border-primary group-hover:bg-primary rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-sm transition-all duration-300">
                            <span class="text-2xl font-bold text-primary group-hover:text-white transition-colors">
                                {{ $step->step_number ?? ($index + 1) }}
                            </span>
                        </div>
                        <div class="text-center">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $step->title }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $step->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- ───────────────────────────── CTA ───────────────────────────── --}}
    <section class="py-20 bg-gradient-to-br from-primary to-secondary relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl translate-x-1/2 translate-y-1/2"></div>
        </div>
        <div class="max-w-4xl mx-auto px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Ready to Work Together?</h2>
            <p class="text-white/80 text-xl mb-10">Let's create something extraordinary. Tell us about your project and let's get started.</p>
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 px-8 py-4 bg-white text-primary font-semibold rounded-xl hover:bg-gray-50 transition-all shadow-lg hover:shadow-xl hover:scale-105">
                Get Started Today
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

    @push('styles')
    <style>
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-20px) translateX(10px); }
        }
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out; }
        .animate-fade-in { animation: fade-in 0.8s ease-out; }
        .animate-float { animation: float 6s ease-in-out infinite; }
    </style>
    @endpush

</x-app-layout>
