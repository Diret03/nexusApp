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
                'name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Alice',
                'last_name' => 'Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'name' => 'Melanie',
                'last_name' => 'Ullco',
                'email' => 'melanieU@gmail.com',
                'password' => Hash::make('melanie123')
            ]
        ]);
    }
}
