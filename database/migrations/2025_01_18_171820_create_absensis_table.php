<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id(); // Add an auto-incrementing ID as the primary key
            $table->foreignId('absensi_history_id')->constrained(); // Keep foreign key
            $table->foreignId('asatidz_id')->nullable()->constrained(); // Foreign key for Asatidz
            $table->integer('jumlah_sesi')->nullable();
            $table->integer('jumlah_masuk')->nullable();
            $table->integer('jumlah_tidak')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
};
