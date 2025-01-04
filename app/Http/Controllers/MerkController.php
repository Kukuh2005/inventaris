<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merk = Merk::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });

        return view('merk.index', compact('merk'));
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
        $merk = new Merk;
        $merk->merk = $request->merk;
        $merk->keterangan = $request->keterangan;
        $merk->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merk $merk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merk $merk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypt_id)
    {
        $id = Crypt::decryptString($encrypt_id);

        $merk = Merk::findOrFail($id);
        $merk->merk = $request->merk;
        $merk->keterangan = $request->keterangan;
        $merk->update();

        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypt_id)
    {
        $id = Crypt::decryptString($encrypt_id);

        $merk = Merk::findorFail($id);

        $merk->delete();

        return back()->with('sukses', 'Berhasil Hapus Data');
    }
}
