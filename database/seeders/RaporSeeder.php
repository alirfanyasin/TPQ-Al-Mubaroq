<?php

namespace Database\Seeders;

use App\Models\Rapor\Rapor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rapor::create([
            'tahun_ajaran' => '2022 / 2023',
            'semester' => 0
        ]);
        Rapor::create([
            'tahun_ajaran' => '2023 / 2024',
            'semester' => 1
        ]);
    }
}
