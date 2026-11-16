<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // El orden es crucial para que no fallen las llaves foráneas
        $this->call([
            SchoolSeeder::class,
            UserSeeder::class,
            RewardSeeder::class,
        ]);
    }
}