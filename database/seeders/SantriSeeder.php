<?php

namespace Database\Seeders;

use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tagihan\Bulanan as TagihanBulanan;
use App\Models\Tagihan\Pendaftaran as TagihanPendaftaran;
use App\Models\Tagihan\Seragam as TagihanSeragam;
use Illuminate\Support\Str;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $data = Santri::create([
                'nama_lengkap' => fake()->name(),
                'nik' => '320123456789' . $i,
                'nomor_induk' => 'NIS-' . $i,
                'tempat_lahir' => fake()->address(),
                'tanggal_lahir' => Carbon::now()->subYears(rand(10, 20))->format('Y-m-d'),
                'jenis_kelamin' => $i % 2 == 0 ? 'Laki-Laki' : 'Perempuan',
                'agama' => 'Islam',
                'jenis_tempat_tinggal' => $i % 2 == 0 ? 'Rumah Orang Tua' : 'Asrama',
                'anak_ke' => rand(1, 5),
                'abk' => $i % 3 == 0 ? 'Ya' : 'Tidak',
                'kewarganegaraan' =>  $i % 2 == 0 ? 'WNI' : 'WNA',
                'nomor_telepon' => '08123456789' . $i,
                'alamat_lengkap_domisili' => 'Jl. Domisili ' . fake()->address(),
                'rt_domisili' => rand(1, 10),
                'rw_domisili' => rand(1, 10),
                'desa_domisili' => fake()->address(),
                'kecamatan_domisili' => fake()->address(),
                'kota_domisili' =>  fake()->address(),
                'alamat_lengkap_kk' =>  fake()->address(),
                'rt_kk' => rand(1, 10),
                'rw_kk' => rand(1, 10),
                'desa_kk' =>  fake()->address(),
                'kecamatan_kk' =>  fake()->address(),
                'kota_kk' =>  fake()->address(),
                'nama_lengkap_ayah' =>  fake()->name('male'),
                'nik_ayah' => '320987654321' . $i,
                'tempat_lahir_ayah' =>  fake()->address(),
                'tanggal_lahir_ayah' => Carbon::now()->subYears(rand(35, 50))->format('Y-m-d'),
                'agama_ayah' => 'Islam',
                'status_ayah' => 'Hidup',
                'pekerjaan_ayah' => 'Pekerjaan Ayah ' . fake()->jobTitle(),
                'penghasilan_ayah' => rand(1000000, 5000000),
                'nomor_telepon_ayah' => '08123456789' . $i,
                'nama_lengkap_ibu' => fake()->name('female'),
                'nik_ibu' => '320765432189' . $i,
                'tempat_lahir_ibu' => fake()->address(),
                'tanggal_lahir_ibu' => Carbon::now()->subYears(rand(30, 45))->format('Y-m-d'),
                'agama_ibu' => 'Islam',
                'status_ibu' => 'Hidup',
                'pekerjaan_ibu' => 'Pekerjaan Ibu ' . fake()->jobTitle(),
                'penghasilan_ibu' => rand(1000000, 5000000),
                'nomor_telepon_ibu' => '08123456789' . $i,
                'foto_santri' => 'https://darunnajah.com/wp-content/uploads/2019/10/Santri-Darunnajah-1024x817.jpg',
                'kk_santri' => 'https://lh6.googleusercontent.com/proxy/RLJbRNliZg8-7mGW0nqTsQbi3k6iY5EHPhfiTyqUJmqYJtHnxK6NJmXJEWme4Pym69gUfhDk-ThRsQiJYCcGQhpPjvDo',
                'tanggal_masuk' => Carbon::now()->subMonths(rand(1, 12))->format('Y-m-d'),
            ]);
            TagihanPendaftaran::create([
                'status' => 'Belum Lunas',
                'santri_id' => $data->id
            ]);
            TagihanSeragam::create([
                'status' => 'Belum Lunas',
                'santri_id' => $data->id
            ]);
            TagihanBulanan::create([
                'status' => 'Belum Lunas',
                'date' => Carbon::now(),
                // 'date' => '2024-11-11 22:45:02',
                'santri_id' => $data->id
            ]);
            dump('Santri ' . $data->nama_lengkap);
        }
    }
}
