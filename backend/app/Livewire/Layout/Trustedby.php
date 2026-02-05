<?php

namespace App\Livewire\Layout;

use App\Models\TrustedBy as TrustedByModel;
use Livewire\Component;

class TrustedBy extends Component
{
    public function render()
    {
        return view('livewire.layout.trustedby', [
            'companies' => TrustedByModel::where('is_active', true)
                ->orderBy('created_at', 'asc')
                ->get()
        ]);
    }
}
