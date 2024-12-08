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
        Schema::create('rapor_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rapor_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('rapor_item_id')->nullable()->constrained()->onDelete('cascade');
            $table->decimal('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapor_nilais');
    }
};
