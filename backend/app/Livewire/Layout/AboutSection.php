<?php

namespace App\Livewire\Layout;

use Livewire\Component;

use App\Models\AboutUs;
use App\Models\HowWeWork;

class AboutSection extends Component
{
    public function render()
    {
        $aboutUs = AboutUs::firstOrNew();
        $steps = HowWeWork::orderBy('order')->get();
        return view('livewire.layout.about-section', compact('aboutUs', 'steps'));
    }
}
