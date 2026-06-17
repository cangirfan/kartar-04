<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        \Spatie\Permission\Models\Permission::create(['name' => 'manage content']);
        \Spatie\Permission\Models\Permission::create(['name' => 'manage settings']);

        // create roles and assign created permissions
        $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $role->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        // create default admin user
        $admin = \App\Models\User::create([
            'name' => 'Administrator Kartar',
            'email' => 'admin@kartar.local',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        $admin->assignRole($role);
    }
}
