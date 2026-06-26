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
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Academic Information
            |--------------------------------------------------------------------------
            */

            $table->foreignId('academic_session_id')
                ->constrained('academic_sessions')
                ->cascadeOnUpdate();

            $table->foreignId('department_id')
                ->constrained('departments')
                ->cascadeOnUpdate();

            $table->foreignId('class_master_id')
                ->constrained('class_masters')
                ->cascadeOnUpdate();

            $table->foreignId('section_id')
                ->constrained('sections')
                ->cascadeOnUpdate();

            $table->string('admission_no')->unique();

            $table->string('roll_no')->nullable();

            $table->date('admission_date')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Personal Information
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            $table->string('gender',20);

            $table->date('dob')->nullable();

            $table->string('blood_group',10)->nullable();

            $table->string('category')->nullable();

            $table->string('religion')->nullable();

            $table->string('aadhaar_no',20)->nullable();

            $table->string('image')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Parent Information
            |--------------------------------------------------------------------------
            */

            $table->string('father_name')->nullable();

            $table->string('father_mobile',20)->nullable();

            $table->string('mother_name')->nullable();

            $table->string('mother_mobile',20)->nullable();

            $table->string('guardian_name')->nullable();

            $table->string('guardian_mobile',20)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Contact Information
            |--------------------------------------------------------------------------
            */

            $table->string('student_mobile',20)->nullable();

            $table->string('email')->nullable();

            $table->text('address')->nullable();

            $table->string('city')->nullable();

            $table->string('state')->nullable();

            $table->string('pincode',10)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Transport
            |--------------------------------------------------------------------------
            */

            $table->boolean('transport_allotted')
                ->default(false);

            $table->string('bus_number')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Other Information
            |--------------------------------------------------------------------------
            */

            $table->string('previous_school')
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

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
