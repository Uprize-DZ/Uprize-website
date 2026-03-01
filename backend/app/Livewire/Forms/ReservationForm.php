<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class ReservationForm extends Form
{
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('nullable|string|max:20')]
    public $phone = '';

    #[Validate('required|date|after_or_equal:today')]
    public $preferred_date = '';

    #[Validate('nullable|string')]
    public $message = '';
}
