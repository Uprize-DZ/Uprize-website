@php
use App\Models\Entity;
$entity = Entity::first();
@endphp

<footer style="background:#ffffff; border-top:1px solid #e5e7eb; font-family:ui-sans-serif,system-ui,-apple-system,sans-serif;">
    <div style="max-width:1200px; margin:0 auto; padding:56px 32px 32px;">

        {{-- 4-column grid --}}
        <div style="display:grid; grid-template-columns:1.6fr 1fr 1fr 1.2fr; gap:48px; padding-bottom:48px; border-bottom:1px solid #f3f4f6;">

            {{-- Brand --}}
            <div>
                <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px;">
                    <img src="{{ asset('storage/uprizelogo.png') }}"
                        alt="{{ $entity->name ?? config('app.name') }}"
                        style="height:28px; width:auto; object-fit:contain;">
                    <span style="font-weight:700; font-size:16px; color:#111827; letter-spacing:-0.01em;">
                        {{ $entity->name ?? config('app.name') }}
                    </span>
                </div>

                <p style="font-size:13.5px; color:#6b7280; line-height:1.75; max-width:230px; margin:0 0 22px;">
                    {{ $entity->slogan ?? 'Empowering visionary brands through elite digital craftsmanship and strategic innovation.' }}
                </p>

                {{-- Social --}}
                <div style="display:flex; align-items:center; gap:14px;">
                    @if($entity?->facebook_url)
                    <a href="{{ $entity?->facebook_url }}" target="_blank" rel="noopener" aria-label="Facebook"
                        style="color:#9ca3af; text-decoration:none; display:flex; align-items:center; transition:color .15s;"
                        onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#9ca3af'">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                        </svg>
                    </a>
                    @endif
                    @if($entity?->instagram_url)
                    <a href="{{ $entity->instagram_url }}" target="_blank" rel="noopener" aria-label="Instagram"
                        style="color:#9ca3af; text-decoration:none; display:flex; align-items:center;"
                        onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#9ca3af'">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                        </svg>
                    </a>
                    @endif
                    @if($entity?->linkedin_url)
                    <a href="{{ $entity->linkedin_url }}" target="_blank" rel="noopener" aria-label="LinkedIn"
                        style="color:#9ca3af; text-decoration:none; display:flex; align-items:center;"
                        onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#9ca3af'">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>
                    @endif
                    @if($entity?->twitter_url)
                    <a href="{{ $entity->twitter_url }}" target="_blank" rel="noopener" aria-label="X / Twitter"
                        style="color:#9ca3af; text-decoration:none; display:flex; align-items:center;"
                        onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#9ca3af'">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.045 4.126H5.078z" />
                        </svg>
                    </a>
                    @endif
                    @if($entity?->whatsapp_number)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $entity->whatsapp_number) }}" target="_blank" rel="noopener" aria-label="WhatsApp"
                        style="color:#9ca3af; text-decoration:none; display:flex; align-items:center;"
                        onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#9ca3af'">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.45L0 24l6.105-1.602a11.83 11.83 0 005.937 1.597h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Navigation --}}
            <div>
                <p style="font-size:11px; font-weight:600; color:#111827; text-transform:uppercase; letter-spacing:0.1em; margin:0 0 18px; padding-bottom:12px; border-bottom:1px solid #f3f4f6;">Navigation</p>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:11px;">
                    <li><a href="{{ route('home') }}" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">Home</a></li>
                    <li><a href="#services" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">Services</a></li>
                    <li><a href="#pricing" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">Pricing</a></li>
                    <li><a href="#projects" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">Case Studies</a></li>
                </ul>
            </div>

            {{-- Company --}}
            <div>
                <p style="font-size:11px; font-weight:600; color:#111827; text-transform:uppercase; letter-spacing:0.1em; margin:0 0 18px; padding-bottom:12px; border-bottom:1px solid #f3f4f6;">Company</p>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:11px;">
                    <li><a href="#" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">Our Story</a></li>
                    <li><a href="#" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">Contact</a></li>
                    <li><a href="#" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">Privacy Policy</a></li>
                    <li><a href="#" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">Terms of Service</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <p style="font-size:11px; font-weight:600; color:#111827; text-transform:uppercase; letter-spacing:0.1em; margin:0 0 18px; padding-bottom:12px; border-bottom:1px solid #f3f4f6;">Contact</p>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:13px;">
                    @if($entity?->address)
                    <li style="display:flex; align-items:flex-start; gap:10px;">
                        <svg style="width:15px; height:15px; margin-top:2px; color:#6b66ff; flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span style="font-size:13.5px; color:#6b7280; line-height:1.55;">{{ $entity->address }}</span>
                    </li>
                    @endif
                    @if($entity?->phone)
                    <li style="display:flex; align-items:center; gap:10px;">
                        <svg style="width:15px; height:15px; color:#6b66ff; flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <a href="tel:{{ $entity->phone }}" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">{{ $entity->phone }}</a>
                    </li>
                    @endif
                    @if($entity?->email)
                    <li style="display:flex; align-items:center; gap:10px;">
                        <svg style="width:15px; height:15px; color:#6b66ff; flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:{{ $entity->email }}" style="font-size:13.5px; color:#6b7280; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#6b7280'">{{ $entity->email }}</a>
                    </li>
                    @endif
                </ul>
            </div>

        </div>

        {{-- Bottom bar --}}
        <div style="padding-top:28px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
            <p style="font-size:13px; color:#9ca3af; margin:0;">
                &copy; {{ date('Y') }} {{ $entity->name ?? config('app.name') }}. All rights reserved.
            </p>
            <div style="display:flex; align-items:center; gap:20px;">
                <a href="#" style="font-size:13px; color:#9ca3af; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#9ca3af'">Privacy</a>
                <a href="#" style="font-size:13px; color:#9ca3af; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#9ca3af'">Terms</a>
                <a href="#" style="font-size:13px; color:#9ca3af; text-decoration:none;" onmouseover="this.style.color='#6b66ff'" onmouseout="this.style.color='#9ca3af'">Cookies</a>
            </div>
        </div>

    </div>

    {{-- Responsive styles --}}
    <style>
        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr !important;
            }

            .footer-brand {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 600px) {
            .footer-grid {
                grid-template-columns: 1fr !important;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start !important;
            }
        }
    </style>
</footer>