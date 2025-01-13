<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\MasterBarang;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengadaan = Pengadaan::orderBy('tgl_pengadaan', 'desc')->get()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        $masterBarang = MasterBarang::all();

        return view('laporan.index', compact('pengadaan', 'masterBarang'));
    }

    public function printPengadaan($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $pengadaan = Pengadaan::findOrFail($id);

        $pdf = Pdf::loadView('laporan.print', compact('pengadaan'));
        return $pdf->stream();
    }

    public function printBarang($id_barang)
    {
        $pengadaan = Pengadaan::where('id_master_barang', $id_barang)->get();

        $pdf = Pdf::loadView('laporan.printBarang', compact('pengadaan'));
        return $pdf->stream();
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
