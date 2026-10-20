<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Usuarios (Modificado para gamificación)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'student'])->default('student');
            $table->integer('points')->default(0); // Puntos para recompensas
            $table->integer('streak')->default(0); // Días seguidos (Racha)
            $table->date('last_activity_date')->nullable();
            $table->integer('hearts')->default(5); // Vidas
            $table->rememberToken();
            $table->timestamps();
        });

        // 2. Tabla para reseteo de contraseñas (Nativa de Laravel)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 3. Tabla de sesiones (Para evitar el error que tuviste)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // 4. Materias
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });

        // 5. Unidades
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('order')->default(1);
            $table->timestamps();
        });

        // 6. Temas (Lecciones)
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('order')->default(1);
            $table->integer('points_reward')->default(10); // Puntos que da completar el tema
            $table->timestamps();
        });

        // 7. Preguntas
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained()->onDelete('cascade');
            $table->text('question_text');
            $table->timestamps();
        });

        // 8. Opciones de respuesta
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->string('option_text');
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
        });

        // 9. Progreso por Tema (El mapa tipo Duolingo)
        Schema::create('topic_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('topic_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['locked', 'unlocked', 'completed'])->default('locked');
            $table->integer('stars')->default(0); // 1 a 3 estrellas por tema
            $table->integer('best_score')->default(0);
            $table->timestamps();
            $table->unique(['user_id', 'topic_id']);
        });

        // 10. Progreso por Materia (Barra global)
        Schema::create('subject_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->integer('percentage')->default(0);
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
            $table->unique(['user_id', 'subject_id']);
        });

        // 11. Intentos de Examen (Historial)
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('topic_id')->constrained()->onDelete('cascade');
            $table->integer('score')->default(0);
            $table->integer('points_earned')->default(0);
            $table->boolean('passed')->default(false);
            $table->timestamps();
        });

        // 12. Recompensas (Tienda)
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('cost_points');
            $table->integer('stock')->default(0);
            $table->enum('type', ['badge', 'powerup', 'cosmetic'])->default('badge');
            $table->timestamps();
        });

        // 13. Canje de Recompensas (Pivote)
        Schema::create('reward_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('reward_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // 14. Chat de Inteligencia Artificial
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['user', 'assistant']);
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Se eliminan en orden inverso para evitar errores de llaves foráneas
        Schema::dropIfExists('chat_messages');
        Schema::dropIfExists('reward_user');
        Schema::dropIfExists('rewards');
        Schema::dropIfExists('attempts');
        Schema::dropIfExists('subject_progress');
        Schema::dropIfExists('topic_progress');
        Schema::dropIfExists('options');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('topics');
        Schema::dropIfExists('units');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};