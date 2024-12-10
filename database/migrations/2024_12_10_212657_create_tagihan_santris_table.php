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
        Schema::create('tagihan_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_pendaftaran_id')->nullable()->constrained();
            $table->foreignId('tagihan_seragam_id')->nullable()->constrained();
            $table->foreignId('tagihan_bulanan_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan_santris');
    }
};
