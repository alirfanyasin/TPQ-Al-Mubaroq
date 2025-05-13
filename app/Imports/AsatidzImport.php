<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Asatidz;
use App\Models\GajiAsatidzBulanan;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AsatidzImport implements ToModel, WithHeadingRow
{
    /**
     * Map Excel row to the database model.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Cek apakah Asatidz sudah ada berdasarkan NIK
        $existingAsatidz = Asatidz::where('nik', $row['nik'])->first();
        if ($existingAsatidz) {
            // Skip jika sudah ada
            return null;
        }

        // Membuat user baru
        $username = strtolower(str_replace(' ', '', $row['nama_lengkap'])) . mt_rand(100, 999);
        $email = strtolower(str_replace(' ', '', $row['nama_lengkap'])) . mt_rand(100, 999) . '@gmail.com';

        $userNew = User::create([
            'name' => $row['nama_lengkap'],
            'username' => $username,
            'email' => $email,
            'password' => Hash::make('password'),
        ]);

        // Assign role ke user
        $userNew->assignRole(User::ROLE_ASATIDZ);

        // Membuat data Asatidz
        $asatidz = new Asatidz([
            "nama_lengkap" => $row['nama_lengkap'],
            "nik" => $row['nik'],
            "nomor_pokok_anggota" => $row['nomor_pokok_anggota'],
            "tempat_lahir" => $row['tempat_lahir'],
            "jenis_kelamin" => $row['jenis_kelamin'],
            "agama" => $row['agama'],
            "jabatan" => $row['jabatan'],
            "npwp" => $row['npwp'],
            "pendidikan_terakhir" => $row['pendidikan_terakhir'],
            "jurusan" => $row['jurusan'],
            "tahun_lulus" => $row['tahun_lulus'],
            "nomor_kk" => $row['nomor_kk'],
            "kewarganegaraan" => $row['kewarganegaraan'],
            "nomor_jamsos" => $row['nomor_jamsos'],
            "nomor_rekening" => $row['nomor_rekening'],
            "status" => $row['status'],
            "nomor_telepon" => $row['nomor_telepon'],
            "nama_ibu" => $row['nama_ibu'],
            "keterangan" => $row['keterangan'],
            "alamat_lengkap" => $row['alamat_lengkap'],
            "rt" => $row['rt'],
            "rw" => $row['rw'],
            "desa" => $row['desa'],
            "kecamatan" => $row['kecamatan'],
            "kota" => $row['kota'],
        ]);

        // Menautkan user_id
        $asatidz->user_id = $userNew->id;

        // Simpan data Asatidz
        $asatidz->save();

        GajiAsatidzBulanan::create([
            'asatidz_id' => $asatidz->id,
            'tanggal' => now(),
            'jumlah_hari_efektif' => 0,
            'tunjangan_jabatan' => 0,
            'tunjangan_operasional' => 0,
            'lembur' => 0,
            'extra' => 0,
            'kasbon' => 0,
        ]);

        return $asatidz;
    }
}
