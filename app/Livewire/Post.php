<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Actions\ListPublishedPostsAction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Post extends Component
{
    public string $slug;

    public function render(): View|Factory|Application
    {
        /** @var Collection<int,\App\Models\Post> $result */
        $result = app(ListPublishedPostsAction::class)->execute(['user', 'category'], ['slug' => $this->slug], [], false, null);

        return view('livewire.post', [
            'post' => $result->first(),
        ]);
    }
}
