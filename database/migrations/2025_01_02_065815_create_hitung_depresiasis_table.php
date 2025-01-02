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
        Schema::create('hitung_depresiasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pengadaan');
            $table->date('tgl_hitung_depresiasi');
            $table->string('bulan', 10);
            $table->integer('durasi');
            $table->integer('nilai_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitung_depresiasis');
    }
};
