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
        
        return view('kategoriAsset.index', compact('kategoriAsset'));
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
        $kategoriAsset->kode_kategori_asset = $request->kode_kategori_asset;
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
