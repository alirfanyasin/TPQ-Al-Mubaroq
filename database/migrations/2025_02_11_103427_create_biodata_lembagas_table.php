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
        Schema::create('biodata_lembagas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_satuan')->nullable();
            $table->string('npsn')->nullable();
            $table->string('bentuk_pendidikan')->nullable();
            $table->string('tempat_lembaga')->nullable();
            $table->string('nomor_telepon_lembaga')->nullable();
            $table->string('cabang_nomor_rekening')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_nomor_rekening')->nullable();
            $table->string('nama_ketua_yayasan')->nullable();
            $table->string('kepemilikan_lembaga')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('status_kepemilikan')->nullable();
            $table->date('tanggal_sk_berdiri')->nullable();
            $table->string('metode_pembelajaran')->nullable();
            $table->string('jumlah_kelompok_belajar')->nullable();
            $table->string('nomor_sk_pendirian')->nullable();

            $table->string('nama_kepala')->nullable();
            $table->string('alamat_kepala')->nullable();
            $table->string('nik_kepala')->nullable();
            $table->string('npwp_kepala')->nullable();
            $table->string('nomor_telepon_kepala')->nullable();

            $table->string('jam_operasional')->nullable();
            $table->string('biaya_operasional')->nullable();
            $table->date('tanggal_izin_operasional')->nullable();
            $table->string('nomor_izin_operasional')->nullable();
            $table->date('tanggal_mulai_izin_operasional')->nullable();
            $table->date('tanggal_selesai_izin_operasional')->nullable();
            $table->string('hari_operasional')->nullable();
            $table->string('nomor_statistik')->nullable();

            $table->string('detail_alamat')->nullable();
            $table->string('kelurahan_or_desa')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('garis_bujur')->nullable();
            $table->string('garis_lintang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_lembagas');
    }
};
