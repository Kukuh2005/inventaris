<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opname extends Model
{
    protected $fillable = [
        'id',
        'id_pengadaan',
        'tgl_opname',
        'kondisi',
        'keterangan',
    ];
}

