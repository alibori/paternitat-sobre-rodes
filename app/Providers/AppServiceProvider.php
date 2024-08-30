<?php

declare(strict_types=1);

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict( ! $this->app->isProduction());

        Carbon::setLocale(app()->getLocale());

        Str::macro('readDuration', function (...$text) {
            $total_words = str_word_count(implode(" ", $text));
            $minutes_to_read = round($total_words / 200);

            return (int)max(1, $minutes_to_read);
        });
    }
}
