<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Contact extends Component
{
    public function render(): View|Factory|Application
    {
        return view('livewire.contact');
    }
}
