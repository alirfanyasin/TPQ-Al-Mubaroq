<?php

namespace App\Exports;

use App\Models\Asatidz;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsatidzExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Asatidz::all();
    }


    /**
     * Return the headers for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'NAMA LENGKAP',
            'NIK',
            'NOMOR POKOK ANGGOTA',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'JENIS KELAMIN',
            'AGAMA',
            'JABATAN',
            'NPWP',
            'PENDIDIKAN TERAKHIR',
            'JURUSAN',
            'TAHUN LULUS',
            'NOMOR KK',
            'KEWARGANEGARAAN',
            'NOMOR JAMSOS',
            'NOMOR REKENING',
            'STATUS',
            'NOMOR TELEPON',
            'NAMA IBU',
            'KETERANGAN',
            'ALAMAT LENGKAP',
            'RT',
            'RW',
            'DESA',
            'KECAMATAN',
            'KOTA',
        ];
    }
}
