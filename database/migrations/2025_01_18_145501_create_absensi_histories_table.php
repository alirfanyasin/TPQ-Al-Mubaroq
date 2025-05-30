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
        Schema::create('absensi_histories', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->integer('jumlah_masuk');
            $table->integer('jumlah_tidak');
            $table->integer('jumlah_sesi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_histories');
    }
};
