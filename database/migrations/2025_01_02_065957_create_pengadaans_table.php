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
        Schema::create('pengadaans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_master_barang');
            $table->integer('id_depresiasi');
            $table->integer('id_merk');
            $table->integer('id_satuan');
            $table->integer('id_sub_kategori_asset');
            $table->integer('id_distributor');
            $table->string('kode_pengadaan', 20);
            $table->string('no_invoice', 20);
            $table->string('no_seri_barang', 50);
            $table->string('tahun_produksi', 5);
            $table->date('tgl_pengadaan');
            $table->integer('harga_barang');
            $table->integer('nilai_barang');
            $table->enum('fb', ['0', '1']);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaans');
    }
};
