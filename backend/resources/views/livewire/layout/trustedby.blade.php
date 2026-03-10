<section class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 mb-10 text-center">
        <h3 class="text-sm font-semibold uppercase tracking-widest text-primary/60 mb-2">Trusted by Industry Leaders
        </h3>
        <div class="w-12 h-1 bg-primary mx-auto rounded-full"></div>
    </div>

    <!-- Infinite Scroll Wrapper -->
    <div class="relative flex overflow-hidden group">
        <!-- Overlay Gradients for smooth fade edges -->
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none">
        </div>
        <div
            class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none">
        </div>

        <!-- Scrolling Content -->
        <div class="flex animate-infinite-scroll whitespace-nowrap items-center py-4 group-hover:pause-animation">
            <!-- First Set -->
            @foreach($companies as $company)
            <div class="mx-12 flex-shrink-0 transition-all duration-300 hover:scale-110">
                <a href="{{ $company->url }}" target="_blank" title="{{ $company->name }}">
                    <img src="{{ asset('storage/' . $company->image) }}" alt="{{ $company->name }}"
                        class="h-10 w-auto object-contain filter grayscale hover:grayscale-0 transition-all duration-500 opacity-60 hover:opacity-100">
                </a>
            </div>
            @endforeach

            <!-- Duplicate Set for Seamless Loop -->
            @foreach($companies as $company)
            <div class="mx-12 flex-shrink-0 transition-all duration-300 hover:scale-110">
                <a href="{{ $company->url }}" target="_blank" title="{{ $company->name }}">
                    <img src="{{ asset('storage/' . $company->image) }}" alt="{{ $company->name }}"
                        class="h-10 w-auto object-contain filter grayscale hover:grayscale-0 transition-all duration-500 opacity-60 hover:opacity-100">
                </a>
            </div>
            @endforeach
            <!-- Duplicate Set for Seamless Loop -->
            @foreach($companies as $company)
            <div class="mx-12 flex-shrink-0 transition-all duration-300 hover:scale-110">
                <a href="{{ $company->url }}" target="_blank" title="{{ $company->name }}">
                    <img src="{{ asset('storage/' . $company->image) }}" alt="{{ $company->name }}"
                        class="h-10 w-auto object-contain filter grayscale hover:grayscale-0 transition-all duration-500 opacity-60 hover:opacity-100">
                </a>
            </div>
            @endforeach
            <!-- Duplicate Set for Seamless Loop -->
            @foreach($companies as $company)
            <div class="mx-12 flex-shrink-0 transition-all duration-300 hover:scale-110">
                <a href="{{ $company->url }}" target="_blank" title="{{ $company->name }}">
                    <img src="{{ asset('storage/' . $company->image) }}" alt="{{ $company->name }}"
                        class="h-10 w-auto object-contain filter grayscale hover:grayscale-0 transition-all duration-500 opacity-60 hover:opacity-100">
                </a>
            </div>
            @endforeach
        </div>
    </div>

    @push('styles')
    <style>
        @keyframes infinite-scroll {
            0% {
                transform: translateX(0%);
                animation-timing-function: ease-in-out;
            }


            50% {
                transform: translateX(-100%);
                animation-timing-function: ease-in-out;
            }
        }

        .scroll-wrapper {
            display: flex;
            width: max-content;
        }

        .scroll-content {
            display: flex;
            flex-shrink: 0;
        }

        .animate-infinite-scroll {
            animation: infinite-scroll 30s linear infinite;
            will-change: transform;
        }

        /* Pause on hover */
        .group:hover .animate-infinite-scroll {
            animation-play-state: paused;
        }

        /* Responsive speed */
        @media (max-width: 768px) {
            @keyframes infinite-scroll {
                0% {
                    transform: translateX(0%);
                    animation-timing-function: ease-in-out;
                }


                50% {
                    transform: translateX(-100%);
                    animation-timing-function: ease-in-out;
                }
            }

            .animate-infinite-scroll {
                animation-duration: 30s;

                animation-timing-function: ease-in-out;
            }
        }
    </style>
    @endpush
</section>