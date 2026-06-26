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
        Schema::table('students', function (Blueprint $table) {

            $table->string('father_occupation')->nullable()->after('father_mobile');

            $table->string('mother_occupation')->nullable()->after('mother_mobile');

            $table->string('guardian_relation')->nullable()->after('guardian_mobile');

            $table->string('emergency_contact')->nullable()->after('email');

            $table->boolean('transport_required')->default(false)->after('previous_school');

        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {

            $table->dropColumn([
                'father_occupation',
                'mother_occupation',
                'guardian_relation',
                'emergency_contact',
                'transport_required',
            ]);

        });
    }

    
};
