<?php

namespace App\Livewire\Admin\TrustedByAdminController;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\TrustedBy;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    use WithFileUploads;

    public $name;
    public $url;
    public $image;
    public $is_active = true;

    public $editingId = null;
    public $editName;
    public $editUrl;
    public $editImage;
    public $editIsActive;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'image' => $this->editingId ? 'nullable|image|max:1024' : 'required|image|max:1024',
            'is_active' => 'boolean',
        ];
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'image' => 'required|image|max:1024',
        ]);

        $path = $this->image->store('trusted-by', 'public');

        TrustedBy::create([
            'name' => $this->name,
            'url' => $this->url,
            'image' => $path,
            'is_active' => $this->is_active,
        ]);

        $this->reset(['name', 'url', 'image', 'is_active']);
        $this->dispatch('alert', type: 'success', message: 'Company added successfully');
    }

    public function edit($id)
    {
        $item = TrustedBy::findOrFail($id);
        $this->editingId = $id;
        $this->editName = $item->name;
        $this->editUrl = $item->url;
        $this->editIsActive = $item->is_active;
    }

    public function update()
    {
        $this->validate([
            'editName' => 'required|string|max:255',
            'editUrl' => 'required|url|max:255',
            'editImage' => 'nullable|image|max:1024',
        ]);

        $item = TrustedBy::findOrFail($this->editingId);

        $data = [
            'name' => $this->editName,
            'url' => $this->editUrl,
            'is_active' => $this->editIsActive,
        ];

        if ($this->editImage) {
            Storage::disk('public')->delete($item->image);
            $data['image'] = $this->editImage->store('trusted-by', 'public');
        }

        $item->update($data);

        $this->cancelEdit();
        $this->dispatch('alert', type: 'success', message: 'Company updated successfully');
    }

    public function cancelEdit()
    {
        $this->reset(['editingId', 'editName', 'editUrl', 'editImage', 'editIsActive']);
    }

    public function toggleActive($id)
    {
        $item = TrustedBy::findOrFail($id);
        $item->update(['is_active' => !$item->is_active]);
    }

    public function delete($id)
    {
        $item = TrustedBy::findOrFail($id);
        Storage::disk('public')->delete($item->image);
        $item->delete();
        $this->dispatch('alert', type: 'success', message: 'Company deleted successfully');
    }

    public function render()
    {
        return view('livewire.admin.trustedby.edit', [
            'companies' => TrustedBy::latest()->get(),
        ]);
    }
}