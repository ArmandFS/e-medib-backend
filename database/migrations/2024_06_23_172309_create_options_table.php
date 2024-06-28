<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;




class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('question_id'); // Foreign key to questions table
            $table->string('option_text');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });

        // Insert options into the table
        $options = ['0', '1', '2', '3'];
        $questionIds = range(1, 16); 
        $data = [];

        foreach ($questionIds as $questionId) {
            foreach ($options as $option) {
                $data[] = ['question_id' => $questionId, 'option_text' => $option];
            }
        }

        DB::table('options')->insert($data);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};

