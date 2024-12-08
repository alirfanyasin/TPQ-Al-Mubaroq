<?php

namespace App\Models\Rapor;

use App\Models\Jilid;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rapor extends Model
{
    protected $guarded = ['id'];


    /**
     * Get the semester that owns the Rapor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    /**
     * Get the jilid that owns the Rapor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jilid(): BelongsTo
    {
        return $this->belongsTo(Jilid::class, 'jilid_id');
    }


    /**
     * Get the santri that owns the Rapor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function santri(): BelongsTo
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }

    /**
     * Get all of the raporItem for the Rapor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function raporItem(): HasMany
    {
        return $this->hasMany(RaporItem::class, 'rapor_id');
    }


    /**
     * Get all of the raporNilai for the Rapor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function raporNilai(): HasMany
    {
        return $this->hasMany(RaporNilai::class, 'rapor_id');
    }
}
