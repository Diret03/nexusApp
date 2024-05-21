<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Analyst;

class AnalystSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $analysts = [
            ['name' => 'María Pérez', 'email' => 'maria.perez@nexus.com', 'phone_number' => '555-1234'],
            ['name' => 'Carlos Gómez', 'email' => 'carlos.gomez@nexus.com', 'phone_number' => '555-5678'],
            ['name' => 'Lucía Fernández', 'email' => 'lucia.fernandez@nexus.com', 'phone_number' => '555-9101'],
            ['name' => 'Javier Martínez', 'email' => 'javier.martinez@nexus.com', 'phone_number' => '555-1122'],
            ['name' => 'Ana Sánchez', 'email' => 'ana.sanchez@nexus.com', 'phone_number' => '555-3344'],
        ];

        foreach ($analysts as $analyst) {
            Analyst::create($analyst);
        }
    }
}
