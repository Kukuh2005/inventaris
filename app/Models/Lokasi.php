<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'id',
        'kode_lokasi',
        'nama_lokasi',
        'keterangan',
    ];
}

