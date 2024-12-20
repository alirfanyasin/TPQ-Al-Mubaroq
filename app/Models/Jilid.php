<?php

namespace App\Models;

use App\Models\Rapor\Rapor;
use App\Models\Rapor\RaporCategory;
use App\Models\Rapor\RaporItem;
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


    /**
     * Get all of the rapor for the Jilid
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rapor(): HasMany
    {
        return $this->hasMany(Rapor::class, 'jilid_id');
    }

    /**
     * Get all of the raporItem for the Jilid
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function raporItem(): HasMany
    {
        return $this->hasMany(RaporItem::class, 'jilid_id');
    }
}
