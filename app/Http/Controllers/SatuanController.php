<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan = Satuan::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });

        return view('satuan.index', compact('satuan'));
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
        $satuan = new Satuan;
        $satuan->satuan = $request->satuan;
        $satuan->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $satuan = Satuan::findOrFail($id);
        $satuan->satuan = $request->satuan;
        $satuan->update();

        return back()->with('sukses', 'Berhasil Edit Data');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);
    
        $satuan = Satuan::findOrFail($id);

        $satuan->delete();
    
        return back()->with('sukses', 'Berhasil Hapus Data');
        //
    }
}
