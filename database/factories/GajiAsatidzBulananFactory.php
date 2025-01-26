<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gaji>
 */
class GajiAsatidzBulananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numberBetween(1000, 9999),
            'gaji_pokok' => 200000,
            'masa_kerja' => 0,
            'gaji_bruto' => 0,
            'lembur' => 0,
            'extra' => 0,
            'kenaikan' => 0,
            'kasbon' => 0,
            'tunjangan_operasional' => 0,
            'tunjangan_jabatan' => 0,
            'jumlah_hari_efektif' => 0,
            'tanggal' => Carbon::now()
        ];
    }
}
