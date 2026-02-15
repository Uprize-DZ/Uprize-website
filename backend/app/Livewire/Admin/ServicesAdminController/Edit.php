<?php

namespace App\Livewire\Admin\ServicesAdminController;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Services;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

    // Add this to track current video URL for display
    public $currentVideoUrl = null;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => $this->editingId ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'video' => 'nullable|file|mimes:mp4,mov,avi,webm|max:51200', // Increased to 50MB
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ];
    }

    public function updatedVideo()
    {
        $this->validate([
            'video' => 'nullable|file|mimes:mp4,mov,avi,webm|max:51200',
        ]);
    }

    public function updatedEditVideo()
    {
        $this->validate([
            'editVideo' => 'nullable|file|mimes:mp4,mov,avi,webm|max:51200',
        ]);
    }

    public function store()
    {
        try {
            $this->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|max:2048',
                'video' => 'nullable|file|mimes:mp4,mov,avi,webm|max:51200',
                'button_text' => 'nullable|string|max:255',
                'button_url' => 'nullable|string|max:255',
            ]);

            $imagePath = $this->image->store('services/images', 'public');
            $videoUrl = null;
            $videoPublicId = null;

            if ($this->video) {
                try {
                    $uploadedVideo = Cloudinary::uploadApi()->upload(
                        $this->video->getRealPath(),
                        [
                            'folder' => 'services/videos',
                            'resource_type' => 'video',
                        ]
                    );
                    $videoUrl = $uploadedVideo['secure_url'];
                    $videoPublicId = $uploadedVideo['public_id'];

                } catch (\Exception $e) {
                    \Illuminate\Support\Facades\Log::error('Video upload failed: ' . $e->getMessage(), ['exception' => $e]);
                    $this->dispatch('alert', type: 'error', message: 'Video upload failed: ' . $e->getMessage());
                    // Clean up the image if video fails
                    Storage::disk('public')->delete($imagePath);
                    return;
                }
            }

            Services::create([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $imagePath,
                'video_url' => $videoUrl,
                'video_public_id' => $videoPublicId,
                'button_text' => $this->button_text,
                'button_url' => $this->button_url,
                'is_active' => $this->is_active,
            ]);

            $this->reset(['title', 'description', 'image', 'video', 'button_text', 'button_url', 'is_active']);
            $this->dispatch('alert', type: 'success', message: 'Service created successfully');
        } catch (\Exception $e) {
            $this->dispatch('alert', type: 'error', message: 'Error: ' . $e->getMessage());
        }
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
        $this->currentVideoUrl = $service->video_url;
    }

    public function update()
    {
        try {
            $this->validate([
                'editTitle' => 'required|string|max:255',
                'editDescription' => 'required|string',
                'editImage' => 'nullable|image|max:2048',
                'editVideo' => 'nullable|file|mimes:mp4,mov,avi,webm|max:51200',
                'editButtonText' => 'nullable|string|max:255',
                'editButtonUrl' => 'nullable|string|max:255',
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
                try {
                    // Delete old video from Cloudinary
                    if ($service->video_public_id) {
                        Cloudinary::uploadApi()->destroy($service->video_public_id, ['resource_type' => 'video']);
                    }

                    // Upload new video
                    $uploadedVideo = Cloudinary::uploadApi()->upload(
                        $this->editVideo->getRealPath(),
                        [
                            'folder' => 'services/videos',
                            'resource_type' => 'video',
                        ]
                    );

                    $data['video_url'] = $uploadedVideo['secure_url'];
                    $data['video_public_id'] = $uploadedVideo['public_id'];
                } catch (\Exception $e) {
                    \Illuminate\Support\Facades\Log::error('Video upload (edit) failed: ' . $e->getMessage(), ['exception' => $e]);
                    $this->dispatch('alert', type: 'error', message: 'Video upload failed: ' . $e->getMessage());
                    return;
                }
            }

            $service->update($data);
            $this->dispatch('alert', type: 'success', message: 'Service updated successfully');

            // Force Livewire to reload services
            $this->dispatch('refreshServices')->self();

            $this->cancelEdit();

        } catch (\Exception $e) {
            $this->dispatch('alert', type: 'error', message: 'Error: ' . $e->getMessage());
        }
    }

    public function cancelEdit()
    {
        $this->reset(['editingId', 'editTitle', 'editDescription', 'editImage', 'editVideo', 'editButtonText', 'editButtonUrl', 'editIsActive', 'currentVideoUrl']);
    }

    public function toggleActive($id)
    {
        $service = Services::findOrFail($id);
        $service->update(['is_active' => !$service->is_active]);
    }

    public function delete($id)
    {
        try {
            $service = Services::findOrFail($id);

            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            if ($service->video_public_id) {
                Cloudinary::uploadApi()->destroy($service->video_public_id, ['resource_type' => 'video']);
            }

            $service->delete();
            $this->dispatch('alert', type: 'success', message: 'Service deleted successfully');
        } catch (\Exception $e) {
            $this->dispatch('alert', type: 'error', message: 'Error deleting service: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.services.edit', [
            'services' => Services::latest()->get()
        ]);
    }
}