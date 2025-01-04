<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    protected $fillable = [
        'id',
        'kode_barang',
        'nama_barang',
        'spesifikasi_teknis',
    ];
}

