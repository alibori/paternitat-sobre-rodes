<?php

declare(strict_types=1);

use App\Livewire\Blog;
use App\Livewire\Contact;
use App\Livewire\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('index');

Route::get('/qui-soc', fn () => view('about'))->name('about');

Route::prefix('blog')->group(function (): void {
    Route::get('/', Blog::class)->name('blog.index');
    Route::get('/{slug}', Post::class)->name('posts.show');
});

Route::get('/contacte', Contact::class)->name('contact');
