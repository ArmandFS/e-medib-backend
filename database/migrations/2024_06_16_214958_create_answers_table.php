<?php

<<<<<<< HEAD:database/migrations/2024_06_16_214958_create_answers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

=======
>>>>>>> e553b755ce938868e8461cccd5cb1919901cdf83:database/migrations/2024_06_04_004721_create_answers_table.php
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreignId('question_id')->constrained()->onDelete('cascade')->nullable();
<<<<<<< HEAD:database/migrations/2024_06_16_214958_create_answers_table.php
=======
            $table->foreignId('option_id')->constrained()->onDelete('cascade')->nullable();
>>>>>>> e553b755ce938868e8461cccd5cb1919901cdf83:database/migrations/2024_06_04_004721_create_answers_table.php
            $table->integer('answer_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
