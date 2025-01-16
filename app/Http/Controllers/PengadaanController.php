<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\MasterBarang;
use App\Models\Depresiasi;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengadaan = Pengadaan::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        
        $masterBarang = MasterBarang::all();
        $depresiasi = Depresiasi::all();
        $merk = Merk::all();
        $satuan = Satuan::all();
        $subKategoriAsset = SubKategoriAsset::all();
        $distributor = Distributor::all();

        $kode = $this->generateKode();
        
        return view('pengadaan.index', compact(
            'pengadaan',
            'masterBarang',
            'depresiasi',
            'merk',
            'satuan',
            'subKategoriAsset',
            'distributor',
            'kode'
        ));        
    }

    private function generateKode(){
        $cek = Pengadaan::count();
        $now = Carbon::now();
        $tahun_bulan = $now->year . $now->month;

        if($cek == 0){
            $nomor = "00001";
            $kode = "PIVN-" . $tahun_bulan . $nomor;
        }else{
            $data_terakhir = Pengadaan::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_pengadaan, -5) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 5, '0', STR_PAD_LEFT);
            $kode = "PIVN-" . $tahun_bulan . $nomor_urut_padded;
        }

        return $kode;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $pengadaan = new Pengadaan;
        $pengadaan->id_master_barang = $request->id_master_barang;
        $pengadaan->id_depresiasi = $request->id_depresiasi;
        $pengadaan->id_merk = $request->id_merk;
        $pengadaan->id_satuan = $request->id_satuan;
        $pengadaan->id_sub_kategori_asset = $request->id_sub_kategori_asset;
        $pengadaan->id_distributor = $request->id_distributor;
        $pengadaan->kode_pengadaan = $this->generateKode();
        $pengadaan->no_invoice = $request->no_invoice;
        $pengadaan->no_seri_barang = $request->no_seri_barang;
        $pengadaan->tahun_produksi = $request->tahun_produksi;
        $pengadaan->tgl_pengadaan = $request->tgl_pengadaan;
        $pengadaan->harga_barang = $request->harga_barang;
        $pengadaan->jumlah_barang = $request->jumlah_barang;
        $pengadaan->nilai_barang = $request->jumlah_barang * $request->harga_barang;
        $pengadaan->fb = $request->fb;
        $pengadaan->keterangan = $request->keterangan;
        $pengadaan->save();
        
        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengadaan $pengadaan)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);
        
        $pengadaan = Pengadaan::findOrFail($id);
        $pengadaan->id_master_barang = $request->id_master_barang;
        $pengadaan->id_depresiasi = $request->id_depresiasi;
        $pengadaan->id_merk = $request->id_merk;
        $pengadaan->id_satuan = $request->id_satuan;
        $pengadaan->id_sub_kategori_asset = $request->id_sub_kategori_asset;
        $pengadaan->id_distributor = $request->id_distributor;
        $pengadaan->no_invoice = $request->no_invoice;
        $pengadaan->no_seri_barang = $request->no_seri_barang;
        $pengadaan->tahun_produksi = $request->tahun_produksi;
        $pengadaan->tgl_pengadaan = $request->tgl_pengadaan;
        $pengadaan->harga_barang = $request->harga_barang;
        $pengadaan->jumlah_barang = $request->jumlah_barang;
        $pengadaan->nilai_barang = $request->jumlah_barang * $request->harga_barang;
        $pengadaan->fb = $request->fb;
        $pengadaan->keterangan = $request->keterangan;
        $pengadaan->update();

        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypted_id)
    {
        
    }
}
