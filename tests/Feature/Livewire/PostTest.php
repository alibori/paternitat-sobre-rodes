<?php

use App\Enums\PostStatusEnum;
use Database\Factories\PostFactory;
use Database\Factories\UserFactory;

test('renders successfully', function () {
    $user = UserFactory::new()->create();

    $post = PostFactory::new()->create([
        'user_id' => $user->id,
        'status' => PostStatusEnum::Published->value,
    ]);

    Livewire::test(\App\Livewire\Post::class, ['slug' => $post->slug])
        ->assertStatus(200);
});
