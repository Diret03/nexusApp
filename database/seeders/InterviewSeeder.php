<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Interview;

class InterviewSeeder extends Seeder
{
    public function run()
    {
        $clients = Client::all();

        $interviews = [
            ['name' => 'Entrevista inicial con Tecnologías Avanzadas', 'date' => '2024-01-15', 'description' => 'Discusión de requisitos iniciales para el sistema de gestión de inventarios', 'status' => 1, 'client_id' => $clients->random()->id],
            ['name' => 'Reunión con Innova Software', 'date' => '2024-02-10', 'description' => 'Definición del proyecto de CRM', 'status' => 1, 'client_id' => $clients->random()->id],
            ['name' => 'Entrevista con Soluciones Empresariales', 'date' => '2024-03-05', 'description' => 'Revisión de necesidades para el sistema de facturación', 'status' => 1, 'client_id' => $clients->random()->id],
            ['name' => 'Reunión con Desarrollo Digital', 'date' => '2024-04-01', 'description' => 'Planificación del proyecto de ecommerce', 'status' => 1, 'client_id' => $clients->random()->id],
            ['name' => 'Entrevista con Tech Innovations', 'date' => '2024-05-20', 'description' => 'Análisis de requerimientos para la aplicación móvil', 'status' => 1, 'client_id' => $clients->random()->id],
        ];

        foreach ($interviews as $interview) {
            Interview::create($interview);
        }
    }
}
