<?php

use App\Livewire\PostsList;

test('renders successfully', function () {
    Livewire::test(PostsList::class)
        ->assertStatus(200);
});

test('component exists on homepage', function () {
    $this->get('/')
        ->assertSeeLivewire(PostsList::class);
});

test('component exists on blog page', function () {
    $this->get('/blog')
        ->assertSeeLivewire(PostsList::class);
});
