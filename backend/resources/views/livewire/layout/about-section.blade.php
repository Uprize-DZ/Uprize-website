<div id="about-us">

    <!-- Premium Storytelling Block -->
    <section class="py-24 lg:py-32 bg-white overflow-hidden relative" dir="auto">
        <livewire:layout.background></livewire:layout.background>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

                <!-- Text Content -->
                <div class="flex flex-col justify-center text-start">

                    @if($aboutUs->label)
                    <div class="mb-6">
                        <span class="inline-flex items-center rounded-full bg-[var(--primary-color)]/10 px-3 py-1 text-sm font-medium text-[var(--primary-color)] ring-1 ring-inset ring-[var(--primary-color)]/20">
                            {{ $aboutUs->label }}
                        </span>
                    </div>
                    @endif

                    <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-gray-900 mb-6 leading-tight">
                        {{ $aboutUs->hero_title ?? 'We build digital services that help brands move faster.' }}
                    </h2>

                    <div class="text-lg text-gray-600 space-y-6 leading-relaxed">
                        @php
                        $paragraphs = explode("\n", $aboutUs->hero_subtitle ?? "We exist to solve complex digital challenges.\n\nOur team delivers scalable, high-performance solutions tailored to your brand's unique needs.");
                        @endphp
                        @foreach(array_filter($paragraphs) as $paragraph)
                        <p>{{ trim($paragraph) }}</p>
                        @endforeach
                    </div>

                    <!-- Bullets -->
                    @if($aboutUs->bullet1 || $aboutUs->bullet2 || $aboutUs->bullet3)
                    <ul class="mt-10 space-y-4">
                        @foreach(['bullet1', 'bullet2', 'bullet3'] as $bulletField)
                        @if($aboutUs->$bulletField)
                        <li class="flex items-start gap-3">
                            <svg class="h-6 w-6 flex-shrink-0 text-[var(--primary-color)]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-base text-gray-700 font-medium">{{ $aboutUs->$bulletField }}</span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                </div>

                <!-- Media Content -->
                <div class="relative w-full aspect-[4/3] lg:aspect-square rounded-2xl overflow-hidden bg-gray-50 shadow-2xl ring-1 ring-gray-900/5">
                    @if($aboutUs->media_type === 'video' && $aboutUs->media_url)
                    <video
                        src="{{ $aboutUs->media_url }}"
                        class="absolute inset-0 w-full h-full object-cover"
                        autoplay
                        muted
                        loop
                        playsinline>
                    </video>
                    @elseif($aboutUs->media_type === 'image' && ($aboutUs->media_url || $aboutUs->hero_image))
                    <img
                        src="{{ $aboutUs->media_url ?? asset('storage/' . $aboutUs->hero_image) }}"
                        alt="About Us"
                        class="absolute inset-0 w-full h-full object-cover">
                    @else
                    <!-- Fallback placeholder -->
                    <div class="absolute inset-0 flex items-center justify-center text-gray-300">
                        <svg class="w-24 h-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    @endif
                    <div class="absolute inset-0 ring-1 ring-inset ring-black/10 rounded-2xl pointer-events-none"></div>
                </div>

            </div>
        </div>
    </section>

    {{-- ───────────────────────────── STATS ───────────────────────────── --}}
    @php
    $stats = collect([
        ['number' => $aboutUs->stat1_number, 'label' => $aboutUs->stat1_label, 'active' => $aboutUs->stat1_is_active],
        ['number' => $aboutUs->stat2_number, 'label' => $aboutUs->stat2_label, 'active' => $aboutUs->stat2_is_active],
        ['number' => $aboutUs->stat3_number, 'label' => $aboutUs->stat3_label, 'active' => $aboutUs->stat3_is_active],
        ['number' => $aboutUs->stat4_number, 'label' => $aboutUs->stat4_label, 'active' => $aboutUs->stat4_is_active],
    ])->filter(fn($s) => $s['number'] !== null && $s['number'] !== '' && $s['active']);
    @endphp

    @if($stats->count() > 0)
    <section class="py-24 relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
        <!-- Floating elements to match home -->
        <div class="absolute top-0 right-1/4 w-72 h-72 bg-[#e8e7ff] rounded-full filter blur-3xl opacity-30 animate-pulse" style="animation-duration: 4s;"></div>
        <div class="absolute bottom-0 left-1/4 w-72 h-72 bg-purple-50 rounded-full filter blur-3xl opacity-30 animate-pulse" style="animation-duration: 5s; animation-delay: 2s;"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($stats as $stat)
                <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 p-8 border border-gray-100 text-center hover:-translate-y-2 transition-transform duration-300">
                    <div class="text-4xl lg:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600 mb-4 drop-shadow-sm">
                        {{ $stat['number'] }}
                    </div>
                    <div class="text-sm font-bold text-gray-500 uppercase tracking-widest">
                        {{ $stat['label'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ───────────────────────────── MISSION / VISION / VALUES ───────────────────────────── --}}
    <section class="py-24 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full text-sm font-semibold text-primary tracking-wide uppercase mb-4">Our Foundation</span>
                <h2 class="text-4xl font-bold text-gray-900">Driven by Purpose</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Mission --}}
                @if($aboutUs->mission_is_active ?? true)
                <div class="group bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    <div class="relative z-10">
                        @if($aboutUs->mission_image)
                        <div class="mb-6 w-16 h-16 rounded-2xl overflow-hidden shadow-sm ring-1 ring-black/5 bg-gray-50 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $aboutUs->mission_image) }}" alt="Mission" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-16 h-16 bg-blue-50 group-hover:bg-primary rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                            <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $aboutUs->mission_title ?? 'Our Mission' }}</h3>
                        <p class="text-gray-500 leading-relaxed">{{ $aboutUs->mission_description ?? 'To empower businesses of all sizes through high-impact design, cutting-edge technology, and strategic digital solutions that drive real results.' }}</p>
                    </div>
                </div>
                @endif

                {{-- Vision --}}
                @if($aboutUs->vision_is_active ?? true)
                <div class="group bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-purple-900/5 transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-purple-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    <div class="relative z-10">
                        @if($aboutUs->vision_image)
                        <div class="mb-6 w-16 h-16 rounded-2xl overflow-hidden shadow-sm ring-1 ring-black/5 bg-gray-50 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $aboutUs->vision_image) }}" alt="Vision" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-16 h-16 bg-purple-50 group-hover:bg-primary rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                            <svg class="w-8 h-8 text-purple-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $aboutUs->vision_title ?? 'Our Vision' }}</h3>
                        <p class="text-gray-500 leading-relaxed">{{ $aboutUs->vision_description ?? 'To be the leading creative agency that transforms ideas into impactful digital experiences, setting new standards for excellence in the industry.' }}</p>
                    </div>
                </div>
                @endif

                {{-- Values --}}
                @if($aboutUs->values_is_active ?? true)
                <div class="group bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-green-900/5 transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-green-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    <div class="relative z-10">
                        @if($aboutUs->values_image)
                        <div class="mb-6 w-16 h-16 rounded-2xl overflow-hidden shadow-sm ring-1 ring-black/5 bg-gray-50 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $aboutUs->values_image) }}" alt="Values" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-16 h-16 bg-green-50 group-hover:bg-primary rounded-2xl flex items-center justify-center mb-6 transition-all duration-300 shadow-sm">
                            <svg class="w-8 h-8 text-green-600 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $aboutUs->values_title ?? 'Our Values' }}</h3>
                        <p class="text-gray-500 leading-relaxed">{{ $aboutUs->values_description ?? 'Integrity, innovation, and client-first thinking guide every decision we make. We believe in transparent communication and delivering excellence without compromise.' }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ───────────────────────────── HOW WE WORK ───────────────────────────── --}}
    @if(isset($steps) && count($steps) > 0)
    <section class="py-24 bg-slate-50 border-t border-gray-100">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 rounded-full text-sm font-semibold text-primary tracking-wide uppercase mb-4">Our Process</span>
                <h2 class="text-4xl font-bold text-gray-900">How We Work</h2>
                <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">A transparent, collaborative process designed to bring your vision to life efficiently and effectively.</p>
            </div>

            <div class="relative">
                {{-- Connecting line --}}
                <div class="hidden lg:block absolute top-[2.5rem] left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>

                <div class="grid md:grid-cols-2 lg:grid-cols-{{ min(count($steps), 4) }} gap-8 lg:gap-12 relative z-10 w-full pt-4">
                    @foreach($steps as $index => $step)
                    <div class="relative group cursor-default hover:-translate-y-2 transition-transform duration-300">
                        {{-- Step number circle --}}
                        <div class="relative z-20 w-16 h-16 bg-white group-hover:bg-primary rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-md group-hover:shadow-xl group-hover:shadow-primary/20 ring-1 ring-primary/10 group-hover:ring-primary transition-all duration-300 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent group-hover:opacity-0 transition-opacity"></div>
                            <span class="relative text-2xl font-bold text-primary group-hover:text-white transition-colors duration-300">
                                {{ $step['step_number'] ?? ($index + 1) }}
                            </span>
                        </div>
                        <div class="text-center bg-white p-8 rounded-2xl shadow-sm border border-gray-100 group-hover:shadow-xl group-hover:border-primary/10 transition-all duration-300 relative z-20 h-full">
                            <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors duration-300">{{ $step['title'] }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">{{ $step['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif


</div>