<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use App\Models\Reservation;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class ReservationSuccess extends Component
{
    public Reservation $reservation;

    public function mount(Reservation $reservation)
    {
        // Load the related service to display its details
        $this->reservation = $reservation->load('service');
    }

    public function render()
    {
        return view('livewire.layout.reservation-success');
    }
}
