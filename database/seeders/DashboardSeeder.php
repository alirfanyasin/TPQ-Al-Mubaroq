<?php

namespace Database\Seeders;

use App\Models\Dashboard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dashboard::create([
            'bujur' => '100.11',
            'lintang' => '1200',
            'tgl_mulai_izin_operasional' => '2023-10-06',
            'no_izin_operasional' => '120988',
            'tgl_sk_pendirian' => '2023-10-09',
            'jam_operasional' => '15:30',
            'jumlah_kelompok_belajar' => '10',
            'biaya_operasional' => '1000000',
            'status_kepemilikan' => 'pribadi',
            'nama_ketua_yayasan' => 'Moch. Andi',
            'alamat_kepala' => 'jl. ngagel',
            'nama_kepala' => 'Moh. Hanfi',
            'nama_norek' => 'Moh. hanfi choi',
            'norek' => '1109987',
            'kecamatan' => 'Wonokromo',
            'kabupaten' => 'Surabaya ',
            'rt' => '002',
            'rw' => '009',
            'no_telp' => '08776532',
            'tgl_selesai_izin_operasional' => '2024-10-09',
            'tgl_izin_operasional' => '2023-10-08',
            'no_statistik' => '1009992',
            'no_sk_pendirian' => '10099929',
            'hari_operasional' => '7',
            'metode_pembelajaran' => 'langsung',
            'sumber_dana' => 'SPP',
            'tempat_lembaga' => 'Yayasan Al mubarok',
            'kepemilikan_lembaga' => 'pribadi',
            'no_hp_kepala' => '08765532',
            'nik_kepala' => '1009228873',
            'npwp' => '100278663',
            'cabang_norek' => 'Ngagel',
            'kelurahan' => 'Ngagel',
            'alamat' => 'jl ngagel no 2',
            'bentuk_pendidikan' => 'Taman Pembelajaran Quran',
            'npsn' => '10092873',
            'nama_satuan' => 'Yayasan Al Mubarok',
            'created_at' => Date::now(),
            'updated_at' => Date::now(),
        ]);
    }
}
