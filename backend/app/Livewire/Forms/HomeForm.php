<?php

namespace App\Livewire\Forms;

use App\Models\Home;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class HomeForm extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'home' => Home::firstOrNew(),
        ]);
    }
}
