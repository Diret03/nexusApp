<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'name' => 'Client One',
                'email' => 'client.one@example.com',
                'phone_number' => '1234567890'
            ],
            [
                'name' => 'Client Two',
                'email' => 'client.two@example.com',
                'phone_number' => '0987654321'
            ],
            [
                'name' => 'Client Three',
                'email' => 'client.three@example.com',
                'phone_number' => '1122334455'
            ]
        ]);
    }
}
