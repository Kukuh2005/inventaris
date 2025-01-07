<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubKategoriAsset;

class KategoriAsset extends Model
{
    protected $fillable = [
        'kode_kategori_asset',
        'kategori_asset',
    ];

    public function SubKategoriAsset(){
        return $this->HasMany(SubKategoriAsset::class);
    }
}

