<?php

namespace App\Livewire\Admin\AboutUsAdminController;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\AboutUs;
use App\Models\HowWeWork;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    use WithFileUploads;

    // Hero Section
    #[Validate('required|string|max:255')]
    public $hero_title;

    #[Validate('required|string|max:500')]
    public $hero_subtitle;

    #[Validate('nullable|image|max:5120')]
    public $newHeroImage;
    public $existingHeroImage;

    // Premium Media & Storytelling Fields
    #[Validate('required|in:image,video')]
    public $media_type = 'image';

    #[Validate('nullable|string|max:2048')]
    public $media_url;

    #[Validate('nullable|file|mimes:mp4,mov,avi,webm|max:51200')]
    public $newMediaVideo;

    #[Validate('nullable|string|max:255')]
    public $media_public_id;

    #[Validate('nullable|string|max:255')]
    public $label;

    #[Validate('nullable|string|max:255')]
    public $bullet1;

    #[Validate('nullable|string|max:255')]
    public $bullet2;

    #[Validate('nullable|string|max:255')]
    public $bullet3;

    // Mission / Vision / Values
    #[Validate('nullable|string|max:255')]
    public $mission_title;

    #[Validate('nullable|string')]
    public $mission_description;

    #[Validate('nullable|string|max:255')]
    public $vision_title;

    #[Validate('nullable|string')]
    public $vision_description;

    #[Validate('nullable|string|max:255')]
    public $values_title;

    #[Validate('nullable|string')]
    public $values_description;

    // Stats
    #[Validate('nullable|string|max:50')]
    public $stat1_number;
    #[Validate('nullable|string|max:100')]
    public $stat1_label;

    #[Validate('nullable|string|max:50')]
    public $stat2_number;
    #[Validate('nullable|string|max:100')]
    public $stat2_label;

    #[Validate('nullable|string|max:50')]
    public $stat3_number;
    #[Validate('nullable|string|max:100')]
    public $stat3_label;

    #[Validate('nullable|string|max:50')]
    public $stat4_number;
    #[Validate('nullable|string|max:100')]
    public $stat4_label;

    // CTA
    #[Validate('nullable|string|max:255')]
    public $cta_text;
    #[Validate('nullable|string|max:255')]
    public $cta_url;

    // How We Work steps
    public array $steps = [];
    public string $newStepTitle = '';
    public string $newStepDescription = '';

    public function mount(): void
    {
        $about = AboutUs::firstOrNew();
        $this->hero_title = $about->hero_title ?? '';
        $this->hero_subtitle = $about->hero_subtitle ?? '';
        $this->existingHeroImage = $about->hero_image;
        
        $this->media_type = $about->media_type ?? 'image';
        $this->media_url = $about->media_url ?? '';
        $this->media_public_id = $about->media_public_id ?? '';
        $this->label = $about->label ?? '';
        $this->bullet1 = $about->bullet1 ?? '';
        $this->bullet2 = $about->bullet2 ?? '';
        $this->bullet3 = $about->bullet3 ?? '';
        $this->mission_title = $about->mission_title ?? '';
        $this->mission_description = $about->mission_description ?? '';
        $this->vision_title = $about->vision_title ?? '';
        $this->vision_description = $about->vision_description ?? '';
        $this->values_title = $about->values_title ?? '';
        $this->values_description = $about->values_description ?? '';
        $this->stat1_number = $about->stat1_number ?? '';
        $this->stat1_label = $about->stat1_label ?? '';
        $this->stat2_number = $about->stat2_number ?? '';
        $this->stat2_label = $about->stat2_label ?? '';
        $this->stat3_number = $about->stat3_number ?? '';
        $this->stat3_label = $about->stat3_label ?? '';
        $this->stat4_number = $about->stat4_number ?? '';
        $this->stat4_label = $about->stat4_label ?? '';
        $this->cta_text = $about->cta_text ?? '';
        $this->cta_url = $about->cta_url ?? '';

        $this->steps = HowWeWork::orderBy('order')->get()->toArray();
    }

    public function addStep(): void
    {
        if (empty(trim($this->newStepTitle))) return;

        HowWeWork::create([
            'step_number' => count($this->steps) + 1,
            'title' => $this->newStepTitle,
            'description' => $this->newStepDescription,
            'order' => count($this->steps),
        ]);

        $this->newStepTitle = '';
        $this->newStepDescription = '';
        $this->steps = HowWeWork::orderBy('order')->get()->toArray();
        $this->dispatch('alert', type: 'success', message: 'Step added successfully');
    }

    public function deleteStep(int $id): void
    {
        HowWeWork::find($id)?->delete();
        $this->steps = HowWeWork::orderBy('order')->get()->toArray();
        $this->dispatch('alert', type: 'success', message: 'Step deleted successfully');
    }

    public function update(): void
    {
        $this->validate();

        $about = AboutUs::firstOrNew();
        $about->hero_title = $this->hero_title;
        $about->hero_subtitle = $this->hero_subtitle;
        $about->media_type = $this->media_type;
        $about->media_url = $this->media_url;
        $about->media_public_id = $this->media_public_id;
        $about->label = $this->label;
        $about->bullet1 = $this->bullet1;
        $about->bullet2 = $this->bullet2;
        $about->bullet3 = $this->bullet3;
        $about->mission_title = $this->mission_title;
        $about->mission_description = $this->mission_description;
        $about->vision_title = $this->vision_title;
        $about->vision_description = $this->vision_description;
        $about->values_title = $this->values_title;
        $about->values_description = $this->values_description;
        $about->stat1_number = $this->stat1_number;
        $about->stat1_label = $this->stat1_label;
        $about->stat2_number = $this->stat2_number;
        $about->stat2_label = $this->stat2_label;
        $about->stat3_number = $this->stat3_number;
        $about->stat3_label = $this->stat3_label;
        $about->stat4_number = $this->stat4_number;
        $about->stat4_label = $this->stat4_label;
        $about->cta_text = $this->cta_text;
        $about->cta_url = $this->cta_url;

        if ($this->newHeroImage) {
            if ($about->hero_image) {
                Storage::disk('public')->delete($about->hero_image);
            }
            $about->hero_image = $this->newHeroImage->store('about', 'public');
        }

        if ($this->media_type === 'video' && $this->newMediaVideo) {
            try {
                // Delete old video from Cloudinary if it exists
                if ($about->media_public_id) {
                    Cloudinary::uploadApi()->destroy($about->media_public_id, ['resource_type' => 'video']);
                }

                // Upload new video
                $uploadedVideo = Cloudinary::uploadApi()->upload(
                    $this->newMediaVideo->getRealPath(),
                    [
                        'folder' => 'about/videos',
                        'resource_type' => 'video',
                    ]
                );

                $about->media_url = $uploadedVideo['secure_url'];
                $about->media_public_id = $uploadedVideo['public_id'];
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Video upload failed: ' . $e->getMessage(), ['exception' => $e]);
                $this->dispatch('alert', type: 'error', message: 'Video upload failed: ' . $e->getMessage());
                return;
            }
        } elseif ($this->media_type === 'image') {
            // Keep existing media_url if it's set manually as a string (or we could add image upload for media too)
            // But right now the user can type a url in media_url or the view falls back to hero_image
        }

        $about->save();
        $this->existingHeroImage = $about->hero_image;
        $this->dispatch('alert', type: 'success', message: 'About Us page updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.aboutUs.edit');
    }
}
