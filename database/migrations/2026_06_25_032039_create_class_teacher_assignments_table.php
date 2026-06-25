<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'class_teacher_assignments',
            function (Blueprint $table) {

                $table->id();

                $table->foreignId('academic_session_id')
                    ->constrained('academic_sessions')
                    ->cascadeOnDelete();

                $table->foreignId('class_master_id')
                    ->constrained('class_masters')
                    ->cascadeOnDelete();

                $table->foreignId('section_id')
                    ->constrained('sections')
                    ->cascadeOnDelete();

                $table->foreignId('teacher_id')
                    ->constrained('teachers')
                    ->cascadeOnDelete();

                $table->boolean('status')
                    ->default(true);

                $table->timestamps();

                $table->unique([
                    'academic_session_id',
                    'class_master_id',
                    'section_id'
                ], 'unique_class_teacher');
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'class_teacher_assignments'
        );
    }
};