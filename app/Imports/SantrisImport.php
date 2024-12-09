<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SantrisImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Santri([
            "nama_lengkap" => $row['nama_lengkap'],
            "nik" => $row['nik'],
            "tempat_lahir" => $row['tempat_lahir'],
            "nomor_induk" => $row['nomor_induk'],
            "jenis_kelamin" => $row['jenis_kelamin'],
            "agama" => $row['agama'],
            "jenis_tempat_tinggal" => $row['jenis_tempat_tinggal'],
            "anak_ke" => $row['anak_ke'],
            "abk" => $row['abk'],
            "kewarganegaraan" => $row['kewarganegaraan'],
            "nomor_telepon" => $row['nomor_telepon'],
            "alamat_lengkap_domisili" => $row['alamat_domisili'],
            "rt_domisili" => $row['rt_domisili'],
            "rw_domisili" => $row['rw_domisili'],
            "desa_domisili" => $row['desa_domisili'],
            "kecamatan_domisili" => $row['kecamatan_domisili'],
            "kota_domisili" => $row['kota_domisili'],
            "alamat_lengkap_kk" => $row['alamat_kk'],
            "rt_kk" => $row['rt_kk'],
            "rw_kk" => $row['rw_kk'],
            "desa_kk" => $row['desa_kk'],
            "kecamatan_kk" => $row['kecamatan_kk'],
            "kota_kk" => $row['kota_kk'],
            "nama_lengkap_ayah" => $row['nama_lengkap_ayah'],
            "nik_ayah" => $row['nik_ayah'],
            "tempat_lahir_ayah" => $row['tempat_lahir_ayah'],
            "agama_ayah" => $row['agama_ayah'],
            "status_ayah" => $row['status_ayah'],
            "pekerjaan_ayah" => $row['pekerjaan_ayah'],
            "penghasilan_ayah" => $row['penghasilan_ayah'],
            "nomor_telepon_ayah" => $row['nomor_telepon_ayah'],
            "nama_lengkap_ibu" => $row['nama_lengkap_ibu'],
            "nik_ibu" => $row['nik_ibu'],
            "tempat_lahir_ibu" => $row['tempat_lahir_ibu'],
            "agama_ibu" => $row['agama_ibu'],
            "status_ibu" => $row['status_ibu'],
            "pekerjaan_ibu" => $row['pekerjaan_ibu'],
            "penghasilan_ibu" => $row['penghasilan_ibu'],
            "nomor_telepon_ibu" => $row['nomor_telepon_ibu'],
        ]);
    }

    // // Specify the heading row (useful when importing with headers)
    // public function headingRow(): int
    // {
    //     return 1;
    // }

    // private function convertScientificNotation($value)
    // {
    //     return strpos($value, 'E') !== false ? number_format((float) $value, 0, '', '') : $value;
    // }

    // private function formatDate($value)
    // {
    //     if (is_numeric($value)) {
    //         $value = Carbon::createFromFormat('Y', $value)->format('Y-m-d');
    //     }

    //     try {
    //         return Carbon::parse($value)->format('Y-m-d');
    //     } catch (\Exception $e) {
    //         return null;
    //     }
    // }

    // private function sanitizeJenisKelamin($value)
    // {
    //     if ($value == 'L' || $value == 'P') {
    //         return $value;
    //     }
    //     return null;
    // }
}


 // dd($row);
        // return new Santri([

        //     "nama_lengkap" => $row[1],
        //     "nik" => $row[1],
        //     "tempat_lahir" => $row[2],
        //     "nomor_induk" => $row[3],
        //     "tanggal_lahir" => $row[4],
        //     "jenis_kelamin" => $row[5],
        //     "agama" => $row['AGAMA'],
        //     "jenis_tempat_tinggal" => $row[6],
        //     "anak_ke" => $row['ANAK KE'],
        //     "abk" => $row['ABK'],
        //     "kewarganegaraan" => $row[7],
        //     "nomor_telepon" => $row[8],
        //     "alamat_lengkap_domisili" => $row[9],
        //     "rt_domisili" => $row[10],
        //     "rw_domisili" => $row[11],
        //     "desa_domisili" => $row[12],
        //     "kecamatan_domisili" => $row[13],
        //     "kota_domisili" => $row[14],
        //     "alamat_lengkap_kk" => $row[15],
        //     "rt_kk" => $row[16],
        //     "rw_kk" => $row[17],
        //     "desa_kk" => $row[18],
        //     "kecamatan_kk" => $row[19],
        //     "kota_kk" => $row[20],
        //     "nama_lengkap_ayah" => $row[21],
        //     "nik_ayah" => $row[22],
        //     "tempat_lahir_ayah" => $row[23],
        //     "tanggal_lahir_ayah" => $row[24],
        //     "agama_ayah" => $row[25],
        //     "status_ayah" => $row[26],
        //     "pekerjaan_ayah" => $row[27],
        //     "penghasilan_ayah" => $row[28],
        //     "nomor_telepon_ayah" => $row[29],
        //     "nama_lengkap_ibu" => $row[30],
        //     "nik_ibu" => $row[31],
        //     "tempat_lahir_ibu" => $row[32],
        //     "tanggal_lahir_ibu" => $row[33],
        //     "agama_ibu" => $row[34],
        //     "status_ibu" => $row[35],
        //     "pekerjaan_ibu" => $row[36],
        //     "penghasilan_ibu" => $row[37],
        //     "nomor_telepon_ibu" => $row[38],
        //     "tanggal_masuk" => $row[39],

        // ]);



// "nama_lengkap" => $row['NAMA LENGKAP'],
            // "nik" => $row['NIK'],
            // "tempat_lahir" => $row['NOMOR INDUK'],
            // "nomor_induk" => $row['TEMPAT LAHIR'],
            // "tanggal_lahir" => $row['TANGGAL LAHIR'],
            // "jenis_kelamin" => $row['JENIS KELAMIN'],
            // "agama" => $row['AGAMA'],
            // "jenis_tempat_tinggal" => $row['JENIS TEMPAT TINGGAL'],
            // "anak_ke" => $row['ANAK KE'],
            // "abk" => $row['ABK'],
            // "kewarganegaraan" => $row['KEWARGANEGARAAN'],
            // "nomor_telepon" => $row['NOMOR TELEPON'],
            // "alamat_lengkap_domisili" => $row['ALAMAT DOMISILI'],
            // "rt_domisili" => $row['RT DOMISILI'],
            // "rw_domisili" => $row['RW DOMISILI'],
            // "desa_domisili" => $row['DESA DOMISILI'],
            // "kecamatan_domisili" => $row['KECAMATAN DOMISILI'],
            // "kota_domisili" => $row['KOTA DOMISILI'],
            // "alamat_lengkap_kk" => $row['ALAMAT KK'],
            // "rt_kk" => $row['RT KK'],
            // "rw_kk" => $row['RW KK'],
            // "desa_kk" => $row['DESA KK'],
            // "kecamatan_kk" => $row['KECAMATAN KK'],
            // "kota_kk" => $row['KOTA KK'],
            // "nama_lengkap_ayah" => $row['NAMA LENGKAP AYAH'],
            // "nik_ayah" => $row['NIK AYAH'],
            // "tempat_lahir_ayah" => $row['TEMPAT LAHIR AYAH'],
            // "tanggal_lahir_ayah" => $row['TANGGAL LAHIR AYAH'],
            // "agama_ayah" => $row['AGAMA AYAH'],
            // "status_ayah" => $row['STATUS AYAH'],
            // "pekerjaan_ayah" => $row['PEKERJAAN AYAH'],
            // "penghasilan_ayah" => $row['PENGHASILAN AYAH'],
            // "nomor_telepon_ayah" => $row['NOMOR TELEPON AYAH'],
            // "nama_lengkap_ibu" => $row['NAMA LENGKAP IBU'],
            // "nik_ibu" => $row['NIK IBU'],
            // "tempat_lahir_ibu" => $row['TEMPAT LAHIR IBU'],
            // "tanggal_lahir_ibu" => $row['TANGGAL LAHIR IBU'],
            // "agama_ibu" => $row['AGAMA IBU'],
            // "status_ibu" => $row['STATUS IBU'],
            // "pekerjaan_ibu" => $row['PEKERJAAN IBU'],
            // "penghasilan_ibu" => $row['PENGHASILAN IBU'],
            // "nomor_telepon_ibu" => $row['NOMOR TELEPON IBU'],
            // "tanggal_masuk" => $row['TANGGAL MASUK'],