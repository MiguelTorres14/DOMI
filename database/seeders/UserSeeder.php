<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin del Tec
        User::create([
            'name' => 'Admin Tec',
            'email' => 'admin@tec.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'school_id' => 1,
            'semester' => 1,
            'enrollment_date' => now(),
            'email_verified_at' => now(),
            'points' => 0,
            'hearts' => 5,
            'streak' => 1
        ]);

        // 2. Alumno del Tec (en 3er semestre)
        User::create([
            'name' => 'Alumno Tec',
            'email' => 'alumno@tec.com',
            'password' => Hash::make('12345'),
            'role' => 'student',
            'school_id' => 1,
            'semester' => 3,
            'enrollment_date' => Carbon::now()->subMonths(12), 
            'email_verified_at' => now(),
            'points' => 100,
            'hearts' => 5,
            'streak' => 1
        ]);

        // 3. Admin del IPN
        User::create([
            'name' => 'Admin IPN',
            'email' => 'admin@ipn.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'school_id' => 2,
            'semester' => 1,
            'enrollment_date' => now(),
            'email_verified_at' => now(),
            'points' => 0,
            'hearts' => 5,
            'streak' => 1
        ]);
    }
}