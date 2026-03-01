<div class="p-6">
    <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.reservations.index') }}" class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-gray-600 hover:border-gray-300 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Reservation Details</h1>
        </div>
        <div class="flex items-center gap-3">
            @if($reservation->status === 'pending')
            <button wire:click="confirm" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Confirm
            </button>
            <button wire:click="cancel" class="px-4 py-2 bg-white border border-red-200 text-red-600 rounded-lg hover:bg-red-50 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Cancel
            </button>
            @endif
            <button wire:click="delete" wire:confirm="Are you sure you want to delete this reservation?" class="px-4 py-2 bg-white border border-gray-200 text-gray-500 rounded-lg hover:bg-gray-50 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                Delete
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Client Information --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Client Information</h2>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Full Name</label>
                        <p class="text-gray-900 font-medium">{{ $reservation->name }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Email Address</label>
                        <p class="text-gray-900 font-medium">{{ $reservation->email }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Phone Number</label>
                        <p class="text-gray-900 font-medium">{{ $reservation->phone ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Service Requested</label>
                        <span class="inline-flex px-2 py-1 rounded-md bg-indigo-50 text-indigo-700 text-sm font-medium">
                            {{ $reservation->service?->title ?? 'N/A' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Project Details</h2>
                </div>
                <div class="p-6">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Message / Requirements</label>
                    <div class="mt-2 text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-lg border border-gray-100 italic">
                        {{ $reservation->message ?? 'No additional details provided.' }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800">Reservation Status</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Current Status</label>
                        @php
                        $statusClasses = [
                        'pending' => 'bg-yellow-50 text-yellow-700 border-yellow-100',
                        'confirmed' => 'bg-green-50 text-green-700 border-green-100',
                        'cancelled' => 'bg-red-50 text-red-700 border-red-100',
                        ][$reservation->status] ?? 'bg-gray-50 text-gray-700 border-gray-100';
                        @endphp
                        <span class="inline-flex px-4 py-1.5 rounded-full text-sm font-bold border {{ $statusClasses }}">
                            {{ ucfirst($reservation->status) }}
                        </span>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Preferred Date</label>
                        <p class="text-gray-900 font-medium">{{ $reservation->preferred_date?->format('F d, Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="pt-4 border-t border-gray-50">
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Received On</label>
                        <p class="text-xs text-gray-500">{{ $reservation->created_at->format('M d, Y @ H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>