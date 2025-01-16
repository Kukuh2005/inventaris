<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masterBarang = MasterBarang::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        $kode = $this->generateKode();
        return view('masterBarang.index', compact('masterBarang', 'kode'));
    }

    private function generateKode(){
        $cek = MasterBarang::count();

        if($cek == 0){
            $nomor = "001";
            $kode = "BRG" . $nomor;
        }else{
            $data_terakhir = MasterBarang::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_barang, -3) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
            $kode = "BRG" . $nomor_urut_padded;
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
        $masterBarang = new MasterBarang;
        $masterBarang->kode_barang = $this->generateKode();
        $masterBarang->nama_barang = $request->nama;
        $masterBarang->spesifikasi_teknis = $request->spesifikasi_teknis;
        $masterBarang->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(MasterBarang $masterBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterBarang $masterBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);
        $masterBarang = MasterBarang::findOrFail($id);
        $masterBarang->nama_barang = $request->nama_barang;
        $masterBarang->spesifikasi_teknis = $request->spesifikasi_teknis;
        $masterBarang->update();
    
        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $masterBarang = MasterBarang::findOrFail($id);
        $masterBarang->delete();

        return back()->with('sukses', 'Berhasil Hapus Data');
    }
}
