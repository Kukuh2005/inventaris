<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'id',
        'nama_distributor',
        'alamat',
        'no_telp',
        'email',
        'keterangan',
    ];
}

