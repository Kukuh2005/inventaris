<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depresiasi extends Model
{
    protected $fillable = [
        'id',
        'lama_depresiasi',
        'keterangan',
    ];
}

