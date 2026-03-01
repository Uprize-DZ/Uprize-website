<div class="min-h-screen bg-[#fdfcfb] font-sans pt-32 pb-20 px-4 sm:px-6 lg:px-8 flex flex-col items-center">
    <div class="max-w-xl w-full">

        {{-- Success Card --}}
        <div class="bg-white rounded-3xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.05)] border border-[#e2ddd8] overflow-hidden transform transition-all hover:scale-[1.01] duration-300">

            {{-- Header --}}
            <div class="bg-[#fcfcff] border-b border-[#f3f0ed] p-10 flex flex-col items-center text-center relative overflow-hidden">
                <!-- Decorative background ring -->
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#6b66ff]/5 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#6b66ff]/5 rounded-full blur-2xl pointer-events-none"></div>

                <div class="w-20 h-20 bg-[#6b66ff]/10 rounded-full flex items-center justify-center mb-6 relative z-10 shadow-inner">
                    <svg class="w-10 h-10 text-[#6b66ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h1 class="font-['Syne'] text-3xl font-bold text-[#1a1714] mb-3 tracking-tight">Reservation Confirmed</h1>
                <p class="text-[0.95rem] text-[#7c7670] leading-relaxed max-w-sm">
                    Thank you, {{ explode(' ', $reservation->name)[0] }}. We've received your request and will be in touch within 24 hours.
                </p>
            </div>

            {{-- Body --}}
            <div class="p-8 sm:p-10 space-y-6">

                {{-- Detail Item --}}
                <div class="flex items-start justify-between pb-6 border-b border-dashed border-[#e8e4df]">
                    <div>
                        <span class="block text-[10px] uppercase tracking-[0.12em] text-[#9c9791] font-semibold mb-1">Reservation ID</span>
                        <div class="text-[0.95rem] font-mono font-medium text-[#1a1714]">#REQ-{{ str_pad($reservation->id, 5, '0', STR_PAD_LEFT) }}</div>
                    </div>
                </div>

                {{-- Detail Item --}}
                <div class="flex items-start justify-between pb-6 border-b border-dashed border-[#e8e4df]">
                    <div>
                        <span class="block text-[10px] uppercase tracking-[0.12em] text-[#9c9791] font-semibold mb-1">Service Requested</span>
                        <div class="text-[1.05rem] font-medium text-[#1a1714] flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#6b66ff]"></span>
                            {{ $reservation->service->title ?? 'N/A' }}
                        </div>
                    </div>
                </div>

                {{-- Detail Item --}}
                <div class="flex items-start justify-between">
                    <div>
                        <span class="block text-[10px] uppercase tracking-[0.12em] text-[#9c9791] font-semibold mb-1">Preferred Date</span>
                        <div class="text-[0.95rem] font-medium text-[#1a1714] flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#9c9791]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $reservation->preferred_date->format('l, F j, Y') }}
                        </div>
                    </div>
                </div>

            </div>

            {{-- Footer Action --}}
            <div class="bg-[#faf9f8] p-8 border-t border-[#f3f0ed] flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/') }}" wire:navigate class="flex-1 inline-flex justify-center items-center gap-2 px-6 py-3.5 bg-white border border-[#e2ddd8] text-[#4a4540] font-medium text-[0.95rem] rounded-xl hover:bg-[#f8f6f3] hover:text-[#1a1714] hover:border-[#1a1714]/20 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#6b66ff]/50 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Home
                </a>
            </div>

        </div>

        {{-- Note --}}
        <p class="text-center text-[10px] uppercase tracking-widest text-[#b5b0ab] mt-8 pt-4 border-t border-[#e8e4df] max-w-xs mx-auto">
            A confirmation has been recorded in our secure system.
        </p>
    </div>
</div>