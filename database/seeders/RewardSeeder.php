<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reward;

class RewardSeeder extends Seeder
{
    public function run(): void
    {
        Reward::create([
            'name' => 'Recarga de Corazones',
            'description' => 'Recupera tus 5 vidas al instante.',
            'cost_points' => 50,
            'stock' => 100,
            'type' => 'powerup'
        ]);

        Reward::create([
            'name' => 'Insignia de Fuego',
            'description' => 'Demuestra que tienes una racha imparable.',
            'cost_points' => 80,
            'stock' => 50,
            'type' => 'badge'
        ]);
    }
}