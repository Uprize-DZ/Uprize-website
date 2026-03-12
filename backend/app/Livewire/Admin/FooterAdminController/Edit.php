<?php

namespace App\Livewire\Admin\FooterAdminController;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Entity;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    public $entityId;
    public $name;
    public $slogan;
    public $description;
    public $website;
    public $email;
    public $phone;
    public $address;

    // Social Media Links
    public $facebook_url;
    public $instagram_url;
    public $twitter_url;
    public $youtube_url;
    public $linkedin_url;
    public $tiktok_url;
    public $whatsapp_number;

    public function mount()
    {
        $entity = Entity::first();
        if ($entity) {
            $this->entityId = $entity->id;
            $this->name = $entity->name;
            $this->slogan = $entity->slogan;
            $this->description = $entity->description;
            $this->website = $entity->website;
            $this->email = $entity->email;
            $this->phone = $entity->phone;
            $this->address = $entity->address;

            // Social Media Links
            $this->facebook_url = $entity->facebook_url;
            $this->instagram_url = $entity->instagram_url;
            $this->twitter_url = $entity->twitter_url;
            $this->youtube_url = $entity->youtube_url;
            $this->linkedin_url = $entity->linkedin_url;
            $this->tiktok_url = $entity->tiktok_url;
            $this->whatsapp_number = $entity->whatsapp_number;
        }
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:512',
            'website' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:21',
            'address' => 'nullable|string|max:512',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
        ];
    }

    public function update()
    {
        $this->validate();

        $entity = Entity::find($this->entityId);
        if ($entity) {
            $entity->update([
                'name' => $this->name,
                'slogan' => $this->slogan,
                'description' => $this->description,
                'website' => $this->website,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'facebook_url' => $this->facebook_url,
                'instagram_url' => $this->instagram_url,
                'twitter_url' => $this->twitter_url,
                'youtube_url' => $this->youtube_url,
                'linkedin_url' => $this->linkedin_url,
                'tiktok_url' => $this->tiktok_url,
                'whatsapp_number' => $this->whatsapp_number,
            ]);

            $this->dispatch('alert', type: 'success', message: 'Footer information updated successfully');
        }
    }

    public function render()
    {
        return view('livewire.admin.footer.edit');
    }
}
