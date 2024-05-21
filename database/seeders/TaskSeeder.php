<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Analyst;
use App\Models\Project;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $analysts = Analyst::all();
        $projects = Project::all();

        $tasks = [
            ['name' => 'Análisis de Requisitos', 'start_date' => '2024-02-10', 'end_date' => '2024-03-10', 'status' => 'in_progress', 'progress_percentage' => 50, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Diseño de Base de Datos', 'start_date' => '2024-03-15', 'end_date' => '2024-04-15', 'status' => 'initiated', 'progress_percentage' => 30, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Desarrollo del Backend', 'start_date' => '2024-04-20', 'end_date' => '2024-06-20', 'status' => 'in_progress', 'progress_percentage' => 40, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Implementación de la API', 'start_date' => '2024-05-01', 'end_date' => '2024-07-01', 'status' => 'initiated', 'progress_percentage' => 25, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Pruebas Unitarias', 'start_date' => '2024-06-10', 'end_date' => '2024-08-10', 'status' => 'initiated', 'progress_percentage' => 20, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Despliegue en Servidores', 'start_date' => '2024-07-15', 'end_date' => '2024-09-15', 'status' => 'initiated', 'progress_percentage' => 10, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Capacitación al Personal', 'start_date' => '2024-08-01', 'end_date' => '2024-10-01', 'status' => 'initiated', 'progress_percentage' => 15, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Mantenimiento del Sistema', 'start_date' => '2024-09-10', 'end_date' => '2024-11-10', 'status' => 'initiated', 'progress_percentage' => 5, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Optimización del Código', 'start_date' => '2024-10-01', 'end_date' => '2024-12-01', 'status' => 'initiated', 'progress_percentage' => 10, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
            ['name' => 'Revisión Final y Entrega', 'start_date' => '2024-11-15', 'end_date' => '2024-12-15', 'status' => 'initiated', 'progress_percentage' => 5, 'analyst_id' => $analysts->random()->id, 'project_id' => $projects->random()->id],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
