<?php

declare(strict_types=1);

namespace Database\Seeders\Mock;

use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostFactory::new()->count(10)->create();
    }
}
