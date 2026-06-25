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
        Schema::create('sections', function (Blueprint $table) {

            $table->id();

            $table->foreignId('class_master_id')
                  ->constrained('class_masters')
                  ->cascadeOnDelete();

            $table->string('name');

            $table->string('code')->unique();

            $table->text('description')->nullable();

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
        Schema::dropIfExists('sections');
    }
};
