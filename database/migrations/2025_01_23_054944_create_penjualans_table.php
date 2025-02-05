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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id('PenjualanID');
            $table->date('TanggalPenjualan');
            $table->foreignID('PetugasID')->references('PetugasID')->on('petugas')->cascadeOnDelete();
            $table->decimal('TotalHarga', 10, 2);
            $table->foreignId('PelangganID')->references('PelangganID')->on('pelanggans')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
