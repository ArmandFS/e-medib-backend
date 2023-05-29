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
        Schema::create('user_record_data', function (Blueprint $table) {
            $table->id();
            $table->string('bmi', 100)->nullable();
            $table->string('bmr', 100)->nullable();
            $table->text('disease_history')->nullable();
            $table->text('alergic')->nullable();
            $table->string('bloof_pressure')->nullable();
            $table->string('cholesterol')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_record_data');
    }
};
