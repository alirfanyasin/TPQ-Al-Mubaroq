<?php

namespace App\Models\Rapor;

use App\Models\Jilid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RaporItem extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the rapor that owns the RaporItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rapor(): BelongsTo
    {
        return $this->belongsTo(Rapor::class, 'rapor_id');
    }

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
}
