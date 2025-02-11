<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AbsensiHistory>
 */
class AbsensiHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id'=> 0,
            'tanggal'=> 0,
            'jumlah_masuk'=> 0,
            'jumlah_tidak'=> 0,
            'jumlah_sesi'=> 0,
        ];
    }
}
