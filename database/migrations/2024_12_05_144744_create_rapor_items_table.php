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
        Schema::create('rapor_items', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->unsignedInteger('nilai')->nullable();
            $table->foreignId('rapor_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('semester_id')->nullable()->constrained();
            $table->foreignId('jilid_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapor_items');
    }
};
