<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gaji_asatidz_bulanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asatidz_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('gaji_pokok')->default(0);
            $table->bigInteger('masa_kerja')->default(0);
            $table->bigInteger('gaji_bruto')->default(0);
            $table->bigInteger('lembur')->default(0);
            $table->bigInteger('extra')->default(0);
            $table->bigInteger('kenaikan')->default(0);
            $table->bigInteger('kasbon')->default(0);
            $table->bigInteger('tunjangan_operasional')->default(0);
            $table->bigInteger('tunjangan_jabatan')->default(0);
            $table->bigInteger('jumlah_hari_efektif')->default(0);
            $table->date('tanggal');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji_asatidz_bulanans');
    }
};
