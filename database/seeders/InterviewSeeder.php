<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('interviews')->insert([
            [
                'name' => 'Interview One',
                'date' => '2024-01-01',
                'description' => 'Description for interview one',
                'status' => 1,
                'client_id' => 1
            ],
            [
                'name' => 'Interview Two',
                'date' => '2024-02-01',
                'description' => 'Description for interview two',
                'status' => 1,
                'client_id' => 2
            ],
            [
                'name' => 'Interview Three',
                'date' => '2024-03-01',
                'description' => 'Description for interview three',
                'status' => 0,
                'client_id' => 3
            ]
        ]);
    }
}
