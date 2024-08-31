<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Actions\ListPublishedPostsAction;
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
            ? app(ListPublishedPostsAction::class)->execute(['category'], [], ['created_at' => 'desc'], false, null, 3)
            : app(ListPublishedPostsAction::class)->execute(['category'], [], ['created_at' => 'desc'])
        ]);
    }
}
