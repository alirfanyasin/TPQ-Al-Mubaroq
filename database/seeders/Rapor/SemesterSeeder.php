<?php

namespace Database\Seeders\Rapor;

use App\Models\Rapor\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Semester::create([
            'nama' => 'Ganjil'
        ]);
        Semester::create([
            'nama' => 'Genap'
        ]);
    }
}
