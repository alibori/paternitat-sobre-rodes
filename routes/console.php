<?php

declare(strict_types=1);

use App\Actions\Scheduler\PublishScheduledPostsAction;

Schedule::call(new PublishScheduledPostsAction())->dailyAt('09:00');
