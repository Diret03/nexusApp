<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Interview;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $clients = Client::all();
        $interviews = Interview::all();

        $projects = [
            ['name' => 'Sistema de Gestión de Inventarios', 'start_date' => '2024-02-01', 'end_date' => '2024-07-01', 'status' => 'in_progress', 'progress_percentage' => 50, 'client_id' => $clients->random()->id, 'interview_id' => $interviews->random()->id],
            ['name' => 'CRM Empresarial', 'start_date' => '2024-03-01', 'end_date' => '2024-09-01', 'status' => 'in_progress', 'progress_percentage' => 40, 'client_id' => $clients->random()->id, 'interview_id' => $interviews->random()->id],
            ['name' => 'Sistema de Facturación', 'start_date' => '2024-04-01', 'end_date' => '2024-10-01', 'status' => 'initiated', 'progress_percentage' => 20, 'client_id' => $clients->random()->id, 'interview_id' => $interviews->random()->id],
            ['name' => 'Plataforma de Ecommerce', 'start_date' => '2024-05-01', 'end_date' => '2024-12-01', 'status' => 'initiated', 'progress_percentage' => 10, 'client_id' => $clients->random()->id, 'interview_id' => $interviews->random()->id],
            ['name' => 'Aplicación Móvil', 'start_date' => '2024-06-01', 'end_date' => '2024-11-01', 'status' => 'initiated', 'progress_percentage' => 5, 'client_id' => $clients->random()->id, 'interview_id' => $interviews->random()->id],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
