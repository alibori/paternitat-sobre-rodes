<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Post extends Component
{
    public string $slug;

    public function render(): View|Factory|Application
    {
        return view('livewire.post', [
            'post' => \App\Models\Post::query()->where('slug', $this->slug)->with(['user', 'category'])->firstOrFail(),
        ]);
    }
}
