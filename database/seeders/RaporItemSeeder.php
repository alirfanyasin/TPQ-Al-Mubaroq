<?php

namespace Database\Seeders;

use App\Models\Rapor\RaporItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaporItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemGanjilJilid1 = [
            [
                "category" => "BACA TULIS AL-QURAN",
                "items" => [
                    1 => ["Baca", "Khot"],
                    2 => ["Baca", "Khot"],
                    3 => ["Baca", "Khot"],
                    4 => ["Baca", "Khot"],
                    5 => ["Baca", "Khot"],
                    6 => ["Baca", "Khot"],
                    7 => ["Baca", "Khot"],
                    8 => ["Baca", "Khot"],
                ]
            ],
            [
                "category" => "HAFALAN DOA HARIAN",
                "items" => [

                    1 => ["Sebelum Makan", "Setelah Makan", "Niat Wudhu"],
                    2 => ["Masuk Masjid", "Keluar Masjid", "Niat Sholat Subuh", "Niat Sholat Dhuhur"],
                    3 => ["Masuk Kamar Mandi", "Keluar Kamar Mandi", "Niat Sholat Isya'", "Sesudah Wudhu"],
                    4 => ["Bercermin", "Naik Kendaraan", "Rukuk", "I'tidal"],
                    5 => ["Turun Hujan", "Mendengar Petir", "Tahiyyat Awal"],
                    6 => ["Penutup Majelis", "Bersin & Jawab", "Qunut"],
                    7 => ["Bertambah Ilmu", "Mau Tidur", "Bangun Tidur", "Masuk Masjid", "Keluar Masjid", "Masuk Kamar Mandi", "Keluar Kamar Mandi", "Kedua Orang Tua", "Masuk Rumah", "Keluar Rumah", "Doa & Dzikir"],
                    8 => ["Bertambah Ilmu", "Mau Tidur", "Bangun Tidur", "Masuk Masjid", "Keluar Masjid", "Masuk Kamar Mandi", "Keluar Kamar Mandi", "Kedua Orang Tua", "Masuk Rumah", "Keluar Rumah", "Doa & Dzikir"],
                ]
            ],
            [
                "category" => "HAFALAN SURAT PENDEK",
                "items" => [

                    1 => ["Al Fatihah"],
                    2 => ["An Nas", "Al Falaq"],
                    3 => ["An Nashr", "AL Kafirun"],
                    4 => ["Quraisy", "Al Fil"],
                    5 => ["Al Humazah", "Al Ashr"],
                    6 => ["Al Adiyat", "Al Zalzalah"],
                    7 => ["Al Qadr", "Al Alaq"],
                    8 => ["Al Lail", "As Syams"],
                ]
            ],
            [
                "category" => "PRAKTEK GERAKAN",
                "items" => [
                    1 => ["Wudlu", "Sholat"],
                    2 => ["Wudlu", "Sholat"],
                    3 => ["Wudlu", "Sholat"],
                    4 => ["Wudlu", "Sholat"],
                    5 => ["Wudlu", "Sholat"],
                    6 => ["Wudlu", "Sholat"],
                    7 => ["Wudlu", "Sholat"],
                    8 => ["Wudlu", "Sholat"],
                ]
            ],
            [
                "category" => "HAFALAN HADIST",
                "items" => [
                    1 => ["Menahan Amarah", "Berkata Baik"],
                    2 => ["Menahan Amarah", "Berkata Baik"],
                    3 => ["Menahan Amarah", "Berkata Baik"],
                    4 => ["Menahan Amarah", "Berkata Baik"],
                    5 => ["Menahan Amarah", "Berkata Baik"],
                    6 => ["Menahan Amarah", "Berkata Baik"],
                    7 => ["Menahan Amarah", "Berkata Baik"],
                    8 => ["Menahan Amarah", "Berkata Baik"],
                ]
            ],
            [
                "category" => "TEORI WUDLU & SHOLAT",
                "items" => [
                    7 => ["Wudlu & Sholat"],
                    8 => ["Wudlu & Sholat"],
                ]
            ]
        ];

        foreach ($itemGanjilJilid1 as $category) {
            foreach ($category['items'] as $jilidId => $items) {
                foreach ($items as $item) {
                    RaporItem::create([
                        'nama' => $item,
                        'jenis_penilaian' => $category['category'],
                        'semester_id' => 1,
                        'jilid_id' => $jilidId
                    ]);
                }
            }
        }
    }
}
