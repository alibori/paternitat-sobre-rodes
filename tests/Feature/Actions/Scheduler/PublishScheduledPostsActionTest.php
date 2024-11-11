<?php

use App\Actions\Scheduler\PublishScheduledPostsAction;
use App\Enums\PostStatusEnum;
use Database\Factories\PostFactory;

test('publish scheduled posts', function (): void {
    $post = PostFactory::new()->create([
        'status' => PostStatusEnum::Scheduled->value,
        'publish_on' => now(),
    ]);

    app(PublishScheduledPostsAction::class)->__invoke();

    expect($post->refresh()->status)->toBe(PostStatusEnum::Published)
        ->and($post->refresh()->published_at->format('Y-m-d H:i:s'))->toBe(now()->format('Y-m-d H:i:s'));
});
