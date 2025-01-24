<?php

namespace App\Http\Controllers;

use App\Models\KategoriAsset;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KategoriAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriAsset = KategoriAsset::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });

        $kode = $this->generateKode();
        
        return view('kategoriAsset.index', compact('kategoriAsset', 'kode'));
    }

    private function generateKode(){
        $cek = KategoriAsset::count();

        if($cek == 0){
            $nomor = "001";
            $kode = "KA" . $nomor;
        }else{
            $data_terakhir = KategoriAsset::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_kategori_asset, -3) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
            $kode = "KA" . $nomor_urut_padded;
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
        $kategoriAsset = new KategoriAsset;
        $kategoriAsset->kode_kategori_asset = $this->generateKode();
        $kategoriAsset->kategori_asset  = $request->kategori_asset;
        $kategoriAsset->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriAsset $kategoriAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriAsset $kategoriAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $kategoriAsset = KategoriAsset::findOrFail($id);

        $kategoriAsset->kategori_asset = $request->kategori_asset;
        $kategoriAsset->update();

        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $kategoriAsset = KategoriAsset::findOrFail($id);
        $kategoriAsset->delete();

        return back()->with('sukses', 'Berhasil Hapus Data');
    }
}
