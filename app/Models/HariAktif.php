<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HariAktif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'hari_aktifs';

    protected $fillable = [
        'bulan_tahun',
        'jumlah_hari',
    ];
}
