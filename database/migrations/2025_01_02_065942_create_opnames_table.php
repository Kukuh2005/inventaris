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
        Schema::create('opnames', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pengadaan');
            $table->date('tgl_opname');
            $table->string('kondisi', 25);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opnames');
    }
};
