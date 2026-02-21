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
            ]);

            $this->dispatch('alert', type: 'success', message: 'Footer information updated successfully');
        }
    }

    public function render()
    {
        return view('livewire.admin.footer.edit');
    }
}
