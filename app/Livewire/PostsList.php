<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    public bool $last = false;

    public function render(): View|Factory|Application
    {
        return view('livewire.posts-list', [
            'posts' => $this->last
            ? Post::query()->with(['category'])->orderBy('created_at', 'desc')->limit(3)->get()
            : Post::query()->with(['category'])->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
