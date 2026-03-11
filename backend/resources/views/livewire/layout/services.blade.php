@php
// Array of cinematic, premium tech/office background images for the slides
$cinematicImages = [
'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=2072',
'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&q=80&w=2070',
'https://images.unsplash.com/photo-1561070791-2526d30994b5?auto=format&fit=crop&q=80&w=2000',
'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2070',
'https://images.unsplash.com/photo-1558655146-d09347e92766?auto=format&fit=crop&q=80&w=2000',
];
@endphp

<section
    id="services"
    x-data="featureCarousel({{ count($services) }})"
    x-init="initCarousel()"
    @touchstart="touchStart=$event.touches[0].clientX"
    @touchend="handleSwipe($event.changedTouches[0].clientX)"
    class="relative w-full h-[75vh] min-h-[500px] max-h-[800px] overflow-hidden bg-gray-900 group font-sans"
    aria-label="Services Showcase">
    <!-- Slides -->
    @foreach($services as $index => $service)
    <div
        x-show="activeSlide === {{ $index }}"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 translate-x-8 rtl:-translate-x-8"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-500 absolute inset-0 z-0"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute inset-0 w-full h-full z-10"
        style="{{ $index === 0 ? '' : 'display: none;' }}">
        <!-- Cinematic Image Background (Uses high-res array if local image is an icon, or fallback) -->
        <img src="{{ asset('storage/'.$service->image) }}" alt="" {{ $cinematicImages[$index % count($cinematicImages)] }}"" class="absolute inset-0 w-full h-full object-cover">

        <!-- Subtle Contrast Overlays (No glows, no new colors) -->
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

        <!-- Content Container (Bottom-Start aligned, bound to grid) -->
        <div class="absolute inset-0 flex flex-col justify-end pb-16 md:pb-24">
            <div class="max-w-7xl mx-auto w-full px-6 lg:px-8">
                <div class="max-w-2xl text-start">

                    <h3 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 tracking-tight leading-tight">
                        {{ $service->title }}
                    </h3>

                    <p class="text-lg md:text-xl text-gray-200 mb-8 leading-relaxed line-clamp-2 md:line-clamp-none font-light">
                        {{ $service->description }}
                    </p>

                    <!-- Primary Call to Action -->
                    <a href="{{ route('services.show', $service->id) }}" class="group/btn inline-flex items-center rounded-lg justify-center px-8 py-4 text-sm uppercase tracking-widest font-semibold text-white bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-[var(--primary-color)]">
                        Explore Service

                        <!-- RTL Aware Icon Translation -->
                        <svg class="w-5 h-5 ms-3 transition-transform duration-300 group-hover/btn:translate-x-1 rtl:group-hover/btn:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Minimalist Nav Controls (Hidden on mobile touch devices, visible on hover for desktop) -->
    <div class="hidden md:block opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <button @click="prev()" aria-label="Previous Service" class="absolute rounded-lg top-1/2 -translate-y-1/2 start-4 lg:start-8 w-12 h-12 round flex items-center justify-center bg-white/5 hover:bg-white/15 backdrop-blur-md text-white border border-white/10 transition-colors z-30 focus:outline-none focus:ring-2 focus:ring-[var(--primary-color)]">
            <svg class="w-5 h-5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button @click="next()" aria-label="Next Service" class="absolute rounded-lg top-1/2 -translate-y-1/2 end-4 lg:end-8 w-12 h-12 flex items-center justify-center bg-white/5 hover:bg-white/15 backdrop-blur-md text-white border border-white/10 transition-colors z-30 focus:outline-none focus:ring-2 focus:ring-[var(--primary-color)]">
            <svg class="w-5 h-5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <!-- Elegant Indicator Dots -->
    <div class="absolute bottom-6 start-0 end-0 flex justify-center gap-2.5 z-30">
        @foreach($services as $index => $service)
        <button @click="goTo({{ $index }})"
            :aria-current="activeSlide === {{ $index }} ? 'true' : 'false'"
            :class="activeSlide === {{ $index }} ? 'bg-white w-8' : 'bg-white/40 hover:bg-white/70 w-2'"
            class="h-2 rounded-full transition-all duration-500 ease-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-[var(--primary-color)]"
            aria-label="Go to slide {{ $index + 1 }}">
        </button>
        @endforeach
    </div>

    <!-- Alpine Logic -->
    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            // Accept total slides via parameter to prevent blade formatting syntax errors
            Alpine.data('featureCarousel', (total) => ({
                activeSlide: 0,
                totalSlides: total,
                touchStart: 0,
                autoPlayInterval: null,

                initCarousel() {
                    this.startAutoPlay();
                    // Pause on hover
                    this.$el.addEventListener('mouseenter', () => clearInterval(this.autoPlayInterval));
                    this.$el.addEventListener('mouseleave', () => this.startAutoPlay());
                },

                startAutoPlay() {
                    this.autoPlayInterval = setInterval(() => {
                        this.next();
                    }, 6000);
                },

                next() {
                    this.activeSlide = this.activeSlide === this.totalSlides - 1 ? 0 : this.activeSlide + 1;
                },

                prev() {
                    this.activeSlide = this.activeSlide === 0 ? this.totalSlides - 1 : this.activeSlide - 1;
                },

                goTo(index) {
                    this.activeSlide = index;
                },

                handleSwipe(touchEnd) {
                    const threshold = 50;
                    // Account for RTL swipe direction automatically if dir="rtl" is on the document
                    const isRtl = document.documentElement.dir === 'rtl';
                    const diff = this.touchStart - touchEnd;

                    if (Math.abs(diff) > threshold) {
                        if (diff > 0) {
                            isRtl ? this.prev() : this.next(); // Swiped left
                        } else {
                            isRtl ? this.next() : this.prev(); // Swiped right
                        }
                    }
                }
            }))
        })
    </script>
    @endpush
</section>