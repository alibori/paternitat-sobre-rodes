<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Lukeraymonddowning\Honey\Traits\WithHoney;

class Contact extends Component
{
    use WithHoney;

    public ContactForm $form;

    public function send(): void
    {
        $this->validate();

        if ($this->honeyPasses()) {
            Mail::to(config('paternitat.emails_to'))
                ->queue(new \App\Mail\ContactForm($this->form->toArray()));
        }


        $this->form->reset();

        session()->flash('success', __('Message sent successfully. I will contact you as soon as possible!'));
    }

    public function render(): View|Factory|Application
    {
        return view('livewire.contact');
    }
}
