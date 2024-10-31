<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Data\MenusTableSeeder;
use Database\Seeders\Data\RolesAndPermissionsSeeder;
use Database\Seeders\Data\SettingsTableSeeder;
use Database\Seeders\Mock\CategoriesTableSeeder;
use Database\Seeders\Mock\PostsTableSeeder;
use Database\Seeders\Mock\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingsTableSeeder::class,
            MenusTableSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);

        // Mock data - only in development
        if ( ! app()->isProduction()) {
            $this->call([
                UsersTableSeeder::class,
                CategoriesTableSeeder::class,
                PostsTableSeeder::class,
            ]);
        }
    }
}
