<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate('required|string')]
    public ?string $name = null;

    public ?string $surname = null;

    #[Validate('required|email')]
    public ?string $email = null;

    #[Validate('required|string')]
    public ?string $message = null;
}
