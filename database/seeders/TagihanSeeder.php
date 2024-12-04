<?php

namespace Database\Seeders;

use App\Models\Tagihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tagihan::create([
            'tagihan_pembayaran' => 0,
            'tagihan_bulanan' => 0,
            'tagihan_biaya_seragam' => 0
        ]);
    }
}
