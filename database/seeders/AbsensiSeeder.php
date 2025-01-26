<?php

namespace Database\Seeders;


use Carbon\Carbon;
use App\Models\GajiAsatidzBulanan;
use App\Models\absensi;
use App\Models\AbsensiHistory;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = 'absensis';

    public function run()
    {
        $tanggal = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
        $tglindo = 'Juli 2023';
        $gaji = GajiAsatidzBulanan::where('tanggal', $tanggal)->get();
        $haris = AbsensiHistory::where('tanggal', 'LIKE', '%' . $tglindo)->get();
    
        foreach ($gaji as $value) {
            foreach ($haris as $hari) {
                $absensi = new Absensi();
                $absensi->absensi_history_id = $hari->id; // Use the correct field (id)
                $absensi->asatidz_id = $value->asatidz_id;
                $absensi->jumlah_masuk = 1;
                $absensi->jumlah_sesi = 1;
                $absensi->save();
            }
            $value->jumlah_hari_efektif += $haris->count();
            $value->save();
        }
    }    
}
