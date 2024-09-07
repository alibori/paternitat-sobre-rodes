<?php

declare(strict_types=1);

namespace Database\Seeders\Data;

use Database\Factories\MenuFactory;
use Database\Factories\MenuItemFactory;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $main_menu = MenuFactory::new()->create([
            'name' => 'Main Menu',
        ]);

        MenuItemFactory::new()->for($main_menu)->create([
            'name' => 'Blog',
            'url' => '/blog',
        ]);

        $footer_menu = MenuFactory::new()->create([
            'name' => 'Footer Menu',
        ]);

        MenuItemFactory::new()->for($footer_menu)->create([
            'name' => 'Blog',
            'url' => '/blog',
        ]);
    }
}
