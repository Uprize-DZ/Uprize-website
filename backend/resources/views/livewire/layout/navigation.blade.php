<div x-data="navbar">
    <nav class="fixed top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-gray-200 transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- Logo (Start) -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="{{ asset('storage/uprizelogo.png') }}" alt="Uprize" class="h-8 w-auto rounded-md">
                        <span class="font-semibold text-lg tracking-tight text-gray-900">Uprize</span>
                    </a>
                </div>

                <!-- Primary Nav (Center) -->
                <div class="hidden md:flex items-center justify-center flex-1 ms-8 space-x-8 rtl:space-x-reverse">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">Home</a>
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">How it works</a>
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">About us</a>
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">Contact</a>
                </div>

                <!-- Actions (End) -->
                <div class="hidden md:flex items-center gap-4">
                    <!-- Language Selector -->
                    <div class="relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" type="button" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors flex items-center gap-1 focus:outline-none">
                            <span>EN</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition x-cloak class="absolute end-0 mt-2 w-32 bg-white rounded-lg shadow-lg py-1 border border-gray-100 ring-1 ring-black ring-opacity-5">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">English</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Français</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">العربية</a>
                        </div>
                    </div>

                    <div class="h-4 w-px bg-gray-200"></div> <!-- Vertical Divider -->

                    @auth
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" type="button" class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center">
                                <span class="text-xs font-semibold text-gray-600">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                        </button>
                        <div x-show="open" x-transition x-cloak class="absolute end-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 border border-gray-100 ring-1 ring-black ring-opacity-5">
                            <div class="px-4 py-2 text-xs text-gray-500 border-b border-gray-100 truncate">
                                {{ auth()->user()->email }}
                            </div>
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">Dashboard</a>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-start px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <!-- CTA Buttons -->
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">Log in</a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)]">
                        Get started
                    </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[var(--primary-color)]" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="h-6 w-6" x-show="mobileMenuOpen" x-cloak fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-collapse x-cloak class="md:hidden border-t border-gray-200 bg-white">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">Services</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">How it works</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">Creators</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">Pricing</a>
            </div>

            <div class="pt-4 pb-3 border-t border-gray-200">
                @auth
                <div class="flex items-center px-5 mb-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center border border-gray-200">
                            <span class="text-sm font-medium text-gray-600">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                    <div class="ms-3">
                        <div class="text-base font-medium text-gray-800">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="px-2 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50">Dashboard</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-start px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                            Log out
                        </button>
                    </form>
                </div>
                @else
                <div class="px-5 py-2 space-y-3">
                    <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 text-base font-medium text-gray-700 bg-white hover:bg-gray-50 border border-gray-300 rounded-lg transition-colors">
                        Log in
                    </a>
                    <a href="{{ route('register') }}" class="block w-full text-center px-4 py-2 text-base font-medium text-white bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg transition-colors">
                        Get started
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('navbar', () => ({
                mobileMenuOpen: false
            }))
        })
    </script>
    @endpush

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>