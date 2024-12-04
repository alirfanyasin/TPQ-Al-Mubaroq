<?php

namespace Database\Seeders;

use App\Models\Tagihan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([TagihanSeeder::class]);
        $this->call([JilidSeeder::class]);
    }
}
