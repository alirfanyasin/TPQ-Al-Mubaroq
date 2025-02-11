<?php

namespace App\Exports;

use App\Models\GajiAsatidzBulanan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class GajiExport implements FromCollection, WithStrictNullComparison, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GajiAsatidzBulanan::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Asatidz ID',
            'Nama Lengkap',
            'Gaji Pokok',
            'Masa Kerja',
            'Gaji Bruto',
            'Lembur',
            'Extra',
            'Kenaikan',
            'Kasbon',
            'Tunjangan Operasional',
            'Tunjangan Jabatan',
            'Jumlah Hari Efektif',
            'Tanggal',
            'Created At',
            'Updated At',
        ];
    }

    /**
    * @param GajiAsatidzBulanan $GajiAsatidzBulanan
    */
    public function map($GajiAsatidzBulanan): array
    {
        return [
            $GajiAsatidzBulanan->id,
            $GajiAsatidzBulanan->asatidz_id,
            $GajiAsatidzBulanan->asatidz->nama_lengkap,
            $GajiAsatidzBulanan->gaji_pokok,
            $GajiAsatidzBulanan->masa_kerja,
            $GajiAsatidzBulanan->gaji_bruto,
            $GajiAsatidzBulanan->lembur,
            $GajiAsatidzBulanan->extra,
            $GajiAsatidzBulanan->kenaikan,
            $GajiAsatidzBulanan->kasbon,
            $GajiAsatidzBulanan->tunjangan_operasional,
            $GajiAsatidzBulanan->tunjangan_jabatan,
            $GajiAsatidzBulanan->jumlah_hari_efektif,
            $GajiAsatidzBulanan->tanggal,
            $GajiAsatidzBulanan->created_at,
            $GajiAsatidzBulanan->updated_at,
        ];
    }

}
