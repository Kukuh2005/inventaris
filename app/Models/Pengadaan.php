<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $fillable = [
        'id',
        'id_master_barang',
        'id_depresiasi',
        'id_merk',
        'id_satuan',
        'id_sub_kategori_asset',
        'id_distributor',
        'kode_pengadaan',
        'no_invoice',
        'no_seri_barang',
        'tahun_produksi',
        'tgl_pengadaan',
        'harga_barang',
        'nilai_barang',
        'fb',
        'keterangan',
    ];
}

