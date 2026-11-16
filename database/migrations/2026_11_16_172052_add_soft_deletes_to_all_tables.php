<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Usuarios
        if (!Schema::hasColumn('users', 'deleted_at')) {
            Schema::table('users', function (Blueprint $table) { $table->softDeletes(); });
        }

        // 2. Contenido
        if (!Schema::hasColumn('subjects', 'deleted_at')) {
            Schema::table('subjects', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('units', 'deleted_at')) {
            Schema::table('units', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('topics', 'deleted_at')) {
            Schema::table('topics', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('questions', 'deleted_at')) {
            Schema::table('questions', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('options', 'deleted_at')) {
            Schema::table('options', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('rewards', 'deleted_at')) {
            Schema::table('rewards', function (Blueprint $table) { $table->softDeletes(); });
        }

        // 3. Historial y relaciones
        if (!Schema::hasColumn('attempts', 'deleted_at')) {
            Schema::table('attempts', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('topic_progress', 'deleted_at')) {
            Schema::table('topic_progress', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('subject_progress', 'deleted_at')) {
            Schema::table('subject_progress', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('chat_messages', 'deleted_at')) {
            Schema::table('chat_messages', function (Blueprint $table) { $table->softDeletes(); });
        }
        if (!Schema::hasColumn('reward_user', 'deleted_at')) {
            Schema::table('reward_user', function (Blueprint $table) { $table->softDeletes(); });
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('subjects', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('units', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('topics', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('questions', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('options', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('rewards', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('attempts', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('topic_progress', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('subject_progress', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('chat_messages', function (Blueprint $table) { $table->dropSoftDeletes(); });
        Schema::table('reward_user', function (Blueprint $table) { $table->dropSoftDeletes(); });
    }
};