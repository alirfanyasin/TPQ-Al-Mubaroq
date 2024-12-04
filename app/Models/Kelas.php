<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the jilid that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jilid(): BelongsTo
    {
        return $this->belongsTo(Jilid::class, 'jilid_id');
    }


    /**
     * Get the asatid that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asatidz(): BelongsTo
    {
        return $this->belongsTo(Asatidz::class, 'asatidz_id');
    }

    /**
     * Get all of the santri for the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function santri(): HasMany
    {
        return $this->hasMany(Santri::class, 'kelas_id');
    }
}
