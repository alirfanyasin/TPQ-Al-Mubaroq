<?php

namespace App\Models\Tagihan;

use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pendaftaran extends Model
{
    protected $table = 'tagihan_pendaftarans';
    protected $guarded = ['id'];


    /**
     * Get the santri that owns the Pendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function santri(): BelongsTo
    {
        return $this->belongsTo(Santri::class, 'santri_id');
    }
    /**
     * Get all of the tagihanSantri for the Pendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagihanSantri(): HasMany
    {
        return $this->hasMany(TagihanSantri::class, 'tagihan_santri_id');
    }
}
