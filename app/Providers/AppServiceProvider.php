<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\MenuPolicy;
use App\Policies\PagePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\UserPolicy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $this->configureRestrictions();

        $this->configureApp();

        $this->configureGatesAndPolicies();
    }

    protected function configureRestrictions(): void
    {
        Model::shouldBeStrict();

        DB::prohibitDestructiveCommands($this->app->isProduction());
    }

    protected function configureApp(): void
    {
        Carbon::setLocale(app()->getLocale());

        Str::macro('readDuration', function (...$text) {
            $total_words = str_word_count(implode(" ", $text));
            $minutes_to_read = round($total_words / 200);

            return (int)max(1, $minutes_to_read);
        });
    }

    protected function configureGatesAndPolicies(): void
    {
        if (app()->isProduction()) {
            Gate::define('viewPulse', fn (User $user): bool => $user->hasPermissionTo('view performance'));
        }

        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Menu::class, MenuPolicy::class);
        Gate::policy(Page::class, PagePolicy::class);
        Gate::policy(Setting::class, SettingPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Post::class, PostPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
    }
}
