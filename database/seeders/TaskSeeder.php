<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'name' => 'Task One',
                'start_date' => '2024-01-20',
                'end_date' => '2024-02-20',
                'status' => 'initiated',
                'progress_percentage' => 20,
                'analyst_id' => 1,
                'project_id' => 1
            ],
            [
                'name' => 'Task Two',
                'start_date' => '2024-02-20',
                'end_date' => '2024-03-20',
                'status' => 'in_progress',
                'progress_percentage' => 40,
                'analyst_id' => 2,
                'project_id' => 2
            ],
            [
                'name' => 'Task Three',
                'start_date' => '2024-03-20',
                'end_date' => '2024-04-20',
                'status' => 'completed',
                'progress_percentage' => 100,
                'analyst_id' => 3,
                'project_id' => 3
            ]
        ]);
    }
}
