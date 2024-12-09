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
}
