<?php

namespace Database\Seeders;

use App\Models\AbsensiHistory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AbsensiHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        for ($i = 1; $i <= 31; $i++) {
            $tanggal = Carbon::create(2025, 1, $i);
            $formatedtgl = $tanggal->locale('id_ID')->isoFormat('dddd, D MMMM YYYY');
            $masuk = rand(17, 20);
            $tidak = 20 - $masuk;

            AbsensiHistory::factory()->create([
                'id' => $i,
                'tanggal' => $formatedtgl,
                'jumlah_masuk' => 20,
                'jumlah_tidak' => 0,
                'jumlah_sesi' => 20,
            ]);
        }
    }
}
