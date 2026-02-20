<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use App\Models\Services;
use Livewire\Attributes\Layout;

class ServiceDetails extends Component
{
    public $service;

    public function mount($id)
    {
        $this->service = Services::findOrFail($id);
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.layout.servicedetails.show');
    }
}
