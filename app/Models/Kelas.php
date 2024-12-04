<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * Get the user that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
}
