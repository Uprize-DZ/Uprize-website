<?php

namespace App\Livewire\Admin\HomeAdminController;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Home;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    use WithFileUploads;
    #[Validate('nullable|string|max:255')]
    public $title;

    #[Validate('nullable|string|max:255')]
    public $subtitle;

    #[Validate('nullable|string|max:255')]
    public $button_text;

    #[Validate('nullable|string|max:255')]
    public $button_url;

    #[Validate('nullable|image|max:5120')]
    public $image;



    public function mount()
    {
        $home = Home::firstOrNew();
        $this->title = $home->title;
        $this->subtitle = $home->subtitle;
        $this->button_text = $home->button_text;
        $this->button_url = $home->button_url;
        $this->image = $home->image;
    }

    public function update()
    {


        $this->validate();

        $home = Home::firstOrNew();

        $home->title = $this->title;
        $home->subtitle = $this->subtitle;
        $home->button_text = $this->button_text;
        $home->button_url = $this->button_url;

        if ($this->image) {
            if ($home->image) {
                Storage::disk('public')->delete($home->image);
            }
            $home->image = $this->image->store('home', 'public');
        }

        $home->save();

        $this->dispatch('alert', type: 'success', message: 'Home updated successfully');
    }


    public function render()
    {
        return view('livewire.admin.adminHome.edit');
    }
}