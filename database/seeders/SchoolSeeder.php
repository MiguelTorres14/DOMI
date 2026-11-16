<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        School::create(['name' => 'Tecnológico de Toluca', 'code' => 'TEC']);
        School::create(['name' => 'Instituto Politécnico Nacional', 'code' => 'IPN']);
    }
}