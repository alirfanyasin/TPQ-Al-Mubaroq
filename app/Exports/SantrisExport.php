<?php

namespace App\Exports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

// use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromQuery;

class SantrisExport implements FromCollection, WithHeadings
{
    // use Exportable;
    public function collection()
    {
        return Santri::all();
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
            'NOMOR INDUK',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'JENIS KELAMIN',
            'AGAMA',
            'JENIS TEMPAT TINGGAL',
            'ANAK KE',
            'ABK',
            'KEWARGANEGARAAN',
            'NOMOR TELEPON',
            'ALAMAT DOMISILI',
            'RT DOMISILI',
            'RW DOMISILI',
            'DESA DOMISILI',
            'KECAMATAN DOMISILI',
            'KOTA DOMISILI',
            'ALAMAT KK',
            'RT KK',
            'RW KK',
            'DESA KK',
            'KECAMATAN KK',
            'KOTA KK',
            'NAMA LENGKAP AYAH',
            'NIK AYAH',
            'TEMPAT LAHIR AYAH',
            'TANGGAL LAHIR AYAH',
            'AGAMA AYAH',
            'STATUS AYAH',
            'PEKERJAAN AYAH',
            'PENGHASILAN AYAH',
            'NOMOR TELEPON AYAH',
            'NAMA LENGKAP IBU',
            'NIK IBU',
            'TEMPAT LAHIR IBU',
            'TANGGAL LAHIR IBU',
            'AGAMA IBU',
            'STATUS IBU',
            'PEKERJAAN IBU',
            'PENGHASILAN IBU',
            'NOMOR TELEPON IBU',
            'FOTO',
            'KK',
            'TANGGAL MASUK',
        ];
    }
}
