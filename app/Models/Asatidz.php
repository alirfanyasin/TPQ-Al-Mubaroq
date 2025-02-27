<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asatidz extends Model
{
    protected $guarded = ['id'];


    /**
     * Get the user that owns the Asatidz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the walikelas for the Asatidz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'asatidz_id');
    }

    /**
     * Get all of the gaji for the Asatidz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gaji(): HasMany
    {
        return $this->hasMany(GajiAsatidzBulanan::class, 'asatidz_id');
    }

    /**
     * Get all of the absensi for the Asatidz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'asatidz_id');
    }
}
