<?php

declare(strict_types=1);

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'access panel']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage menus']);
        Permission::create(['name' => 'manage pages']);
        Permission::create(['name' => 'manage settings']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage permissions']);
        Permission::create(['name' => 'view performance']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);
        Permission::create(['name' => 'manage categories']);

        // create roles and assign created permissions
        Role::create(['name' => 'writer'])
            ->givePermissionTo(['access panel', 'edit posts', 'delete posts', 'manage categories']);

        Role::create(['name' => 'moderator'])
            ->givePermissionTo(['access panel', 'publish posts', 'unpublish posts']);

        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());
    }
}
