<div class="relative py-32 overflow-hidden bg-white">
    <livewire:layout.background></livewire:layout.background>

    <!-- SVG filter for subtle edge roughness -->
    <svg width="0" height="0" style="position:absolute;overflow:hidden">
        <defs>
            <filter id="roughen">
                <feTurbulence type="turbulence" baseFrequency="0.015" numOctaves="3" result="noise" seed="2" />
                <feDisplacementMap in="SourceGraphic" in2="noise" scale="1.2" xChannelSelector="R" yChannelSelector="G" />
            </filter>
        </defs>
    </svg>

    <!-- Section Header -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 mb-16 text-center">
        <div class="svc-header">
            <div class="svc-header-mark"></div>
            <h2 class="services-heading">What We<br><em>Provide</em></h2>

        </div>
    </div>

    <!-- Stack Carousel -->
    <div class="stack-scene" id="stackScene">
        <div class="stack-wrapper" id="stackWrapper">
            @foreach ($services as $index => $service)
            <div class="stack-card" data-index="{{ $index }}" data-id="{{ $service->id }}">

                <!-- Paper texture overlay -->
                <div class="card-paper"></div>

                <div class="card-inner">
                    <!-- Left panel -->
                    <div class="card-left" data-pattern="{{ $index % 4 }}">
                        <!-- Ink stamp number -->
                        <div class="stamp-wrap">
                            <svg class="stamp-ring" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="40" cy="40" r="34" stroke="currentColor" stroke-width="1.5" stroke-dasharray="4 3" stroke-linecap="round" />
                            </svg>
                            <span class="card-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>

                        @if($service->image)
                        <div class="card-icon">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                        </div>
                        @endif

                        <!-- Pattern lines decoration -->
                        <div class="panel-pattern"></div>
                    </div>

                    <!-- Right panel -->
                    <div class="card-right">


                        <h3 class="card-title">{{ $service->title }}</h3>

                        <!-- Thin ruled line -->
                        <div class="card-rule"></div>

                        <p class="card-desc">{{ $service->description }}</p>

                        <a href="{{ route('services.show', $service->id) }}" class="card-cta">
                            <span class="cta-text">Explore this service</span>
                            <span class="cta-line"></span>
                            <svg class="cta-arrow" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        <!-- Controls row -->
        <div class="controls-row">
            <button class="ctrl-btn" id="prevBtn" aria-label="Previous">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l6-6M5 12l6 6" />
                </svg>
            </button>

            <div class="counter-wrap">
                <span class="counter-current" id="ctrlCounter">01</span>
                <span class="counter-sep">/</span>
                <span class="counter-total" id="ctrlTotal">00</span>
            </div>

            <button class="ctrl-btn" id="nextBtn" aria-label="Next">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0l-6 6m6-6l-6-6" />
                </svg>
            </button>

            <!-- Tick marks progress -->
            <div class="tick-track" id="tickTrack"></div>
        </div>
    </div>

    @push('styles')
    <style>
        /* ── Header ── */
        .svc-header {
            position: relative;
            max-width: 500px;
            margin: 0 auto;
            text-align: center;
        }

        .svc-header-mark {
            font-size: 1.1rem;
            color: var(--primary-color);
            margin-bottom: 12px;
            letter-spacing: 0.1em;
        }

        .services-heading {
            font-family: Impact, Haettenschweiler, sans-serif;
            font-size: clamp(2.8rem, 5.5vw, 4.5rem);
            font-weight: 500;
            color: #111827;
            letter-spacing: -0.04em;
            line-height: 0.95;
            margin-bottom: 18px;
        }

        .services-heading em {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS';
            font-weight: 400;
            color: var(--primary-color);
            letter-spacing: -0.02em;
        }

        .services-subheading {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            color: #9ca3af;
            font-weight: 300;
        }

        /* ── Scene ── */
        .stack-scene {
            position: relative;
            max-width: 820px;
            margin: 0 auto;
            padding: 0 24px 72px;
            z-index: -0;
        }

        .stack-wrapper {
            position: relative;
            height: 290px;
        }

        @media (max-width: 640px) {
            .stack-wrapper {
                height: 370px;
            }
        }

        /* ── Card ── */
        .stack-card {
            position: absolute;
            inset: 0;
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #e2ddd8;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            cursor: pointer;
            transition:
                transform 0.6s cubic-bezier(0.34, 1.15, 0.64, 1),
                opacity 0.45s ease,
                box-shadow 0.35s ease,
                border-color 0.35s ease;
            will-change: transform, opacity;
        }

        /* Paper grain overlay */
        .card-paper {
            position: absolute;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            border-radius: inherit;
            opacity: 0.025;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n' x='0' y='0'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
            background-size: 150px 150px;
            mix-blend-mode: multiply;
        }

        .card-inner {
            position: relative;
            z-index: 3;
            display: flex;
            height: 100%;
            align-items: stretch;
        }

        /* ── Left panel ── */
        .card-left {
            width: 148px;
            flex-shrink: 0;
            border-right: 1px solid #e8e4df;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 18px;
            padding: 28px 16px;
            position: relative;
            overflow: hidden;
            background: #ffffff;
        }

        .panel-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.06;
            pointer-events: none;
        }

        .card-left[data-pattern="0"] .panel-pattern {
            background-image: repeating-linear-gradient(45deg, var(--primary-color) 0, var(--primary-color) 1px, transparent 0, transparent 8px);
        }

        .card-left[data-pattern="1"] .panel-pattern {
            background-image: repeating-linear-gradient(-45deg, var(--primary-color) 0, var(--primary-color) 1px, transparent 0, transparent 8px);
        }

        .card-left[data-pattern="2"] .panel-pattern {
            background-image: radial-gradient(circle, var(--primary-color) 1px, transparent 1px);
            background-size: 10px 10px;
        }

        .card-left[data-pattern="3"] .panel-pattern {
            background-image:
                repeating-linear-gradient(0deg, var(--primary-color) 0, var(--primary-color) 1px, transparent 0, transparent 9px),
                repeating-linear-gradient(90deg, var(--primary-color) 0, var(--primary-color) 1px, transparent 0, transparent 9px);
        }

        /* Ink stamp */
        .stamp-wrap {
            position: relative;
            width: 72px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stamp-ring {
            position: absolute;
            inset: 0;
            color: var(--primary-color);
            opacity: 0.2;
            transition: opacity 0.35s ease, transform 0.6s ease;
        }

        .card-number {
            font-family: 'Syne', sans-serif;
            font-size: 1.45rem;
            font-weight: 800;
            color: #ccc7c2;
            line-height: 1;
            letter-spacing: -0.04em;
            transition: color 0.35s ease;
            position: relative;
            z-index: 1;
        }

        .card-icon {
            width: 58px;
            height: 58px;
            filter: grayscale(25%) opacity(0.85);
            transition: filter 0.4s ease, transform 0.4s ease;
        }

        .card-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* ── Right panel ── */
        .card-right {
            flex: 1;
            padding: 32px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Editorial bracket mark */
        .card-mark {
            font-family: 'DM Sans', sans-serif;
            font-size: 10px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #b5b0ab;
            margin-bottom: 13px;
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .mark-bracket {
            color: var(--primary-color);
            opacity: 0.45;
            font-size: 12px;
            font-weight: 300;
        }

        .card-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #1a1714;
            letter-spacing: -0.025em;
            line-height: 1.15;
            margin-bottom: 13px;
        }

        /* Short ruled accent line */
        .card-rule {
            width: 28px;
            height: 1.5px;
            background: var(--primary-color);
            opacity: 0.25;
            margin-bottom: 13px;
            transition: width 0.4s ease, opacity 0.4s ease;
        }

        .card-desc {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.91rem;
            line-height: 1.75;
            color: #7c7670;
            font-weight: 300;
            margin-bottom: 24px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Editorial underline CTA — no button border */
        .card-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: #1a1714;
            position: relative;
            width: fit-content;
            padding-bottom: 3px;
        }

        .cta-text {
            position: relative;
            z-index: 1;
            transition: color 0.25s ease;
        }

        .cta-line {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 1px;
            width: 0%;
            background: var(--primary-color);
            transition: width 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .cta-arrow {
            transition: transform 0.3s ease, color 0.3s ease;
            color: #b5b0ab;
        }

        .card-cta:hover .cta-line {
            width: 100%;
        }

        .card-cta:hover .cta-arrow {
            transform: translateX(4px);
            color: var(--primary-color);
        }

        .card-cta:hover .cta-text {
            color: var(--primary-color);
        }

        /* ── Active state ── */
        .stack-card.is-active {
            box-shadow:
                0 24px 60px rgba(var(--primary-rgb), 0.11),
                0 4px 16px rgba(0, 0, 0, 0.07),
                inset 0 0 0 1px rgba(var(--primary-rgb), 0.12);
            border-color: rgba(var(--primary-rgb), 0.16);
            z-index: 50 !important;
        }

        .stack-card.is-active .stamp-ring {
            opacity: 0.65;
            transform: rotate(12deg);
        }

        .stack-card.is-active .card-number {
            color: var(--primary-color);
        }

        .stack-card.is-active .card-icon {
            filter: grayscale(0%) opacity(1);
            transform: scale(1.06) translateY(-2px);
        }

        .stack-card.is-active .card-rule {
            width: 164px;
            opacity: 0.6;
        }

        /* Peek states */
        .stack-card.peek-1,
        .stack-card.peek-2 {
            pointer-events: none;
        }

        .stack-card.hidden-card {
            opacity: 0;
            pointer-events: none;
        }

        /* ── Controls row ── */
        .controls-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 28px;
        }

        .ctrl-btn {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            border: 1px solid #e2ddd8;
            background: #fdfcfb;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #78716c;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .ctrl-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background: rgba(var(--primary-rgb), 0.04);
        }

        .ctrl-btn:active {
            transform: scale(0.92);
        }

        .counter-wrap {
            display: flex;
            align-items: baseline;
            gap: 3px;
            flex-shrink: 0;
        }

        .counter-current {
            font-family: 'Syne', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: #1a1714;
        }

        .counter-sep {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            color: #d1cdc8;
        }

        .counter-total {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            color: #b5b0ab;
            font-weight: 300;
        }

        /* Tick marks */
        .tick-track {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .tick {
            height: 10px;
            width: 2px;
            background: #e2ddd8;
            border-radius: 2px;
            border: none;
            padding: 0;
            transition: background 0.25s ease, height 0.25s ease;
            cursor: pointer;
        }

        .tick.is-active {
            background: var(--primary-color);
            height: 18px;
        }

        .tick:hover:not(.is-active) {
            background: #a5a2ff;
        }

        /* ── Mobile ── */
        @media (max-width: 640px) {
            .card-left {
                width: 72px;
                padding: 20px 10px;
            }

            .stamp-wrap {
                width: 54px;
                height: 54px;
            }

            .card-number {
                font-size: 1.1rem;
            }

            .card-icon {
                width: 42px;
                height: 42px;
            }

            .card-right {
                padding: 22px 18px;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .card-desc {
                font-size: 0.85rem;
                -webkit-line-clamp: 3;
            }

            .card-mark {
                display: none;
            }

            .services-heading {
                font-size: 2.4rem;
            }
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('stackWrapper');
            const cards = Array.from(wrapper.querySelectorAll('.stack-card'));
            const ctrlCounter = document.getElementById('ctrlCounter');
            const ctrlTotal = document.getElementById('ctrlTotal');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const tickTrack = document.getElementById('tickTrack');

            let current = 0;
            const total = cards.length;
            let isPaused = false;
            let autoTimer = null;

            function pad(n) {
                return String(n).padStart(2, '0');
            }

            // Build tick marks
            ctrlTotal.textContent = pad(total);
            for (let i = 0; i < total; i++) {
                const t = document.createElement('button');
                t.className = 'tick';
                t.setAttribute('aria-label', 'Go to service ' + (i + 1));
                t.addEventListener('click', () => {
                    isPaused = true;
                    current = i;
                    render();
                    setTimeout(() => {
                        isPaused = false;
                    }, 3500);
                });
                tickTrack.appendChild(t);
            }

            function render() {
                const ticks = tickTrack.querySelectorAll('.tick');

                cards.forEach((card, i) => {
                    card.classList.remove('is-active', 'peek-1', 'peek-2', 'hidden-card');
                    const rel = ((i - current) % total + total) % total;

                    if (rel === 0) {
                        card.classList.add('is-active');
                        card.style.transform = 'translateY(0) rotate(0deg) scale(1)';
                        card.style.opacity = '1';
                        card.style.zIndex = '30';
                    } else if (rel === 1) {
                        card.classList.add('peek-1');
                        card.style.transform = 'translateY(16px) rotate(1.8deg) scale(0.965)';
                        card.style.opacity = '0.52';
                        card.style.zIndex = '20';
                    } else if (rel === 2) {
                        card.classList.add('peek-2');
                        card.style.transform = 'translateY(29px) rotate(3.3deg) scale(0.93)';
                        card.style.opacity = '0.26';
                        card.style.zIndex = '10';
                    } else {
                        card.classList.add('hidden-card');
                        card.style.opacity = '0';
                        card.style.zIndex = '1';
                    }
                });

                ticks.forEach((t, i) => t.classList.toggle('is-active', i === current));
                ctrlCounter.textContent = pad(current + 1);
            }

            function goNext() {
                current = (current + 1) % total;
                render();
            }

            function goPrev() {
                current = (current - 1 + total) % total;
                render();
            }

            function startAuto() {
                autoTimer = setInterval(() => {
                    if (!isPaused) goNext();
                }, 4200);
            }

            nextBtn.addEventListener('click', () => {
                isPaused = true;
                goNext();
                setTimeout(() => {
                    isPaused = false;
                }, 3500);
            });
            prevBtn.addEventListener('click', () => {
                isPaused = true;
                goPrev();
                setTimeout(() => {
                    isPaused = false;
                }, 3500);
            });

            cards.forEach((card) => {
                card.addEventListener('click', function(e) {
                    if (e.target.closest('.card-cta')) return;
                    const rel = ((parseInt(this.dataset.index) - current) % total + total) % total;
                    if (rel === 0) return;
                    isPaused = true;
                    current = parseInt(this.dataset.index);
                    render();
                    setTimeout(() => {
                        isPaused = false;
                    }, 3500);
                });
            });

            wrapper.addEventListener('mouseenter', () => {
                isPaused = true;
            });
            wrapper.addEventListener('mouseleave', () => {
                isPaused = false;
            });

            let tx = 0;
            wrapper.addEventListener('touchstart', e => {
                tx = e.touches[0].clientX;
                isPaused = true;
            }, {
                passive: true
            });
            wrapper.addEventListener('touchend', e => {
                const dx = e.changedTouches[0].clientX - tx;
                if (dx < -50) goNext();
                else if (dx > 50) goPrev();
                setTimeout(() => {
                    isPaused = false;
                }, 3500);
            });

            render();
            startAuto();
            window.addEventListener('beforeunload', () => clearInterval(autoTimer));
        });
    </script>
    @endpush
</div>