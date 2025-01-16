<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });

        $kode = $this->generateKode();

        return view('lokasi.index', compact('lokasi', 'kode'));
    }

    private function generateKode(){
        $cek = Lokasi::count();

        if($cek == 0){
            $nomor = "001";
            $kode = "LO" . $nomor;
        }else{
            $data_terakhir = Lokasi::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_lokasi, -3) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
            $kode = "LO" . $nomor_urut_padded;
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
        $lokasi = new Lokasi;
        $lokasi->kode_lokasi = $this->generateKode();
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->keterangan = $request->keterangan;
        $lokasi->save();
        
        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);
        
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->nama_lokasi = $request->nama_lokasi;
        $lokasi->keterangan = $request->keterangan;
        $lokasi->update();

        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $lokasi = Lokasi::findOrFail($id);

        $lokasi->delete();

        return back()->with('sukses', 'Berhasil Hapus Data');
    }
}
