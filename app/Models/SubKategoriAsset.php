<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriAsset;

class SubKategoriAsset extends Model
{
    protected $fillable = [
        'id_kategori_asset',
        'kode_sub_kategori_asset',
        'sub_kategori_asset',
    ];

    public function KategoriAsset(){
        return $this->belongsTo(KategoriAsset::class, 'id_kategori_asset');
    }
}