<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $guarded = [];


    const MESSAGE = [
        'login' => 'Login ke sistem',
        'logout' => 'Logout dari sistem',
        'create' => 'Membuat data ',
        'update' => 'Mengubah data ',
        'delete' => 'Menghapus data ',
        'import' => 'Mengimport data ',
        'export' => 'Mengekspor data ',
        'in_class' => 'Memasukkan santri ke kelas ',
        'out_class' => 'Mengeluarkan santri dari kelas ',
        'save' => 'Menyimpan data ',
    ];



    /**
     * Get the user that owns the ActivityLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
