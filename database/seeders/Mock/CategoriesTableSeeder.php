<?php

declare(strict_types=1);

namespace Database\Seeders\Mock;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryFactory::new()->create([
            'name' => 'Embaràs',
            'slug' => 'embaras',
            'label_color' => '#3490dc',
        ]);

        CategoryFactory::new()->create([
            'name' => 'Salut',
            'slug' => 'salut',
            'label_color' => '#38c172',
        ]);

        CategoryFactory::new()->create([
            'name' => 'Ajudes',
            'slug' => 'ajudes',
            'label_color' => '#f6993f',
        ]);
    }
}
