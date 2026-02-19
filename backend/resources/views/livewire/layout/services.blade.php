<div class="relative py-32 overflow-hidden bg-white">
    <livewire:layout.background></livewire:layout.background>
    <!-- Section Header -->
    <div class="max-w-7xl mx-auto px-6 lg:px-8 mb-20 text-center">
        <h2 class="text-5xl font-bold text-gray-900 mb-4">What We Create</h2>
        <p class="text-xl text-gray-600">Scroll to explore our creative services</p>
    </div>

    <!-- 3D Carousel Container -->
    <div class="relative h-[600px] perspective-container">
        <div class="services-carousel" id="servicesCarousel">

            <!-- Service Cards -->
            @foreach ($services as $service)
            <div class="service-card" data-index="0">
                <!-- Service Icon -->
                <div class="service-icon">
                    @if($service->image)
                    <img src="{{asset('storage/' . $service->image)}}" class="w-full h-full object-contain"
                        alt="{{$service->title}}">

                    @endif
                </div>
                <h3 class="service-title">{{$service->title}}</h3>
                <p class="service-description">
                    {{$service->description}}
                </p>
                <a href="{{ $service->button_url ?? route('register') }}" class="service-button group">
                    {{ $service->button_text ?? 'Get started free' }}
                    <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform inline-block" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
            @endforeach

        </div>

        <!-- Navigation Dots -->
        <div class="carousel-dots">
            @foreach ($services as $index => $service)
            <button class="dot {{ $index === 2 ? 'active' : '' }}" data-slide="{{ $index }}"></button>
            @endforeach
        </div>
    </div>

    @push('styles')
    <style>
        .perspective-container {
            perspective: 2000px;
            position: relative;
        }

        .services-carousel {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
        }

        .service-card {
            position: absolute;
            width: 420px;
            height: 520px;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            transform-style: preserve-3d;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 48px 40px;
        }

        .service-icon {
            width: 120px;
            height: 120px;
            margin-bottom: 24px;
            transition: transform 0.6s ease;
            flex-shrink: 0;
        }

        .service-card.active .service-icon {
            transform: scale(1.1);
        }

        .service-title {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 16px;
            transition: all 0.4s ease;
        }

        .service-description {
            font-size: 16px;
            line-height: 1.7;
            color: #6b7280;
            margin-bottom: 32px;
            flex-grow: 1;
            transition: all 0.4s ease;
            max-width: 100%;
        }

        .service-button {
            padding: 14px 32px;
            background: white;
            border: 2px solid #e5e7eb;
            color: #1f2937;
            font-weight: 600;
            font-size: 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .service-button:hover {
            border-color: #6b66ff;
            color: #6b66ff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(107, 102, 255, 0.15);
        }

        .service-card.active .service-button {
            background: #6b66ff;
            border-color: #6b66ff;
            color: white;
        }

        .service-card.active .service-button:hover {
            background: #5a56e6;
            border-color: #5a56e6;
        }

        /* Positioning for 3D carousel effect */
        .service-card[data-index="0"] {
            transform: translateX(-600px) translateZ(-400px) scale(0.75);
            opacity: 0.4;
            filter: blur(3px);
            pointer-events: none;
        }

        .service-card[data-index="1"] {
            transform: translateX(-300px) translateZ(-200px) scale(0.85);
            opacity: 0.6;
            filter: blur(1.5px);
        }

        .service-card[data-index="2"] {
            transform: translateX(0) translateZ(0) scale(1);
            opacity: 1;
            filter: blur(0);
            z-index: 10;
        }

        .service-card[data-index="3"] {
            transform: translateX(300px) translateZ(-200px) scale(0.85);
            opacity: 0.6;
            filter: blur(1.5px);
        }

        .service-card[data-index="4"] {
            transform: translateX(600px) translateZ(-400px) scale(0.75);
            opacity: 0.4;
            filter: blur(3px);
            pointer-events: none;
        }

        /* Navigation Dots */
        .carousel-dots {
            position: absolute;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 20;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #d1d5db;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0;
        }

        .dot:hover {
            background: #9ca3af;
            transform: scale(1.2);
        }

        .dot.active {
            background: #6b66ff;
            width: 32px;
            border-radius: 6px;
        }

        /* Hover effects */
        .service-card:not(.active):hover .service-content {
            border-color: rgba(107, 102, 255, 0.3);
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
        }

        /* Tablet Responsiveness */
        @media (max-width: 1024px) {
            .service-card {
                width: 360px;
                height: 480px;
                padding: 36px 32px;
            }

            .service-icon {
                width: 100px;
                height: 100px;
                margin-bottom: 20px;
            }

            .service-title {
                font-size: 24px;
            }

            .service-description {
                font-size: 15px;
                margin-bottom: 24px;
            }

            .service-card[data-index="0"] {
                transform: translateX(-450px) translateZ(-350px) scale(0.7);
            }

            .service-card[data-index="1"] {
                transform: translateX(-230px) translateZ(-180px) scale(0.8);
            }

            .service-card[data-index="3"] {
                transform: translateX(230px) translateZ(-180px) scale(0.8);
            }

            .service-card[data-index="4"] {
                transform: translateX(450px) translateZ(-350px) scale(0.7);
            }
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .perspective-container {
                height: 520px;
            }

            .service-card {
                width: 320px;
                height: 460px;
                padding: 32px 24px;
            }

            .service-icon {
                width: 90px;
                height: 90px;
                margin-bottom: 16px;
            }

            .service-title {
                font-size: 22px;
                margin-bottom: 12px;
            }

            .service-description {
                font-size: 14px;
                line-height: 1.6;
                margin-bottom: 20px;
            }

            .service-button {
                padding: 12px 24px;
                font-size: 14px;
            }

            /* Hide far cards on mobile */
            .service-card[data-index="0"],
            .service-card[data-index="4"] {
                display: none;
            }

            .service-card[data-index="1"] {
                transform: translateX(-180px) translateZ(-150px) scale(0.75);
            }

            .service-card[data-index="3"] {
                transform: translateX(180px) translateZ(-150px) scale(0.75);
            }
        }

        /* Small Mobile */
        @media (max-width: 480px) {
            .perspective-container {
                height: 480px;
            }

            .service-card {
                width: 280px;
                height: 420px;
                padding: 28px 20px;
            }

            .service-icon {
                width: 80px;
                height: 80px;
            }

            .service-title {
                font-size: 20px;
            }

            .service-description {
                font-size: 13px;
            }

            .service-card[data-index="1"] {
                transform: translateX(-160px) translateZ(-120px) scale(0.7);
                opacity: 0.5;
            }

            .service-card[data-index="3"] {
                transform: translateX(160px) translateZ(-120px) scale(0.7);
                opacity: 0.5;
            }
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('servicesCarousel');
            const cards = carousel.querySelectorAll('.service-card');
            const dots = document.querySelectorAll('.dot');
            let currentIndex = 2; // Start with middle card
            const totalCards = cards.length;

            let autoScrollInterval;
            let isAutoScrolling = true;

            function updateCarousel(newIndex) {
                currentIndex = newIndex;

                cards.forEach((card, index) => {
                    card.classList.remove('active');

                    // Calculate position relative to current index
                    let position = index - currentIndex;

                    // Wrap around for circular effect
                    if (position < -2) position += totalCards;
                    if (position > 2) position -= totalCards;

                    card.setAttribute('data-index', position + 2);

                    if (position === 0) {
                        card.classList.add('active');
                    }
                });

                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }

            // Auto-scroll functionality
            function startAutoScroll() {
                autoScrollInterval = setInterval(() => {
                    if (isAutoScrolling) {
                        updateCarousel((currentIndex + 1) % totalCards);
                    }
                }, 3000);
            }

            function stopAutoScroll() {
                if (autoScrollInterval) {
                    clearInterval(autoScrollInterval);
                }
            }

            function pauseAutoScroll() {
                isAutoScrolling = false;
            }

            function resumeAutoScroll() {
                isAutoScrolling = true;
            }

            // Start auto-scroll on load
            startAutoScroll();

            // Pause auto-scroll on hover
            carousel.addEventListener('mouseenter', pauseAutoScroll);
            carousel.addEventListener('mouseleave', resumeAutoScroll);

            // Mouse wheel scrolling
            let wheelTimeout;
            carousel.addEventListener('wheel', (e) => {
                e.preventDefault();
                pauseAutoScroll();
                clearTimeout(wheelTimeout);

                if (e.deltaY > 0) {
                    updateCarousel((currentIndex + 1) % totalCards);
                } else if (e.deltaY < 0) {
                    updateCarousel((currentIndex - 1 + totalCards) % totalCards);
                }

                wheelTimeout = setTimeout(() => {
                    resumeAutoScroll();
                }, 2000);
            }, {
                passive: false
            });

            // Click on cards to center them
            cards.forEach((card, index) => {
                card.addEventListener('click', () => {
                    pauseAutoScroll();
                    updateCarousel(index);
                    setTimeout(() => {
                        resumeAutoScroll();
                    }, 3000);
                });
            });

            // Click on dots
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    pauseAutoScroll();
                    const slideIndex = parseInt(dot.getAttribute('data-slide'));
                    updateCarousel(slideIndex);
                    setTimeout(() => {
                        resumeAutoScroll();
                    }, 3000);
                });
            });

            // Touch/Swipe support
            let touchStartX = 0;
            let touchEndX = 0;

            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                pauseAutoScroll();
            });

            carousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                setTimeout(() => {
                    resumeAutoScroll();
                }, 3000);
            });

            function handleSwipe() {
                if (touchEndX < touchStartX - 50) {
                    updateCarousel((currentIndex + 1) % totalCards);
                }
                if (touchEndX > touchStartX + 50) {
                    updateCarousel((currentIndex - 1 + totalCards) % totalCards);
                }
            }

            // Clean up on page unload
            window.addEventListener('beforeunload', () => {
                stopAutoScroll();
            });
        });
    </script>
    @endpush