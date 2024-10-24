<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Data\MenusTableSeeder;
use Database\Seeders\Data\SettingsTableSeeder;
use Database\Seeders\Mock\CategoriesTableSeeder;
use Database\Seeders\Mock\PostsTableSeeder;
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
            MenusTableSeeder::class
        ]);

        // Mock data - only in development
        if ( ! app()->isProduction()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

            $this->call([
                CategoriesTableSeeder::class,
                PostsTableSeeder::class,
            ]);
        }
    }
}
