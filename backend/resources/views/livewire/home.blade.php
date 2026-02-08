<x-app-layout>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white pt-20 pb-32">
        <!-- Dashed Grid Background -->
        <div class="absolute inset-0 z-0 pointer-events-none" style="
                background-image: 
                    linear-gradient(to right, #e7e5e4 1px, transparent 1px),
                    linear-gradient(to bottom, #e7e5e4 1px, transparent 1px);
                background-size: 20px 20px;
                background-position: 0 0, 0 0;
                mask-image: 
                    repeating-linear-gradient(to right, black 0px, black 3px, transparent 3px, transparent 8px),
                    repeating-linear-gradient(to bottom, black 0px, black 3px, transparent 3px, transparent 8px);
                -webkit-mask-image: 
                    repeating-linear-gradient(to right, black 0px, black 3px, transparent 3px, transparent 8px),
                    repeating-linear-gradient(to bottom, black 0px, black 3px, transparent 3px, transparent 8px);
                mask-composite: intersect;
                -webkit-mask-composite: source-in;
            ">
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-8 animate-fade-in-up">


                    <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 leading-tight tracking-tight">
                        {{ $home->title ?? 'Grow Your Potential Through Design & Innovation' }}
                    </h1>

                    <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                        {{ $home->subtitle ?? 'Helping brands rise through design, tech, and influence. We build transformative digital experiences that elevate your business..' }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ $home->button_url ?? route('register') }}"
                            class="group inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white bg-[#6b66ff] hover:bg-[#5a56e6] rounded-xl transition-all shadow-lg hover:shadow-xl hover:scale-105">
                            {{ $home->button_text ?? 'Get started free' }}
                            <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="#demo"
                            class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-gray-900 bg-white hover:bg-gray-50 rounded-xl transition-all border-2 border-gray-200 hover:border-gray-300">
                            {{ $home->button_url ?? 'Get started free' }}
                        </a>
                    </div>



                </div>

                <!-- Right Visual -->
                <div class="relative lg:pl-8 animate-fade-in" style="animation-delay: 0.2s;">
                    @if($home->image)
                        <div class="relative aspect-square max-w-lg mx-auto">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-[#e8e7ff] to-[#f4f4ff] rounded-3xl transform rotate-6 opacity-50">
                            </div>
                            <div class="relative bg-white rounded-3xl shadow-2xl p-2 border border-gray-100">
                                <img src="{{ asset('storage/' . $home->image) }}" alt="{{ $home->title }}"
                                    class="w-full h-full object-cover rounded-2xl">
                            </div>
                        </div>
                    @else
                        <div class="relative aspect-square max-w-lg mx-auto">
                            <!-- 3D Card Visualization -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-[#e8e7ff] to-[#f4f4ff] rounded-3xl transform rotate-6 opacity-50">
                            </div>
                            <div class="relative bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                                <!-- Device Preview -->
                                <div class="space-y-4">
                                    <div class="h-3 w-3/4 bg-gray-200 rounded animate-pulse"></div>
                                    <div class="h-3 w-full bg-gray-100 rounded animate-pulse"
                                        style="animation-delay: 0.1s;"></div>
                                    <div class="h-3 w-5/6 bg-gray-100 rounded animate-pulse" style="animation-delay: 0.2s;">
                                    </div>

                                    <div class="pt-6 space-y-3">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-[#6b66ff] rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-1 space-y-2">
                                                <div class="h-2 w-24 bg-gray-200 rounded"></div>
                                                <div class="h-2 w-16 bg-gray-100 rounded"></div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3 opacity-75">
                                            <div class="w-12 h-12 bg-gray-100 rounded-xl"></div>
                                            <div class="flex-1 space-y-2">
                                                <div class="h-2 w-24 bg-gray-200 rounded"></div>
                                                <div class="h-2 w-16 bg-gray-100 rounded"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Background Elements -->
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-[#e8e7ff] rounded-full filter blur-3xl opacity-20 animate-float">
        </div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 rounded-full filter blur-3xl opacity-20 animate-float"
            style="animation-delay: 1s;"></div>
    </section>
    <!-- trusted by section-->
    <livewire:layout.trustedby />


    <!-- representing services -->
    <livewire:layout.services />

    @push('styles')
        <style>
            @keyframes fade-in-up {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fade-in {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0) translateX(0);
                }

                50% {
                    transform: translateY(-20px) translateX(10px);
                }
            }

            .animate-fade-in-up {
                animation: fade-in-up 0.8s ease-out;
            }

            .animate-fade-in {
                animation: fade-in 0.8s ease-out;
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
        </style>
    @endpush
</x-app-layout>