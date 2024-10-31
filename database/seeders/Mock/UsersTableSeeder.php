<?php

declare(strict_types=1);

namespace Database\Seeders\Mock;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a super-admin user
        $super_admin = UserFactory::new()->create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
        ]);

        $super_admin->assignRole('super-admin');

        // Create a writer user
        $writer = UserFactory::new()->create([
            'name' => 'Writer',
            'email' => 'writer@example.com',
        ]);

        $writer->assignRole('writer');

        // Create a moderator user
        $moderator = UserFactory::new()->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
        ]);

        $moderator->assignRole('moderator');
    }
}
