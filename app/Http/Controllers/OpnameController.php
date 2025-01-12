<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Pengadaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opname = Opname::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        $pengadaan = Pengadaan::all();

        return view('opname.index', compact('opname', 'pengadaan'));
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
        $opname = new Opname;
        $opname->id_pengadaan = $request->id_pengadaan;
        $opname->tgl_opname = $request->tgl_opname;
        $opname->kondisi = $request->kondisi;
        $opname->keterangan = $request->keterangan;
        $opname->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Opname $opname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opname $opname)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);
        
        $opname = Opname::findOrFail($id);
        $opname->id_pengadaan = $request->id_pengadaan;
        $opname->tgl_opname = $request->tgl_opname;
        $opname->kondisi = $request->kondisi;
        $opname->keterangan = $request->keterangan;
        $opname->update();
    
        return back()->with('sukses', 'Berhasil Edit Data');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypted_id)
    {
        
    }
}
