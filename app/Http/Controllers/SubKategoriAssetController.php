<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SubkategoriAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subkategoriAsset = SubKategoriAsset::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        $kategoriAsset = KategoriAsset::all();

        return view('subkategoriAsset.index', compact('subkategoriAsset', 'kategoriAsset'));
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
        $subkategoriAsset = new SubKategoriAsset;
        $subkategoriAsset->id_kategori_asset = $request->id_kategori_asset;
        $subkategoriAsset->kode_sub_kategori_Asset = $request->kode_sub_kategori_asset;
        $subkategoriAsset->sub_kategori_asset = $request->sub_kategori_asset;
        $subkategoriAsset->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(SubkategoriAsset $subkategoriAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubkategoriAsset $subkategoriAsset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $subkategoriAsset = SubKategoriAsset::findOrFail($id);

        $subkategoriAsset->id_kategori_asset = $request->id_kategori_asset;
        $subkategoriAsset->sub_kategori_asset = $request->sub_kategori_asset;
        $subkategoriAsset->update();
    
        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $subkategoriAsset = SubKategoriAsset::findOrFail($id);

        $subkategoriAsset->delete();

        return back()->with('sukses', 'Berhasil Hapus Data');
    }
}
