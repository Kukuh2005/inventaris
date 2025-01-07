<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Depresiasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DepresiasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depresiasi = Depresiasi::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });

        return view('depresiasi.index', compact('depresiasi'));
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
        $depresiasi = new Depresiasi;

        $depresiasi->fill($request->all());
        $depresiasi->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distributor $distributor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $depresiasi = Depresiasi::findOrFail($id)->update($request->all());

        return back()->with('sukses', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $depresiasi = Depresiasi::findOrFail($id)->delete();

        return back()->with('sukses', 'Berhasil Hapus Data');
    }
}
