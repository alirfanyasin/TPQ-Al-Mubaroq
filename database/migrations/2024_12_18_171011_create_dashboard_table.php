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
        Schema::create('dashboard', function (Blueprint $table) {
            $table->id();
            $table->string('bujur');
            $table->string('lintang');
            $table->string('no_izin_operasional');
            $table->date('tgl_izin_operasional');
            $table->date('tgl_mulai_izin_operasional');
            $table->date('tgl_selesai_izin_operasional');
            $table->date('tgl_sk_pendirian');
            $table->string('jam_operasional');
            $table->integer('jumlah_kelompok_belajar');
            $table->integer('biaya_operasional');
            $table->string('status_kepemilikan');
            $table->string('nama_ketua_yayasan');
            $table->string('alamat_kepala');
            $table->string('nama_kepala');
            $table->string('nama_norek');
            $table->string('norek');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('rt');
            $table->string('rw');
            $table->string('no_telp');
            $table->string('no_statistik');
            $table->string('no_sk_pendirian');
            $table->string('hari_operasional');
            $table->string('metode_pembelajaran');
            $table->string('sumber_dana');
            $table->string('tempat_lembaga');
            $table->string('kepemilikan_lembaga');
            $table->string('no_hp_kepala');
            $table->string('nik_kepala');
            $table->string('npwp');
            $table->string('cabang_norek');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->string('bentuk_pendidikan');
            $table->string('npsn');
            $table->string('nama_satuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard');
    }
};
