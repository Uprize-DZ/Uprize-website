<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use App\Models\Services;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\ReservationForm;
use App\Services\ReservationService;

class ServiceDetails extends Component
{
    public $service;

    public ReservationForm $form;

    public function mount($id)
    {
        $this->service = Services::findOrFail($id);
    }

    public function save(ReservationService $reservationService)
    {
        $this->form->validate();

        $reservation = $reservationService->createReservation(
            $this->form->all(),
            $this->service->id
        );

        return redirect()->route('reservation.success', $reservation->id);
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.layout.servicedetails.show');
    }
}
