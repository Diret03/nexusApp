<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Asignar roles a los usuarios según el UserSeeder
        $users = [
            1 => 'Administrador',
            2 => 'Analista',
            3 => 'Jefe de desarrollo',
            4 => 'Gerente',
            5 => 'Administrador'
        ];

        foreach ($users as $userId => $role) {
            $user = User::find($userId);
            if ($user) {
                $user->assignRole($role);
            }
        }
    }
}
