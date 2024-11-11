<?php

declare(strict_types=1);

namespace App\Actions\Scheduler;

use App\Enums\PostStatusEnum;
use App\Models\Post;

class PublishScheduledPostsAction
{
    public function __invoke(): void
    {
        $query = Post::query();

        $query->where('status', PostStatusEnum::Scheduled->value)
            ->whereDay('publish_on', now()->day)
            ->each(function (Post $post): void {
                $post->update([
                    'status' => PostStatusEnum::Published->value,
                    'published_at' => now(),
                ]);
            });
    }
}
