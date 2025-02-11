<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GajiAsatidzBulanan extends Model
{
    protected $guarded = ['id'];
    protected $table = 'gaji_asatidz_bulanans';
    use HasFactory;

    public function asatidz(): BelongsTo 
    {
        return $this->belongsTo(Asatidz::class, 'asatidz_id');
    }
}



