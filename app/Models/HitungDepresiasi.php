<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HitungDepresiasi extends Model
{
    protected $fillable = [
        'id',
        'id_pengadaan',
        'tgl_hitung_depresiasi',
        'bulan',
        'durasi',
        'nilai_barang',
    ];
}

