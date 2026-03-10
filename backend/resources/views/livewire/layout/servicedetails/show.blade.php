<x-app-layout>

    @push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@300;400;500&family=Fraunces:ital,wght@1,400&display=swap');

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .sp {
            min-height: 100vh;
            background: #fdfcfb;
            font-family: 'DM Sans', sans-serif;
            position: relative;
            z-index: 1;
        }

        .sp-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: clamp(24px, 5vw, 64px) clamp(16px, 3vw, 24px);
        }

        /* back */
        .back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: .85rem;
            color: #9c9791;
            text-decoration: none;
            margin-bottom: 36px;
            transition: color .2s;
        }

        .back:hover {
            color: var(--primary-color);
        }

        .back svg {
            transition: transform .2s;
        }

        .back:hover svg {
            transform: translateX(-3px);
        }

        /* heading */
        .sp-eye {
            font-size: 10px;
            letter-spacing: .16em;
            text-transform: uppercase;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 14px;
        }

        .sp-eye span {
            display: inline-block;
            width: 18px;
            height: 1px;
            background: var(--primary-color);
            opacity: .4;
        }

        .sp-h1 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2rem, 4.5vw, 3.4rem);
            font-weight: 800;
            color: #1a1714;
            letter-spacing: -.04em;
            line-height: .97;
            margin-bottom: 14px;
        }

        .sp-h1 em {
            font-family: 'Fraunces', serif;
            font-style: italic;
            font-weight: 400;
            color: var(--primary-color);
        }

        .sp-lead {
            font-size: .95rem;
            line-height: 1.8;
            color: #7c7670;
            font-weight: 300;
            max-width: 540px;
            margin-bottom: 0;
        }

        /* video */
        .sp-video {
            margin: 36px 0;
            border-radius: 20px;
            overflow: hidden;
            background: #1a1714;
            border: 1px solid #2e2a26;
            box-shadow: 0 28px 70px rgba(0, 0, 0, .16);
            position: relative;
        }

        .sp-video video {
            width: 100%;
            display: block;
            max-height: 60vh;
            object-fit: cover;
        }

        .sp-video-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 24px 24px 16px;
            background: linear-gradient(to top, rgba(26, 23, 20, .7), transparent);
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            pointer-events: none;
        }

        .sp-video-bar b {
            font-family: 'Syne', sans-serif;
            font-size: .9rem;
            color: rgba(255, 255, 255, .9);
            font-weight: 700;
        }

        .sp-video-bar span {
            font-size: 10px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .45);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .live-dot {
            width: 5px;
            height: 5px;
            background: var(--primary-color);
            border-radius: 50%;
            animation: blink 2s ease-in-out infinite;
        }

        /* grid */
        .sp-grid {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 28px;
            align-items: start;
        }

        @media(max-width:1024px) {
            .sp-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }

        /* shared card shell */
        .card {
            background: #fdfcfb;
            border: 1px solid #e2ddd8;
            border-radius: 18px;
            overflow: hidden;
        }

        .card+.card {
            margin-top: 20px;
        }

        /* info card */
        .card-head {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 22px 26px;
            border-bottom: 1px solid #e8e4df;
        }

        .card-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: #f8f6f3;
            border: 1px solid #e8e4df;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            overflow: hidden;
            position: relative;
        }

        .card-icon::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: .07;
            background-image: repeating-linear-gradient(45deg, var(--primary-color) 0, var(--primary-color) 1px, transparent 0, transparent 7px);
        }

        .card-icon img {
            width: 34px;
            height: 34px;
            object-fit: contain;
            position: relative;
            z-index: 1;
        }

        .card-lbl {
            font-size: 10px;
            letter-spacing: .13em;
            text-transform: uppercase;
            color: var(--primary-color);
            margin-bottom: 4px;
        }

        .card-ttl {
            font-family: 'Syne', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #1a1714;
            letter-spacing: -.02em;
        }

        .card-body {
            padding: 22px 26px;
        }

        .rule {
            width: 26px;
            height: 1.5px;
            background: var(--primary-color);
            opacity: .25;
            margin-bottom: 12px;
        }

        .card-body p {
            font-size: .9rem;
            line-height: 1.8;
            color: #7c7670;
            font-weight: 300;
            margin: 0;
        }

        /* features */
        .feat-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f3f0ed;
        }

        .feat-item:last-child {
            border-bottom: none;
        }

        .feat-tick {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            background: rgba(var(--primary-rgb), .08);
            border: 1px solid rgba(var(--primary-rgb), .15);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--primary-color);
        }

        .feat-item span {
            font-size: .875rem;
            color: #4a4540;
        }

        /* reservation card */
        .res-top {
            background: #1a1714;
            padding: 22px 26px;
            position: relative;
            overflow: hidden;
        }

        .res-top::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: .06;
            background-image: repeating-linear-gradient(-45deg, var(--primary-color) 0, var(--primary-color) 1px, transparent 0, transparent 9px);
        }

        .res-eye {
            font-size: 10px;
            letter-spacing: .15em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, .4);
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .res-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -.03em;
            position: relative;
            z-index: 1;
        }

        .res-title em {
            font-family: 'Fraunces', serif;
            font-style: italic;
            font-weight: 400;
            color: #a5a2ff;
        }

        .res-body {
            padding: 24px 26px;
        }

        @media(min-width:1025px) {
            .res-body {
                position: sticky;
                top: 100px;
            }
        }

        .fl {
            display: block;
            font-size: 10px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #9c9791;
            margin-bottom: 6px;
        }

        .fi {
            width: 100%;
            background: #f8f6f3;
            border: 1px solid #e2ddd8;
            border-radius: 10px;
            padding: 10px 13px;
            font-family: 'DM Sans', sans-serif;
            font-size: .875rem;
            color: #1a1714;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            appearance: none;
        }

        .fi::placeholder {
            color: #c9c4be;
            font-weight: 300;
        }

        .fi:focus {
            border-color: rgba(var(--primary-rgb), .4);
            box-shadow: 0 0 0 3px rgba(var(--primary-rgb), .07);
            background: #fdfcfb;
        }

        textarea.fi {
            resize: vertical;
            min-height: 82px;
            line-height: 1.6;
        }

        .fg {
            margin-bottom: 15px;
        }

        .row2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        @media(max-width:480px) {
            .row2 {
                grid-template-columns: 1fr;
            }
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 18px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e8e4df;
        }

        .divider span {
            font-size: 10px;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #c9c4be;
        }

        .btn-submit {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px;
            background: var(--primary-color);
            border: none;
            border-radius: 11px;
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            font-weight: 500;
            color: #fff;
            cursor: pointer;
            transition: background .2s, transform .2s, box-shadow .2s;
            margin-top: 4px;
        }

        .btn-submit:hover {
            background: #5a56e8;
            transform: translateY(-2px);
            box-shadow: 0 10px 26px rgba(var(--primary-rgb), .28);
        }

        .btn-submit svg {
            transition: transform .2s;
        }

        .btn-submit:hover svg {
            transform: translateX(3px);
        }

        .trust {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            margin-top: 12px;
            font-size: .75rem;
            color: #b5b0ab;
            font-weight: 300;
        }

        .trust svg {
            color: var(--primary-color);
            opacity: .5;
        }

        /* success */
        .res-ok {
            display: none;
            padding: 36px 26px;
            text-align: center;
        }

        .res-ok svg.ring {
            color: var(--primary-color);
            margin-bottom: 14px;
        }

        .res-ok h3 {
            font-family: 'Syne', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #1a1714;
            margin-bottom: 8px;
        }

        .res-ok p {
            font-size: .875rem;
            color: #7c7670;
            font-weight: 300;
            line-height: 1.7;
            margin: 0;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .35
            }
        }

        @keyframes up {
            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .up {
            opacity: 0;
            transform: translateY(16px);
            animation: up .6s ease forwards;
        }

        .u1 {
            animation-delay: .05s
        }

        .u2 {
            animation-delay: .15s
        }

        .u3 {
            animation-delay: .25s
        }

        .u4 {
            animation-delay: .35s
        }
    </style>
    @endpush

    <div class="sp">
        <livewire:layout.background></livewire:layout.background>
        <div class="sp-inner">

            {{-- Back --}}
            <a href="{{ url('/') }}#services" class="back up u1">
                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Services
            </a>

            {{-- Title --}}
            <div class="up u2">
                <div class="sp-eye">✦ <span></span> Creative Service</div>
                <h1 class="sp-h1">
                    @php $words = explode(' ', $service->title); $last = array_pop($words); @endphp
                    {{ implode(' ', $words) }} <em>{{ $last }}</em>
                </h1>
                <p class="sp-lead">{{ $service->description }}</p>
            </div>

            {{-- Video --}}
            @if($service->video_url)
            <div class="sp-video up u3">
                <video controls preload="metadata">
                    <source src="{{ $service->video_url }}" type="video/mp4">
                </video>
                <div class="sp-video-bar">
                    <b>{{ $service->title }}</b>
                    <span><i class="live-dot"></i> Service Overview</span>
                </div>
            </div>
            @endif

            {{-- Grid --}}
            <div class="sp-grid up u4">

                {{-- Left --}}
                <div>
                    {{-- About --}}
                    <div class="card">
                        <div class="card-head">
                            @if($service->image)
                            <div class="card-icon"><img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}"></div>
                            @endif
                            <div>
                                <div class="card-lbl">[ About ]</div>
                                <div class="card-ttl">{{ $service->title }}</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="rule"></div>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>

                    {{-- Features --}}
                    @if($service->show_features && $service->features)
                    <div class="card">
                        <div class="card-body">
                            <div class="card-ttl" style="margin-bottom:4px">What's included</div>
                            <div class="rule" style="margin-top:10px"></div>
                            @foreach($service->features as $f)
                            @if($f['is_visible'])
                            <div class="feat-item">
                                <div class="feat-tick">
                                    <svg width="10" height="10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span>{{ $f['text'] }}</span>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Right: Reservation --}}
                <div class="card">
                    <div class="res-top">
                        <div class="res-eye">✦ Reserve your spot</div>
                        <div class="res-title">Book this <em>Service</em></div>
                    </div>
                    <div class="res-body">
                        <form wire:submit.prevent="save">
                            <div class="fg">
                                <label class="fl">Full Name</label>
                                <input class="fi" type="text" wire:model="form.name" placeholder="Your full name" required>
                                @error('form.name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div class="fg">
                                <label class="fl">Email</label>
                                <input class="fi" type="email" wire:model="form.email" placeholder="you@example.com" required>
                                @error('form.email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div class="fg">
                                <label class="fl">Phone</label>
                                <input class="fi" type="tel" wire:model="form.phone" placeholder="+1 (000) 000-0000">
                                @error('form.phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div class="fg">
                                <label class="fl">Date</label>
                                <input class="fi" type="date" wire:model="form.preferred_date" required min="{{ date('Y-m-d') }}">
                                @error('form.preferred_date') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div class="fg">
                                <label class="fl">Project Details</label>
                                <textarea class="fi" wire:model="form.message" placeholder="Goals, timeline, requirements..."></textarea>
                                @error('form.message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="btn-submit relative overflow-hidden group" wire:loading.attr="disabled" wire:target="save">
                                <span wire:loading.remove wire:target="save" class="flex items-center gap-2">
                                    Confirm Reservation
                                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="group-hover:translate-x-1 transition-transform">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>

                                <span wire:loading wire:target="save" class="flex items-center gap-2">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing...
                                </span>
                            </button>

                            <div class="trust">
                                <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                No commitment — we'll reply within 24h
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>