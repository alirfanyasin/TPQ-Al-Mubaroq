<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HariAktifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'hari_aktifs';

        $now = Carbon::now();
        $dates = [];

        for ($i = -6; $i <= 6; $i++) {
            $date = $now->copy()->addMonths($i);
            $bulan_tahun = $date->format('F Y');

            // Check if the generated date already exists in the array
            while (in_array($bulan_tahun, $dates)) {
                $date->addMonth(); // Move to the next month instead of adding the same month again
                $bulan_tahun = $date->format('F Y');
            }

            // Add the date to the array to keep track of uniqueness
            $dates[] = $bulan_tahun;

            // Insert the record into the database
            DB::table($table)->insert([
                'bulan_tahun' => $bulan_tahun,
                'jumlah_hari' => $date->daysInMonth,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
