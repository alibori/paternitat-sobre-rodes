<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Enums\PostStatusEnum;
use App\Models\Post;
use DateTimeInterface;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;

class BlogPostsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected static ?string $pollingInterval = null;

    public function getStats(): array
    {
        /** @var DateTimeInterface|string|null $startDate */
        $startDate = $this->filters['startDate'] ?? null;

        /** @var DateTimeInterface|string|null $endDate */
        $endDate = $this->filters['endDate'] ?? null;

        return [
            StatsOverviewWidget\Stat::make(
                label: __('Total posts'),
                value: Post::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->count(),
            ),
            StatsOverviewWidget\Stat::make(
                label: __('Published posts'),
                value: Post::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->where('status', PostStatusEnum::Published->value)
                    ->count(),
            )->color('success'),
            StatsOverviewWidget\Stat::make(
                label: __('Scheduled posts'),
                value: Post::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->where('status', PostStatusEnum::Scheduled->value)
                    ->count(),
            )->color('info'),
            StatsOverviewWidget\Stat::make(
                label: __('Draft posts'),
                value: Post::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->where('status', PostStatusEnum::Draft->value)
                    ->count(),
            )->color('warning'),
            StatsOverviewWidget\Stat::make(
                label: __('Reviewing posts'),
                value: Post::query()
                    ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                    ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                    ->where('status', PostStatusEnum::Reviewing->value)
                    ->count(),
            )->color('info'),
        ];
    }
}
