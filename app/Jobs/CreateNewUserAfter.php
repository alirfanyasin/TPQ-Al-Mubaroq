<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateNewUserAfter implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $userNew = User::create([
            'name' => session('form_biodata.nama_lengkap'),
            'username' => strtolower(str_replace(' ', '', session('form_biodata.nama_lengkap'))) . Str::random(3),
            'email' => strtolower(str_replace(' ', '', session('form_biodata.nama_lengkap'))) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $userNew->assignRole(User::ROLE_ASATIDZ);
    }
}
