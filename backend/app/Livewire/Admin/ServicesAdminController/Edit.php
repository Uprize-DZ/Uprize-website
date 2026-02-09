<?php

namespace App\Livewire\Admin\ServicesAdminController;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Services;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    use WithFileUploads;

    // For New Entry
    public $title;
    public $description;
    public $image;
    public $video;
    public $button_text;
    public $button_url;
    public $is_active = true;

    // For Editing
    public $editingId = null;
    public $editTitle;
    public $editDescription;
    public $editImage;
    public $editVideo;
    public $editButtonText;
    public $editButtonUrl;
    public $editIsActive;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:10240', // Allowing up to 10MB for video
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ];
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:10240',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url|max:255',
        ]);

        $imagePath = $this->image->store('services/images', 'public');
        $videoPath = $this->video ? $this->video->store('services/videos', 'public') : null;

        Services::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
            'video_url' => $videoPath,
            'button_text' => $this->button_text,
            'button_url' => $this->button_url,
            'is_active' => $this->is_active,
        ]);

        $this->reset(['title', 'description', 'image', 'video', 'button_text', 'button_url', 'is_active']);
        $this->dispatch('alert', type: 'success', message: 'Service created successfully');
    }

    public function edit($id)
    {
        $service = Services::findOrFail($id);
        $this->editingId = $id;
        $this->editTitle = $service->title;
        $this->editDescription = $service->description;
        $this->editButtonText = $service->button_text;
        $this->editButtonUrl = $service->button_url;
        $this->editIsActive = $service->is_active;
    }

    public function update()
    {
        $this->validate([
            'editTitle' => 'required|string|max:255',
            'editDescription' => 'required|string',
            'editImage' => 'nullable|image|max:2048',
            'editVideo' => 'nullable|file|mimes:mp4,mov,avi|max:10240',
            'editButtonText' => 'nullable|string|max:255',
            'editButtonUrl' => 'nullable|url|max:255',
        ]);

        $service = Services::findOrFail($this->editingId);
        
        $data = [
            'title' => $this->editTitle,
            'description' => $this->editDescription,
            'button_text' => $this->editButtonText,
            'button_url' => $this->editButtonUrl,
            'is_active' => $this->editIsActive,
        ];

        if ($this->editImage) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $this->editImage->store('services/images', 'public');
        }

        if ($this->editVideo) {
            if ($service->video_url) {
                Storage::disk('public')->delete($service->video_url);
            }
            $data['video_url'] = $this->editVideo->store('services/videos', 'public');
        }

        $service->update($data);

        $this->cancelEdit();
        $this->dispatch('alert', type: 'success', message: 'Service updated successfully');
    }

    public function cancelEdit()
    {
        $this->reset(['editingId', 'editTitle', 'editDescription', 'editImage', 'editVideo', 'editButtonText', 'editButtonUrl', 'editIsActive']);
    }

    public function toggleActive($id)
    {
        $service = Services::findOrFail($id);
        $service->update(['is_active' => !$service->is_active]);
    }

    public function delete($id)
    {
        $service = Services::findOrFail($id);
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        if ($service->video_url) {
            Storage::disk('public')->delete($service->video_url);
        }
        $service->delete();
        $this->dispatch('alert', type: 'success', message: 'Service deleted successfully');
    }

    public function render()
    {
        return view('livewire.admin.services.edit', [
            'services' => Services::latest()->get()
        ]);
    }
}