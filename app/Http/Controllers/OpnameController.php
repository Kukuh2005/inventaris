<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Pengadaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $tahun_sekarang = $now->year;
        $bulan = $now->month;

        $opname = Opname::orderBy('tgl_opname', 'desc')
        ->get()
        ->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });        
        $pengadaan = Pengadaan::select('id_master_barang')
        ->distinct()
        ->with('masterBarang')
        ->get();

        $tahun = Pengadaan::select(DB::raw('YEAR(tgl_pengadaan) as tahun'))
        ->distinct()
        ->orderBy('tahun', 'asc')
        ->pluck('tahun');

        return view('opname.index', compact('opname', 'pengadaan', 'tahun', 'tahun_sekarang', 'bulan'));
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
        $opname->jumlah = $request->jumlah;
        $opname->tgl_opname = $request->tgl_opname;
        $opname->kondisi = $request->kondisi;
        $opname->keterangan = $request->keterangan;
        $opname->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    public function printBulan($tahun, $bulan)
    {
        $opname = Opname::whereYear('tgl_opname', $tahun)->whereMonth('tgl_opname', $bulan)->get();
        // dd($opname);
        if($opname->count() == 0){
            return abort(403, 'Data Kosong');
        }

        $pdf = Pdf::loadView('opname.printBulan', compact('opname'));
        return $pdf->stream();
    }

    public function printOpname($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $opname = Opname::findOrFail($id);

        $pdf = Pdf::loadView('opname.print', compact('opname'));
        return $pdf->stream();
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
        $opname->jumlah = $request->jumlah;
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
