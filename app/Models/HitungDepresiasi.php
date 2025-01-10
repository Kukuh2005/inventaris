<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pengadaan;

class HitungDepresiasi extends Model
{
    protected $fillable = [
        'id_pengadaan',
        'tgl_hitung_depresiasi',
        'bulan',
        'durasi',
        'nilai_barang',
    ];

    public function pengadaan(){
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }
}

