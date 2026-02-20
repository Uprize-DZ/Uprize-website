<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-16">
    <div class="max-w-5xl mx-auto px-6 lg:px-8">
        <!-- Back Button -->
        <a href="{{ url('/') }}#services" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-8 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Services
        </a>

        <!-- Service Details Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-12 text-white">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    @if($service->image)
                    <div class="w-32 h-32 bg-white rounded-2xl p-4 flex-shrink-0 shadow-lg">
                        <img src="{{ asset('storage/' . $service->image) }}"
                            class="w-full h-full object-contain"
                            alt="{{ $service->title }}">
                    </div>
                    @endif
                    <div class="text-center md:text-left">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $service->title }}</h1>
                        <p class="text-xl text-indigo-100">{{ $service->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="px-8 py-12">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">About This Service</h2>

                    <!-- You can add more fields from your database here -->
                    <div class="bg-gray-50 rounded-xl p-6 mb-8">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>

                    <!-- Additional Features Section (if you have this data) -->
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Key Features</h3>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Professional quality service</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Fast turnaround time</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Dedicated support</span>
                        </li>
                    </ul>

                    <!-- CTA Section -->
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-8 text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Ready to get started?</h3>
                        <a href="{{ $service->button_url ?? route('register') }}"
                            class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all transform hover:scale-105 shadow-lg">
                            {{ $service->button_text ?? 'Get started free' }}
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>