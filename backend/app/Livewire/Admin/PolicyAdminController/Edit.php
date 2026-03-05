<?php

namespace App\Livewire\Admin\PolicyAdminController;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\PolicyPage;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    public string $type;

    public string $title = '';
    public string $body  = '';

    public function mount(string $type): void
    {
        abort_unless(in_array($type, ['privacy', 'terms']), 404);

        $this->type = $type;

        $page = PolicyPage::where('type', $type)->first();

        if ($page) {
            $this->title = $page->title;
            $this->body  = $page->body ?? '';
        }
    }

    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'body'  => 'nullable|string',
        ];
    }

    public function update(): void
    {
        $this->validate();

        PolicyPage::updateOrCreate(
            ['type' => $this->type],
            ['title' => $this->title, 'body' => $this->body]
        );

        $this->dispatch('alert', type: 'success', message: 'Page updated successfully.');
    }

    public function render()
    {
        $label = $this->type === 'privacy' ? 'Privacy Policy' : 'Terms and Conditions';

        return view('livewire.admin.policy.edit', compact('label'));
    }
}
