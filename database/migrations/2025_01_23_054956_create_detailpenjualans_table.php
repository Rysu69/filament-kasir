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
        Schema::create('detailpenjualans', function (Blueprint $table) {
            $table->id('DetailID');
            $table->foreignId('PenjualanID')->references('PenjualanID')->on('penjualans')->cascadeOnDelete();
            $table->foreignId('ProdukID')->references('ProdukID')->on('produks')->cascadeOnDelete();
            $table->Integer('Jumlah');
            $table->Integer('Subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpenjualans');
    }
};
