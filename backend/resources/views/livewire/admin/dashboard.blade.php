<div>
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Welcome, {{ auth()->user()->name }}</h1>
                <p class="mt-2 text-sm text-gray-600">Quickly manage different sections of your website from here.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Home Page Card -->
                <a href="{{ route('admin.home.edit') }}"
                    class="block p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all group">
                    <div
                        class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[var(--primary-color)] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 0 01-1 1h-3m-6 0a1 0 001-1v-4a1 0 011-1h2a1 0 011 1v4a1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Home Page</h3>
                    <p class="text-sm text-gray-500 mt-1">Edit titles, subtitles, and hero images.</p>
                </a>

                <!-- Trusted By Card -->
                <a href="{{ route('admin.trustedby.edit') }}"
                    class="block p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all group">
                    <div
                        class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[var(--primary-color)] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Trusted By</h3>
                    <p class="text-sm text-gray-500 mt-1">Manage partner logos and references.</p>
                </a>

                <!-- Services Card -->
                <a href="{{ route('admin.services.edit') }}"
                    class="block p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all group">
                    <div
                        class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[var(--primary-color)] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Services</h3>
                    <p class="text-sm text-gray-500 mt-1">Create and manage your service offerings.</p>
                </a>

                <!-- Reservations Card -->
                <a href="{{ route('admin.reservations.index') }}"
                    class="block p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all group">
                    <div
                        class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[var(--primary-color)] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Reservations</h3>
                    <p class="text-sm text-gray-500 mt-1">View and manage service bookings.</p>
                </a>

                <!-- Privacy Policy Card -->
                <a href="{{ route('admin.policy.edit', ['type' => 'privacy']) }}"
                    class="block p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all group">
                    <div
                        class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[var(--primary-color)] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm0 0V7m0 4v4m6 4H6a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2 2 2h3a2 2 0 012 2v12a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Privacy Policy</h3>
                    <p class="text-sm text-gray-500 mt-1">Edit the privacy policy page content.</p>
                </a>

                <!-- Terms & Conditions Card -->
                <a href="{{ route('admin.policy.edit', ['type' => 'terms']) }}"
                    class="block p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all group">
                    <div
                        class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-[var(--primary-color)] group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Terms &amp; Conditions</h3>
                    <p class="text-sm text-gray-500 mt-1">Edit the terms and conditions page content.</p>
                </a>
            </div>

            {{-- Recent Reservations Table --}}
            <div class="mt-12 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">Recent Reservations</h2>
                    <a href="{{ route('admin.reservations.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-4 font-semibold text-xs tracking-wider border-b border-gray-100">Client</th>
                                <th class="px-6 py-4 font-semibold text-xs tracking-wider border-b border-gray-100">Service</th>
                                <th class="px-6 py-4 font-semibold text-xs tracking-wider border-b border-gray-100">Date</th>
                                <th class="px-6 py-4 font-semibold text-xs tracking-wider border-b border-gray-100">Status</th>
                                <th class="px-6 py-4 font-semibold text-xs tracking-wider border-b border-gray-100 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($recentReservations as $reservation)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ $reservation->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $reservation->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-md bg-indigo-50 text-indigo-700 text-xs font-medium">
                                        {{ $reservation->service?->title ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $reservation->preferred_date?->format('M d, Y') ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                    $statusClasses = [
                                    'pending' => 'bg-yellow-50 text-yellow-700 border-yellow-100',
                                    'confirmed' => 'bg-green-50 text-green-700 border-green-100',
                                    'cancelled' => 'bg-red-50 text-red-700 border-red-100',
                                    ][$reservation->status] ?? 'bg-gray-50 text-gray-700 border-gray-100';
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold border {{ $statusClasses }}">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.reservations.show', $reservation) }}" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">No reservations found yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>