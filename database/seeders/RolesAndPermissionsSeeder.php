<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions for plants
        Permission::create(['name' => 'add plant']);
        Permission::create(['name' => 'edit every plant']);
        Permission::create(['name' => 'edit my plant']);
        Permission::create(['name' => 'delete every plant']);
        Permission::create(['name' => 'delete my plant']);

        // Create permissions for Categories
        Permission::create(['name' => 'show category']);
        Permission::create(['name' => 'add category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);

        // Create permissions for Roles
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'assign role']);

        // Create permission for assigning permissions to roles
        Permission::create(['name' => 'assign permission']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'seller'])
            ->givePermissionTo(
                'add plant',
                'edit my plant',
                'delete my plant',
                // 'edit my profile',
                // 'delete my profile'
            );

    //     Role::create(['name' => 'user'])
    //         ->givePermissionTo(
    //             'edit my profile',
    //             'delete my profile'
    //         );
    }
}
