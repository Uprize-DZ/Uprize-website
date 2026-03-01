<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        $recentReservations = \App\Models\Reservation::with('service')->latest()->take(5)->get();
        return view('livewire.admin.dashboard', [
            'recentReservations' => $recentReservations
        ]);
    }
}
