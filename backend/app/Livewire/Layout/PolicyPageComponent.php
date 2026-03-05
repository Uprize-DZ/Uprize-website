<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\PolicyPage;

#[Layout('components.layouts.app')]
class PolicyPageComponent extends Component
{
    public string $type;
    public ?PolicyPage $page = null;

    public function mount(string $type): void
    {
        abort_unless(in_array($type, ['privacy', 'terms']), 404);

        $this->type = $type;
        $this->page = PolicyPage::where('type', $type)->first();
    }

    public function render()
    {
        return view('livewire.layout.policy-page');
    }
}
