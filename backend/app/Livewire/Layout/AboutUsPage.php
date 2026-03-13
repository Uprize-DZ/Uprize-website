<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\AboutUs;
use App\Models\HowWeWork;

#[Layout('components.layouts.app')]
class AboutUsPage extends Component
{
    public function render()
    {
        $aboutUs = AboutUs::firstOrNew();
        $steps = HowWeWork::orderBy('order')->get();

        return view('livewire.pages.about-us', compact('aboutUs', 'steps'));
    }
}
