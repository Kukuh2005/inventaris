<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiLokasi extends Model
{
    protected $fillable = [
        'id_lokasi',
        'id_pengadaan',
        'flag_lokasi',
        'flag_pindah',
    ];
}

