<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear permisos
        $permissions = [
            'edit all',
            'view interviews',
            'create interviews',
            'edit interviews',
            'delete interviews',
            'view projects',
            'create projects',
            'edit projects',
            'delete projects',
            'view tasks',
            'create tasks',
            'edit tasks',
            'delete tasks',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Crear roles y asignar permisos
        $admin = Role::create(['name' => 'Administrador']);
        $admin->givePermissionTo(Permission::all());

        $manager = Role::create(['name' => 'Gerente']);
        $manager->givePermissionTo([
            'view interviews',
            'create interviews',
            'edit interviews',
            'delete interviews',
            'view projects',
        ]);

        $devLead = Role::create(['name' => 'Jefe de desarrollo']);
        $devLead->givePermissionTo([
            'view projects',
            'create projects',
            'edit projects',
            'delete projects',
            'view tasks',
            'create tasks',
            'edit tasks',
            'delete tasks',
        ]);

        $analyst = Role::create(['name' => 'Analista']);
        $analyst->givePermissionTo([
            'view tasks',
            'edit tasks',
            'delete tasks'
        ]);
    }
}
