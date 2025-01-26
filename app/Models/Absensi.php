<?php

namespace App\Models;

use App\Models\Asatidz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'absensis';

    public function asatidz(): BelongsTo
    {
        return $this->belongsTo(Asatidz::class, 'asatidz_id');
    }

    public function absensi_history(): BelongsTo
    {
        return $this->belongsTo(AbsensiHistory::class, 'absensi_history_id');
    }
}
