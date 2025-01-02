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
        Schema::create('sub_kategori_asets', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori_asset');
            $table->string('kode_sub_kategori_asset', 20);
            $table->string('sub_kategori_asset', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kategori_asets');
    }
};
