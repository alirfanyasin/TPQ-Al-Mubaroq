<?php

namespace App\Models;

use App\Models\Rapor\Rapor;
use App\Models\Tagihan\Bulanan;
use App\Models\Tagihan\Pendaftaran;
use App\Models\Tagihan\Seragam;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Santri extends Model
{
    protected $table = 'santris';
    protected $guarded = ['id'];


    /**
     * Get the kelas that owns the Santri
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }


    /**
     * Get all of the rapor for the Santri
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rapor(): HasMany
    {
        return $this->hasMany(Rapor::class, 'santri_id');
    }

    /**
     * Get all of the tagihanBulanan for the Santri
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagihanBulanan(): HasOne
    {
        return $this->hasOne(Bulanan::class, 'santri_id');
    }

    /**
     * Get all of the tagihanPendataran for the Santri
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagihanPendaftaran(): HasOne
    {
        return $this->hasOne(Pendaftaran::class, 'santri_id');
    }

    /**
     * Get all of the tagihanSeragam for the Santri
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagihanSeragam(): HasOne
    {
        return $this->hasOne(Seragam::class, 'santri_id');
    }
}
