@php
use App\Models\Entity;
$entity = Entity::find(1);
@endphp

<footer class="bg-white border-t border-gray-200" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <!-- Brand Column -->
            <div class="space-y-6 xl:col-span-1">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('storage/uprizelogo.png') }}" alt="{{ $entity->name ?? config('app.name') }}" class="h-8 w-auto rounded-md">
                    <span class="font-semibold text-lg tracking-tight text-gray-900">{{ $entity->name ?? config('app.name') }}</span>
                </div>
                <p class="text-sm text-gray-500 leading-relaxed max-w-xs">
                    {{ $entity->slogan ?? 'Connecting visionary teams with elite digital talent. Build, scale, and launch faster with professional creative services.' }}
                </p>
                <!-- Social Icons (Minimal / Ghost styling) -->
                <div class="flex gap-4">
                    @foreach([
                    ['Twitter', 'M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.844'],
                    ['LinkedIn', 'M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z'],
                    ['Instagram', 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z'],
                    ] as [$label, $path])
                    <a href="#" class="text-gray-400 hover:text-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">
                        <span class="sr-only">{{ $label }}</span>
                        <!-- Heroicon or Social SVG -->
                        <svg class="w-5 h-5 block" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="{{ $path }}" />
                        </svg>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Links Grid -->
            <div class="mt-16 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider">Product</h3>
                        <ul role="list" class="mt-4 space-y-3">
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Services</a></li>
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Pricing</a></li>
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">How it works</a></li>
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider">Company</h3>
                        <ul role="list" class="mt-4 space-y-3">
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">About us</a></li>
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Careers</a></li>
                            <li>
                                @if($entity?->email)
                                <a href="mailto:{{ $entity->email }}" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Contact</a>
                                @else
                                <a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Contact</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider">Resources</h3>
                        <ul role="list" class="mt-4 space-y-3">
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Documentation</a></li>
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Help Center</a></li>
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Blog</a></li>
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-900 tracking-wider">Legal</h3>
                        <ul role="list" class="mt-4 space-y-3">
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Privacy Policy</a></li>
                            <li><a href="#" class="text-sm text-gray-500 hover:text-gray-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] rounded-md">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- System & Copyright -->
        <div class="mt-16 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} {{ $entity->name ?? config('app.name') }}. All rights reserved.</p>

            <!-- System Status Element (Highly characteristic of premium SaaS) -->
            <div class="flex items-center gap-2">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                <span class="text-sm text-gray-500 font-medium tracking-wide">All systems operational</span>
            </div>
        </div>

    </div>
</footer>