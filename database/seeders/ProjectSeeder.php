<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'name' => 'Project One',
                'start_date' => '2024-01-15',
                'end_date' => '2024-06-15',
                'status' => 'initiated',
                'progress_percentage' => 10,
                'client_id' => 1,
                'interview_id' => 1
            ],
            [
                'name' => 'Project Two',
                'start_date' => '2024-02-15',
                'end_date' => '2024-07-15',
                'status' => 'in_progress',
                'progress_percentage' => 50,
                'client_id' => 2,
                'interview_id' => 2
            ],
            [
                'name' => 'Project Three',
                'start_date' => '2024-03-15',
                'end_date' => '2024-08-15',
                'status' => 'cancelled',
                'progress_percentage' => 30,
                'client_id' => 3,
                'interview_id' => 3
            ]
        ]);
    }
}
