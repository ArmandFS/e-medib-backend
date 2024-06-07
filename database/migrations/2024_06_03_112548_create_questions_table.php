<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_text');
            $table->timestamps();
        });
         //insert questions into table
        DB::table('questions')->insert([
        ['question_text' => 'Saya memeriksa kadar gula darah saya dengan waspada dan penuh perhatian'],
        ['question_text' => 'Makanan yang saya pilih memudahkan untuk mencapai kadar gula darah yang optimal'],
        ['question_text' => 'Saya meminum obat diabetes saya (misal insulin,tablet) sesuai dengan resep'],
        ['question_text' => 'Saya menepati semua janji yang direkomendasikan untuk pengobatan diabetes saya'],
        ['question_text' => 'Saya mencatat kadar gula darah saya secara teratur (atau menganalisis meteran glukosa darah saya)'],
        ['question_text' => 'Saya cenderung menghindari janji dengan dokter terkait diabetes'],
        ['question_text' => 'Terkadang saya makan banyak makanan manis atau makanan lainyang tinggi karbohidrat'],
        ['question_text' => 'Saya melakukan aktivitias fisik secara teratur untuk mencapai kadar gula darah yang optimal'],
        ['question_text' => 'Saya dengan ketat mengikuti rekomendasi diet yang diberikan oleh dokter atau spesialis diabetes saya'],
        ['question_text' => 'Saya tidak memeriksa kadar gula darah saya sesering yang diperlukan untuk mencapai kontrol glukosa darah yang baik'],
        ['question_text' => 'Saya menghindari aktivitas fisik,meskipun itu dapat memperbaiki kondisi diabetes saya'],
        ['question_text' => 'Saya cenderung lupa meminum atau melewatkan pengobatan diabetes saya (misal insulin atau tablet)'],
        ['question_text' => 'Terkadang saya makan berlebihan (tidak terpicu oleh hypoglikemia)'],
        ['question_text' => 'Mengenai perawatan diabetes saya, saya haru slebih sering menemui dokter'],
        ['question_text' => 'Saya cenderung melewatkan aktivitas fisik yang direncanakan'],
        ['question_text' => 'Perawatan diri diabetes saya buruk']
        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
