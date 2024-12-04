<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => strtolower('Admin'),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);
        $admin->assignRole(User::ROLE_ADMIN);
        dump($admin['name'] . ' Created');


        $asatidz = User::create([
            'name' => 'Asatidz',
            'username' => strtolower('Asatidz'),
            'email' => 'asatidz@gmail.com',
            'password' => Hash::make('password')
        ]);

        $asatidz->assignRole(User::ROLE_ASATIDZ);
        dump($asatidz['name'] . ' Created');
    }
}
