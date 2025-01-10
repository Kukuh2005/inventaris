<?php

namespace App\Http\Controllers;

use App\Models\MutasiLokasi;
use App\Models\Pengadaan;
use App\Models\Lokasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MutasiLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mutasi_lokasi = MutasiLokasi::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        $pengadaan = Pengadaan::all();
        $lokasi = Lokasi::all();

        return view('mutasiLokasi.index', compact('mutasi_lokasi', 'pengadaan', 'lokasi'));
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
        $mutasi_lokasi = new MutasiLokasi;
        $mutasi_lokasi->id_pengadaan = $request->id_pengadaan;
        $mutasi_lokasi->id_lokasi = $request->id_lokasi;
        $mutasi_lokasi->tgl_mutasi = $request->tgl_mutasi;
        $mutasi_lokasi->flag_lokasi = $request->flag_lokasi;
        $mutasi_lokasi->flag_pindah = $request->flag_pindah;
        $mutasi_lokasi->save();
        
        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(MutasiLokasi $mutasiLokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MutasiLokasi $mutasiLokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $mutasi_lokasi = MutasiLokasi::findOrFail($id);
        $mutasi_lokasi->id_pengadaan = $request->id_pengadaan;
        $mutasi_lokasi->id_lokasi = $request->id_lokasi;
        $mutasi_lokasi->tgl_mutasi = $request->tgl_mutasi;
        $mutasi_lokasi->flag_lokasi = $request->flag_lokasi;
        $mutasi_lokasi->flag_pindah = $request->flag_pindah;
        $mutasi_lokasi->update();        

        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

    }
}
