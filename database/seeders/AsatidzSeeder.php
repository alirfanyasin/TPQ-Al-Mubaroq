<?php

namespace Database\Seeders;

use App\Models\Asatidz;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AsatidzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            // Buat nama lengkap acak
            $namaLengkap = "Asatidz " . fake()->name();

            // Buat user terkait
            $userNew = User::create([
                'name' => $namaLengkap,
                'username' => strtolower(str_replace(' ', '', $namaLengkap)) . mt_rand(100, 999),
                'email' => strtolower(str_replace(' ', '', $namaLengkap)) . mt_rand(100, 999) . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
            $userNew->assignRole(User::ROLE_ASATIDZ);

            dump('User ' . $userNew->name . ' created');

            // Buat data Asatidz
            Asatidz::create([
                'nama_lengkap' => $namaLengkap,
                'nik' => '320123456789' . $i,
                'nomor_pokok_anggota' => 'NPA-' . $i,
                'tempat_lahir' => 'Kota ' . Str::random(3),
                'tanggal_lahir' => now()->subYears(rand(20, 40))->toDateString(),
                'jenis_kelamin' => $i % 2 == 0 ? 'Laki-laki' : 'Perempuan',
                'agama' => 'Islam',
                'jabatan' => 'Guru ' . Str::random(3),
                'npwp' => 'NPWP-' . mt_rand(1000, 9999),
                'pendidikan_terakhir' => 'S1',
                'jurusan' => 'Pendidikan ' . Str::random(3),
                'tahun_lulus' => rand(2010, 2020),
                'nomor_kk' => '320123456789' . $i,
                'kewarganegaraan' =>  $i % 2 == 0 ? 'WNI' : 'WNA',
                'nomor_jamsos' => rand(100, 999) . '9327' . rand(10, 99),
                'nomor_rekening' => '123456789' . $i,
                'status' => $i % 2 == 0 ? 'Tetap' : 'Magang',
                'nomor_telepon' => '08123456789' . $i,
                'nama_ibu' => 'Ibu ' . fake()->name('female'),
                'keterangan' => 'Keterangan ' . $i,
                'alamat_lengkap' => 'Jl. Contoh Alamat ' . $i,
                'rt' => rand(1, 10),
                'rw' => rand(1, 10),
                'desa' => 'Desa ' . $i,
                'kecamatan' => 'Kecamatan ' . $i,
                'kota' => 'Kota ' . $i,
                'foto_asatidz' => 'https://i.pinimg.com/236x/09/3a/66/093a663baec45b1571a91b444fbeb2a4.jpg',
                'kk_asatidz' => 'https://www.bhuanajaya.desa.id/wp-content/uploads/images/kartu-keluarga-kk.webp',
                'user_id' => $userNew->id,
            ]);
        }
    }
}
