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
        Schema::create('subjects', function (Blueprint $table) {

            $table->id();

            $table->foreignId('department_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('class_master_id')
                  ->constrained('class_masters')
                  ->cascadeOnDelete();

            $table->foreignId('section_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->string('name');

            $table->string('code')->unique();

            $table->enum('type',[
                'Theory',
                'Practical',
                'Both',
                'Other'
            ])->default('Theory');

            $table->string('image')->nullable();

            $table->longText('description')
                  ->nullable();

            $table->boolean('status')
                  ->default(1);

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
        Schema::dropIfExists('subjects');
    }
};
