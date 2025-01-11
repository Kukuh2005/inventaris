<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pengadaan;

class Opname extends Model
{
    protected $fillable = [
        'id_pengadaan',
        'tgl_opname',
        'kondisi',
        'keterangan',
    ];

    public function pengadaan(){
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }
}

