<?php

namespace Database\Seeders;

use App\Models\GajiAsatidz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GajiAsatidz::create([
            'gaji_tetap' => 200000,
            'gaji_magang' => 100000,
            'lembur_tetap' => 12500,
            'lembur_magang' => 5000,
            'kenaikan' => 25000,
        ]);
    }
}
