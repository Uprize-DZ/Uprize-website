<?php

namespace App\Livewire\Admin\ReservationsController;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Reservation;

#[Layout('components.layouts.admin')]
class Show extends Component
{
    public Reservation $reservation;

    public function mount(Reservation $reservation)
    {
        $this->reservation = $reservation->load('service');
    }

    public function confirm()
    {
        $this->reservation->update(['status' => 'confirmed']);
        $this->dispatch('alert', type: 'success', message: 'Reservation confirmed successfully');
    }

    public function cancel()
    {
        $this->reservation->update(['status' => 'cancelled']);
        $this->dispatch('alert', type: 'warning', message: 'Reservation cancelled');
    }

    public function delete()
    {
        $this->reservation->delete();
        session()->flash('alert', ['type' => 'info', 'message' => 'Reservation deleted']);
        return redirect()->route('admin.reservations.index');
    }

    public function render()
    {
        return view('livewire.admin.Reservations.show');
    }
}
