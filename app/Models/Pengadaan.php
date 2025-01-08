<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MasterBarang;
use App\Models\Distributor;
use App\Models\Depresiasi;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;

class Pengadaan extends Model
{
    
    protected $fillable = [
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
        'jumlah_barang',
        'nilai_barang',
        'fb',
        'keterangan',
    ];

    public function masterBarang(){
        return $this->belongsTo(MasterBarang::class, 'id_master_barang');
    }

    public function distributor(){
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }

    public function merk(){
        return $this->belongsTo(Merk::class, 'id_merk');
    }

    public function subKategoriAsset(){
        return $this->belongsTo(SubKategoriAsset::class, 'id_sub_kategori_asset');
    }

    public function satuan(){
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function depresiasi(){
        return $this->belongsTo(Depresiasi::class, 'id_depresiasi');
    }
}

