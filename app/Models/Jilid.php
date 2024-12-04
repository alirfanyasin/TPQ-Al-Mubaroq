<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jilid extends Model
{
    protected $fillable = ['nama'];

    /**
     * Get all of the walikelas for the Jilid
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'jilid_id');
    }
}
