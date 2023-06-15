<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aktivitas')->insert([
            [
                'nama_aktivitas' => "Jalan Santai",
                'met' => '2.5',
                'durasi' => 0,
                'kalori' => 0,
                'tingkat_aktivitas' => "RINGAN",

            ],
            [
                'nama_aktivitas' => "Pilates",
                'met' => '3',
                'durasi' => 0,
                'kalori' => 0,
                'tingkat_aktivitas' => "SEDANG"
            ],
            [
                'nama_aktivitas' => "Badminton",
                'met' => '7',
                'durasi' => 0,
                'kalori' => 0,
                'tingkat_aktivitas' => "BERAT"
            ]
        ]);
    }
}
