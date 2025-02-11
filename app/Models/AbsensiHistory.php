<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbsensiHistory extends Model
{
    protected $table = 'absensi_histories';

    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'tanggal',
        'jumlah_masuk',
        'jumlah_tidak',
        'jumlah_sesi',
    ];

    public function absensi(): HasMany
    {
        return $this->hasMany(absensi::class, 'absensi_history_id');
    }
}
