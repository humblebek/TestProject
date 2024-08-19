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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('maiden_name')->nullable();
            $table->integer('age');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('username');
            $table->string('password');
            $table->date('birth_date');
            $table->string('image')->nullable();
            $table->string('blood_group');
            $table->float('height');
            $table->float('weight');
            $table->string('eye_color');
            $table->string('hair_color');
            $table->string('hair_type');
            $table->string('ip');
            $table->string('mac_address');
            $table->string('university')->nullable();
            $table->string('ein')->nullable();
            $table->string('ssn')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('role')->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
