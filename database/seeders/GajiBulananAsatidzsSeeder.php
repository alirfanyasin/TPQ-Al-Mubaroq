<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Asatidz;
use App\Models\GajiAsatidz;
use App\Models\GajiAsatidzBulanan;
use Illuminate\Database\Seeder;

class GajiBulananAsatidzsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asatidzList = Asatidz::all();
        $gajiSetting = GajiAsatidz::first();
        $jabatanTunjangan = [
            'Pembina' => 75000,
            'Kepala TPQ' => 50000,
            'Sekretaris' => 25000,
            'Bendahara' => 25000,
            'Admin' => 25000,
            'Pengajar' => 25000,
        ];

        $operasionalTunjangan = [
            225000, 125000, 100000, 75000, 50000,
            50000, 125000, 125000, 75000, 100000,
            100000, 75000, 25000,
        ];

        $operasionalIndex = 0;

        foreach ($asatidzList as $asatid) {
            if ($operasionalIndex >= count($operasionalTunjangan)) {
                $operasionalIndex = 0;
            }

            $gajiPokok = $asatid->status === 'Magang'
                ? $gajiSetting->gaji_magang
                : $gajiSetting->gaji_tetap;

            // Hitung tunjangan jabatan
            $tunjanganJabatan = $asatid->status === 'Magang'
                ? 0
                : ($jabatanTunjangan[$asatid->jabatan] ?? 0); // Default 0 jika jabatan tidak ditemukan

            // Hitung tunjangan operasional
            $tunjanganOperasional = $asatid->status === 'Tetap'
                ? $operasionalTunjangan[$operasionalIndex]
                : 0;

            // Hitung kenaikan gaji
            $kenaikan = $asatid->status === 'Magang' ? 0 : 25000;

            // Hitung total gaji bruto
            $gajiBruto = $gajiPokok + $tunjanganJabatan + $tunjanganOperasional;

            // Buat record gaji bulanan
            GajiAsatidzBulanan::create([
                'gaji_pokok' => $gajiPokok,
                'tunjangan_jabatan' => $tunjanganJabatan,
                'tunjangan_operasional' => $tunjanganOperasional,
                'kenaikan' => $kenaikan,
                'gaji_bruto' => $gajiBruto,
                'tanggal' => Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d'), // Bulan lalu
                'asatidz_id' => $asatid->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Buat record gaji bulanan untuk bulan ini
            GajiAsatidzBulanan::create([
                'gaji_pokok' => $gajiPokok,
                'tunjangan_jabatan' => $tunjanganJabatan,
                'tunjangan_operasional' => $tunjanganOperasional,
                'kenaikan' => $kenaikan,
                'gaji_bruto' => $gajiBruto,
                'tanggal' => Carbon::now()->format('Y-m-d'), // Bulan ini
                'asatidz_id' => $asatid->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Tingkatkan indeks operasional
            $operasionalIndex++;
        }
    }
}
