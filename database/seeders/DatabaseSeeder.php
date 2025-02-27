<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gaji;
use App\Models\Rapor\RaporItem;
use Database\Seeders\Rapor\SemesterSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
                $this->call([RolePermissionSeeder::class]);
                $this->call([RoleUserSeeder::class]);
                $this->call([AsatidzSeeder::class]);
                $this->call([SantriSeeder::class]);
                $this->call([TagihanSeeder::class]);
                $this->call([JilidSeeder::class]);
                $this->call([SemesterSeeder::class]);
                $this->call([RaporItemSeeder::class]);
                $this->call([DashboardSeeder::class]);
                $this->call([GajiSeeder::class]);
                $this->call([GajiBulananAsatidzsSeeder::class]);
                $this->call([HariAktifSeeder::class]);
                $this->call([AbsensiHistorySeeder::class]);
                $this->call([AbsensiSeeder::class]);
                $this->call([BiodataLembagaSeeder::class]);
        }
}
