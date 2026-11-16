<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Creamos la tabla de escuelas
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ej: TecNM, IPN
            $table->string('code')->unique(); // Ej: TEC, IPN
            $table->timestamps();
        });

        // 2. Agregamos el school_id a los usuarios (Admin y Alumnos)
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained()->nullOnDelete();
        });

        // 3. Agregamos el school_id y el semestre a las materias
        Schema::table('subjects', function (Blueprint $table) {
            $table->foreignId('school_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('semester')->default(1); // Para saber a qué semestre pertenece
        });
    }

    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['school_id']);
            $table->dropColumn(['school_id', 'semester']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['school_id']);
            $table->dropColumn('school_id');
        });
        Schema::dropIfExists('schools');
    }
};