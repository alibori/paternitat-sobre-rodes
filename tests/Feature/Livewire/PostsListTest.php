<?php

declare(strict_types=1);

use App\Livewire\PostsList;

test('renders successfully', function (): void {
    Livewire::test(PostsList::class)
        ->assertStatus(200);
});

test('component exists on homepage', function (): void {
    $this->get('/')
        ->assertSeeLivewire(PostsList::class);
});

test('component exists on blog page', function (): void {
    $this->get('/blog')
        ->assertSeeLivewire(PostsList::class);
});
