<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Option;
use App\Models\Reward;
use App\Models\TopicProgress;
use Illuminate\Support\Facades\Hash;

class DomiSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuario Administrador (Tú)
        User::create([
            'name' => 'Admin Miguel',
            'email' => 'admin@domi.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'points' => 0,
        ]);

        // 2. Usuario Alumno (Para probar los mockups)
        $student = User::create([
            'name' => 'Alumno de Prueba',
            'email' => 'alumno@domi.com',
            'password' => Hash::make('12345'),
            'role' => 'student',
            'points' => 100, // Le damos puntos para que pruebes la tienda
            'streak' => 5,   // Racha de 5 días
            'hearts' => 5,   // 5 corazones
        ]);

        // 3. Recompensas (Tienda)
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

        // 4. Materia y Estructura
        $subject = Subject::create([
            'name' => 'Programación Web',
            'description' => 'Aprende Laravel desde cero.',
        ]);

        $unit = Unit::create([
            'subject_id' => $subject->id,
            'name' => 'Unidad 1: Fundamentos',
            'order' => 1,
        ]);

        $topic = Topic::create([
            'unit_id' => $unit->id,
            'name' => 'Tema 1: ¿Qué es Laravel?',
            'order' => 1,
            'points_reward' => 20,
        ]);

        // 5. Preguntas para el Tema
        $q1 = Question::create([
            'topic_id' => $topic->id,
            'question_text' => '¿Qué es Laravel?',
        ]);
        
        Option::create(['question_id' => $q1->id, 'option_text' => 'Un framework de PHP', 'is_correct' => true]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Un lenguaje de programación', 'is_correct' => false]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Una base de datos', 'is_correct' => false]);

        // 6. Progreso inicial del alumno
        TopicProgress::create([
            'user_id' => $student->id,
            'topic_id' => $topic->id,
            'status' => 'unlocked', // Desbloqueado
            'stars' => 0,
            'best_score' => 0,
        ]);
    }
}