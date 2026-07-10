<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_attendances', function (Blueprint $table) {

            $table->id();

            $table->foreignId('academic_session_id')->constrained()->cascadeOnDelete();

            $table->foreignId('department_id')->constrained()->cascadeOnDelete();

            $table->foreignId('class_master_id')->constrained()->cascadeOnDelete();

            $table->foreignId('section_id')->constrained()->cascadeOnDelete();

            $table->foreignId('student_id')->constrained()->cascadeOnDelete();

            $table->date('attendance_date');

            $table->enum('status', [

                'Present',

                'Absent',

                'Late',

                'Leave',

                'Half Day'

            ]);

            $table->text('remarks')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();

            $table->timestamps();

            $table->unique([
                'student_id',
                'attendance_date'
            ]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_attendances');
    }
};
