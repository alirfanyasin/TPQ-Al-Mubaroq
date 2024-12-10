<?php

namespace App\Models\Tagihan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TagihanSantri extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the seragam that owns the TagihanSantri
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seragam(): BelongsTo
    {
        return $this->belongsTo(Seragam::class, 'tagihan_seragam_id');
    }

    /**
     * Get the pendaftaran that owns the TagihanSantri
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class, 'tagihan_pendaftaran_id');
    }


    /**
     * Get the bulanan that owns the TagihanSantri
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bulanan(): BelongsTo
    {
        return $this->belongsTo(Bulanan::class, 'tagihan_bulanan_id');
    }
}
