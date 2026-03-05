<x-app-layout>

    <section class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white pt-16 pb-24 min-h-screen">

        <!-- Subtle background blobs -->
        <div class="absolute top-0 right-0 w-80 h-80 bg-gray-100 rounded-full filter blur-3xl opacity-40 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-gray-100 rounded-full filter blur-3xl opacity-40 pointer-events-none"></div>

        <div class="max-w-3xl mx-auto px-6 lg:px-8 relative z-10">

            @if($page)

            <!-- Page Title -->
            <div class="mb-12">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight tracking-tight">
                    {{ $page->title }}
                </h1>
                <div class="mt-4 h-px bg-gray-200"></div>
            </div>

            <!-- Body Content -->
            <div class="text-base text-gray-600 leading-relaxed whitespace-pre-line">
                {{ $page->body }}
            </div>

            @else

            <div class="text-center py-24">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">Page Not Found</h1>
                <p class="text-gray-500">This page has not been set up yet.</p>
                <a href="{{ url('/') }}" class="mt-8 inline-block text-sm text-gray-500 hover:text-gray-900 transition-colors">← Back to home</a>
            </div>

            @endif

        </div>
    </section>

</x-app-layout>