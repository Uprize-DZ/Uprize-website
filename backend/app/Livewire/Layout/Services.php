<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use App\Models\Services as ServicesModel;

class Services extends Component
{
    public function render()
    {
        return view('livewire.layout.services', [
            'services' => ServicesModel::where('is_active', true)->get()
        ]);
    }
}
