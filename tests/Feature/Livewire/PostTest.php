<?php

declare(strict_types=1);

use App\Enums\PostStatusEnum;
use Database\Factories\PostFactory;
use Database\Factories\UserFactory;

test('renders successfully', function (): void {
    $user = UserFactory::new()->create();

    $post = PostFactory::new()->create([
        'user_id' => $user->id,
        'status' => PostStatusEnum::Published->value,
        'published_at' => now(),
    ]);

    Livewire::test(App\Livewire\Post::class, ['slug' => $post->slug])
        ->assertStatus(200);
});
