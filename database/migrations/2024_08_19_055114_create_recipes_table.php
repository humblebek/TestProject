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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('ingredients')->nullable();
            $table->json('instructions')->nullable();
            $table->integer('prepTimeMinutes');
            $table->integer('cookTimeMinutes');
            $table->integer('servings');
            $table->string('difficulty');
            $table->string('cuisine');
            $table->integer('caloriesPerServing');
            $table->json('tags')->nullable();
            $table->unsignedBigInteger('userId');
            $table->string('image')->nullable();
            $table->float('rating', 3, 1);
            $table->integer('reviewCount');
            $table->json('mealType')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
