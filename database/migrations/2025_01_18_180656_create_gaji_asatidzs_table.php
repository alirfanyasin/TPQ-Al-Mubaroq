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
        Schema::create('gaji_asatidzs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gaji_tetap')->default(0);
            $table->bigInteger('gaji_magang')->default(0);
            $table->bigInteger('lembur_tetap')->default(0);
            $table->bigInteger('lembur_magang')->default(0);
            $table->bigInteger('kenaikan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji_asatidzs_table');
    }
};
