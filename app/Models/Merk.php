<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $fillable = [
        'id',
        'merk',
        'keterangan',
    ];
}

