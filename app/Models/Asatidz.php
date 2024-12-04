<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
