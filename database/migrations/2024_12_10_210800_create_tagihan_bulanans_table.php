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
        Schema::create('tagihan_bulanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bayar')->default(0);
            $table->unsignedInteger('angsuran')->nullable();
            $table->enum('status', ['Belum Lunas', 'Lunas']);
            $table->string('date');
            $table->foreignId('santri_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulanans');
    }
};
