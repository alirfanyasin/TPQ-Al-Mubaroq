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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap')->nullable();
            $table->string('nik')->nullable();
            $table->string('nomor_induk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->string('agama')->nullable();
            $table->string('jenis_tempat_tinggal')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('abk')->nullable();
            $table->enum('kewarganegaraan', ['WNI', 'WNA'])->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('alamat_lengkap_domisili')->nullable();
            $table->string('rt_domisili')->nullable();
            $table->string('rw_domisili')->nullable();
            $table->string('desa_domisili')->nullable();
            $table->string('kecamatan_domisili')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->string('alamat_lengkap_kk')->nullable();
            $table->string('rt_kk')->nullable();
            $table->string('rw_kk')->nullable();
            $table->string('desa_kk')->nullable();
            $table->string('kecamatan_kk')->nullable();
            $table->string('kota_kk')->nullable();
            $table->string('nama_lengkap_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->string('tanggal_lahir_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('status_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('nomor_telepon_ayah')->nullable();
            $table->string('nama_lengkap_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->string('tanggal_lahir_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('status_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('nomor_telepon_ibu')->nullable();
            $table->string('foto_santri')->nullable();
            $table->string('kk_santri')->nullable();
            $table->dateTime('tanggal_masuk')->nullable();
            $table->foreignId('kelas_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
