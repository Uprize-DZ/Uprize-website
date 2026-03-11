<section class="py-16 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 mb-10 text-center">
        <h3 class="text-sm font-semibold uppercase tracking-widest text-[var(--primary-color)]/60 mb-2">
            Trusted by Industry Leaders
        </h3>
        <div class="w-12 h-1 bg-[var(--primary-color)] mx-auto rounded-full"></div>
    </div>

    <!-- Infinite Marquee Wrapper -->
    <div class="relative flex overflow-hidden group">

        <!-- Subtle gradient fades for smooth entry/exit edges -->
        <div class="absolute inset-y-0 start-0 w-24 lg:w-40 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <div class="absolute inset-y-0 end-0 w-24 lg:w-40 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

        <!-- The Continuous Ticker Track -->
        <!-- We use flex nowrap on the parent, and let the whole thing slide exactly 50% -->
        <div class="flex animate-marquee hover:[animation-play-state:paused] whitespace-nowrap min-w-max">

            <!-- List 1 (Original) -->
            <div class="flex items-center justify-around min-w-[100%]">
                @foreach($companies as $company)
                <div class="px-8 md:px-12 lg:px-16 flex-shrink-0 transition-transform duration-300 hover:scale-110">
                    <a href="{{ $company->url }}" target="_blank" title="{{ $company->name }}" class="block p-2 focus:outline-none focus:ring-2 focus:ring-[var(--primary-color)] rounded-lg">
                        <img src="{{ asset('storage/' . $company->image) }}" alt="{{ $company->name }}"
                            class="h-8 md:h-10 lg:h-12 w-max object-contain filter grayscale hover:grayscale-0 transition-all duration-500 opacity-50 hover:opacity-100">
                    </a>
                </div>
                @endforeach
            </div>

            <!-- List 2 (Exact Clone that follows seamlessly) -->
            <div class="flex items-center justify-around min-w-[100%]" aria-hidden="true">
                @foreach($companies as $company)
                <div class="px-8 md:px-12 lg:px-16 flex-shrink-0 transition-transform duration-300 hover:scale-110">
                    <a href="{{ $company->url }}" target="_blank" title="{{ $company->name }}" class="block p-2" tabindex="-1">
                        <img src="{{ asset('storage/' . $company->image) }}" alt="{{ $company->name }}"
                            class="h-8 md:h-10 lg:h-12 w-max object-contain filter grayscale hover:grayscale-0 transition-all duration-500 opacity-50 hover:opacity-100">
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>