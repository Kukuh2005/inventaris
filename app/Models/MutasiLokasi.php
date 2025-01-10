<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pengadaan;
use App\Models\Lokasi;

class MutasiLokasi extends Model
{
    protected $fillable = [
        'id_lokasi',
        'id_pengadaan',
        'flag_lokasi',
        'flag_pindah',
    ];

    public function pengadaan(){
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }

    public function lokasi(){
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
}

