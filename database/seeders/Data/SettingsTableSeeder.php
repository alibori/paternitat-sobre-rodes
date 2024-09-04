<?php

declare(strict_types=1);

namespace Database\Seeders\Data;

use Database\Factories\SettingFactory;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingFactory::new()->create([
            'key' => 'site_name',
            'value' => 'My Site',
        ]);

        SettingFactory::new()->create([
            'key' => 'meta_description',
            'value' => null,
        ]);

        SettingFactory::new()->create([
            'key' => 'meta_keywords',
            'value' => null,
        ]);
    }
}
