<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Diego',
                'last_name' => 'Recalde',
                'email' => 'diegodavidrecalde@gmail.com',
                'password' => Hash::make('diego123')
            ],
            [
                'name' => 'Alejandro',
                'last_name' => 'Mallama',
                'email' => 'analista1@gmail.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Zamyr',
                'last_name' => 'Guevara',
                'email' => 'jefe1@gmail.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Melanie',
                'last_name' => 'Ullco',
                'email' => 'gerente1@gmail.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'David',
                'last_name' => 'M',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password123')
            ]
        ]);
    }
}
