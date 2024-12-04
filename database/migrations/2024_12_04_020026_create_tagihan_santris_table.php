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
            $table->string('tagihan_pedaftaran')->default(0);
            $table->string('tagihan_bulanan')->default(0);
            $table->string('tagihan_biaya_seragam')->default(0);
            $table->foreignId('santri_id')->constrained();
            $table->string('status');
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
