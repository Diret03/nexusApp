<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnalystSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analysts')->insert([
            [
                'name' => 'Analyst One',
                'email' => 'analyst.one@example.com',
                'phone_number' => '1231231234'
            ],
            [
                'name' => 'Analyst Two',
                'email' => 'analyst.two@example.com',
                'phone_number' => '3213214321'
            ],
            [
                'name' => 'Analyst Three',
                'email' => 'analyst.three@example.com',
                'phone_number' => '4564564567'
            ]
        ]);
    }
}
