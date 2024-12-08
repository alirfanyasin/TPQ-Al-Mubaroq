<?php

namespace Database\Seeders;

use App\Models\Jilid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JilidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJilid = [
            "Pra",
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "Qur'an",
        ];

        foreach ($dataJilid as $jilid) {
            Jilid::create([
                'nama' => $jilid
            ]);
        }
    }
}
