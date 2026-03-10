<div>
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('storage/uprizelogo.png') }}" alt="Logo" class="h-12 rounded-lg">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                        Services
                    </a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                        Contact
                    </a>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                        About
                    </a>

                </div>

                <!-- Right Side Actions -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Language Selector -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors flex items-center space-x-1">
                            <span>En</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak
                            class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg py-1 border border-gray-200">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">English</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Français</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">العربية</a>
                        </div>
                    </div>

                    @auth
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                                <span
                                    class="text-xs font-semibold text-gray-600">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 border border-gray-200">
                            <a href="{{ route('admin.dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Dashboard</a>
                            <hr class="my-1">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <!-- CTA Button -->
                    <a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2 text-sm font-medium text-white bg-primary hover:bg-secondary rounded-md transition-colors">
                        Get started
                    </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden border-t border-gray-200 bg-white">
            <div class="px-4 py-3 space-y-3">
                <a href="{{ route('home') }}"
                    class="block text-base font-medium text-gray-700 hover:text-gray-900">Company</a>
                <a href="#" class="block text-base font-medium text-gray-700 hover:text-gray-900">Products</a>
                <a href="#" class="block text-base font-medium text-gray-700 hover:text-gray-900">Solutions</a>
                <a href="#" class="block text-base font-medium text-gray-700 hover:text-gray-900">Career</a>

                @auth
                <hr class="my-3">
                <a href="{{ route('admin.dashboard') }}"
                    class="block text-base font-medium text-gray-700 hover:text-gray-900">Dashboard</a>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left text-base font-medium text-gray-700 hover:text-gray-900">
                        Logout
                    </button>
                </form>
                @else
                <hr class="my-3">
                <a href="{{ route('login') }}"
                    class="block text-base font-medium text-gray-700 hover:text-gray-900">Sign
                    in</a>
                <a href="{{ route('register') }}"
                    class="block w-full text-center px-5 py-2 text-base font-medium text-white bg-primary hover:bg-secondary rounded-md transition-colors">
                    Get started
                </a>
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