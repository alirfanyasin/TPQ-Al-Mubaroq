<?php

namespace App\Models\Rapor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RaporNilai extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the rapor that owns the RaporNilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rapor(): BelongsTo
    {
        return $this->belongsTo(Rapor::class, 'rapor_id');
    }


    /**
     * Get the raporItem that owns the RaporNilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function raporItem(): BelongsTo
    {
        return $this->belongsTo(RaporItem::class, 'rapor_item_id');
    }
}
