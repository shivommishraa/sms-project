<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {

            $table->id();

            $table->foreignId('department_id')
                ->constrained('departments')
                ->cascadeOnDelete();

            $table->foreignId('designation_id')
                ->constrained('designations')
                ->cascadeOnDelete();

            $table->foreignId('academic_session_id')
                ->constrained('academic_sessions')
                ->cascadeOnDelete();

            $table->string('employee_id')
                ->unique();

            $table->string('name');

            $table->enum('gender', [
                'Male',
                'Female',
                'Other'
            ]);

            $table->date('dob')
                ->nullable();

            $table->string('image')
                ->nullable();

            $table->string('qualification')
                ->nullable();

            $table->string('experience')
                ->nullable();

            $table->date('joining_date')
                ->nullable();

            $table->date('service_end_date')
                ->nullable();

            $table->enum('employment_status', [
                'Active',
                'Inactive',
                'Resigned',
                'Retired',
                'Terminated'
            ])->default('Active');

            $table->string('mobile');

            $table->string('alternate_mobile')
                ->nullable();

            $table->string('email')
                ->nullable();

            $table->text('address')
                ->nullable();

            $table->text('short_bio')
                ->nullable();

            $table->longText('description')
                ->nullable();

            $table->boolean('status')
                ->default(true);

            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};