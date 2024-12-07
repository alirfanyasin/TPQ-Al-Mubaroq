<?php

namespace App\Models\Rapor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    protected $guarded = ['id'];


    /**
     * Get all of the rapor for the Semester
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rapor(): HasMany
    {
        return $this->hasMany(Rapor::class, 'semester_id');
    }

    /**
     * Get all of the raporItem for the Semester
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function raporItem(): HasMany
    {
        return $this->hasMany(RaporItem::class, 'semester_id');
    }
}
