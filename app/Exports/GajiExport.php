<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\GajiAsatidzBulanan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class GajiExport implements FromCollection, WithStrictNullComparison, WithHeadings, WithMapping
{
    protected $bulan_tahun;
    public function __construct($bulan_tahun)
    {
        $this->bulan_tahun = $bulan_tahun;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Ubah bulan ke bahasa Inggris
        $bulanIndonesia = [
            'Januari' => 'January', 'Februari' => 'February', 'Maret' => 'March',
            'April' => 'April', 'Mei' => 'May', 'Juni' => 'June',
            'Juli' => 'July', 'Agustus' => 'August', 'September' => 'September',
            'Oktober' => 'October', 'November' => 'November', 'Desember' => 'December'
        ];

        // Pecah bulan dan tahun
        $bulanParts = explode(' ', $this->bulan_tahun);
        if (count($bulanParts) != 2) {
            return collect();
        }

        $bulanIndo = $bulanParts[0];  // Bulan
        $tahun = $bulanParts[1];      // Tahun

        // Jika bulan tidak valid
        if (!array_key_exists($bulanIndo, $bulanIndonesia)) {
            return collect();
        }

        $bulanInggris = $bulanIndonesia[$bulanIndo]; // Ubah Bulan ke bahasa Inggris
        try {
            $formattedDate = Carbon::createFromFormat('F Y', "$bulanInggris $tahun")->format('Y-m');
        } catch (\Exception $e) {
            return collect();
        }
        // dd($bulanParts);
        // Ambil data gaji asatidz berdasarkan bulan dan tahun
        return GajiAsatidzBulanan::whereRaw('DATE_FORMAT(tanggal, "%Y-%m") = ?', [$formattedDate])->get();
    }

    public function headings(): array
    {
        return [
            'Asatidz ID',
            'Nama Lengkap',
            'Gaji Pokok',
            'Masa Kerja',
            'Sesi Lembur',
            'Extra',
            'Kenaikan',
            'Kasbon',
            'Tunjangan Operasional',
            'Tunjangan Jabatan',
            'Jumlah sesi efektif',
            'Tanggal',
        ];
    }

    /**
    * @param GajiAsatidzBulanan $GajiAsatidzBulanan
    */
    public function map($GajiAsatidzBulanan): array
    {
        return [
            $GajiAsatidzBulanan->asatidz_id,
            $GajiAsatidzBulanan->asatidz->nama_lengkap,
            $GajiAsatidzBulanan->gaji_pokok,
            $GajiAsatidzBulanan->masa_kerja,
            $GajiAsatidzBulanan->lembur,
            $GajiAsatidzBulanan->extra,
            $GajiAsatidzBulanan->kenaikan,
            $GajiAsatidzBulanan->kasbon,
            $GajiAsatidzBulanan->tunjangan_operasional,
            $GajiAsatidzBulanan->tunjangan_jabatan,
            $GajiAsatidzBulanan->jumlah_hari_efektif,
            $GajiAsatidzBulanan->tanggal,
        ];
    }

}
