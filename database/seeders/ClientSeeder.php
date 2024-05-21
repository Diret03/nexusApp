<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['name' => 'Tecnologías Avanzadas S.A.', 'email' => 'contacto@tecnologias.com', 'phone_number' => '555-2233'],
            ['name' => 'Innova Software', 'email' => 'info@innova.com', 'phone_number' => '555-4455'],
            ['name' => 'Soluciones Empresariales', 'email' => 'ventas@soluciones.com', 'phone_number' => '555-6677'],
            ['name' => 'Desarrollo Digital', 'email' => 'soporte@desarrollodigital.com', 'phone_number' => '555-8899'],
            ['name' => 'Tech Innovations', 'email' => 'servicio@techinnovations.com', 'phone_number' => '555-0011'],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
