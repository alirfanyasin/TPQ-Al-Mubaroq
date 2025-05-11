<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Tagihan\Bulanan as TagihanBulanan;
use App\Models\Tagihan\Pendaftaran as TagihanPendaftaran;
use App\Models\Tagihan\Seragam as TagihanSeragam;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SantrisImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        DB::beginTransaction();

        try {
            // Simpan data Santri
            $santri = Santri::create([
                "nama_lengkap" => $row['nama_lengkap'] ?? null,
                "nik" => $row['nik'] ?? null,
                "tempat_lahir" => $row['tempat_lahir'] ?? null,
                "nomor_induk" => $row['nis'] ?? null,
                "jenis_kelamin" => $row['jenis_kelamin'] ?? null,
                "agama" => $row['agama'] ?? null,
                "jenis_tempat_tinggal" => $row['jenis_tempat_tinggal'] ?? null,
                "anak_ke" => $row['anak_ke'] ?? null,
                "abk" => $row['abk'] ?? null,
                "kewarganegaraan" => $row['kewarganegaraan'] ?? null,
                "nomor_telepon" => $row['nomor_telepon'] ?? null,
                "alamat_lengkap_domisili" => $row['alamat_domisili'] ?? null,
                "rt_domisili" => $row['rt_domisili'] ?? null,
                "rw_domisili" => $row['rw_domisili'] ?? null,
                "desa_domisili" => $row['desa_domisili'] ?? null,
                "kecamatan_domisili" => $row['kecamatan_domisili'] ?? null,
                "kota_domisili" => $row['kota_domisili'] ?? null,
                "alamat_lengkap_kk" => $row['alamat_kk'] ?? null,
                "rt_kk" => $row['rt_kk'] ?? null,
                "rw_kk" => $row['rw_kk'] ?? null,
                "desa_kk" => $row['desa_kk'] ?? null,
                "kecamatan_kk" => $row['kecamatan_kk'] ?? null,
                "kota_kk" => $row['kota_kk'] ?? null,
                "nama_lengkap_ayah" => $row['nama_lengkap_ayah'] ?? null,
                "nik_ayah" => $row['nik_ayah'] ?? null,
                "tempat_lahir_ayah" => $row['tempat_lahir_ayah'] ?? null,
                "agama_ayah" => $row['agama_ayah'] ?? null,
                "status_ayah" => $row['status_ayah'] ?? null,
                "pekerjaan_ayah" => $row['pekerjaan_ayah'] ?? null,
                "penghasilan_ayah" => $row['penghasilan_ayah'] ?? null,
                "nomor_telepon_ayah" => $row['nomor_telepon_ayah'] ?? null,
                "nama_lengkap_ibu" => $row['nama_lengkap_ibu'] ?? null,
                "nik_ibu" => $row['nik_ibu'] ?? null,
                "tempat_lahir_ibu" => $row['tempat_lahir_ibu'] ?? null,
                "agama_ibu" => $row['agama_ibu'] ?? null,
                "status_ibu" => $row['status_ibu'] ?? null,
                "pekerjaan_ibu" => $row['pekerjaan_ibu'] ?? null,
                "penghasilan_ibu" => $row['penghasilan_ibu'] ?? null,
                "nomor_telepon_ibu" => $row['nomor_telepon_ibu'] ?? null,
            ]);

            $santri['tanggal_masuk'] = Carbon::now();

            // Buat tagihan setelah santri tersimpan
            TagihanPendaftaran::create([
                'status' => 'Belum Lunas',
                'santri_id' => $santri->id,
            ]);

            TagihanSeragam::create([
                'status' => 'Belum Lunas',
                'santri_id' => $santri->id,
            ]);

            TagihanBulanan::create([
                'status' => 'Belum Lunas',
                'date' => now(),
                'santri_id' => $santri->id,
            ]);

            DB::commit();

            return $santri;
        } catch (\Exception $e) {
            DB::rollBack();
            return null;
        }
    }
}
