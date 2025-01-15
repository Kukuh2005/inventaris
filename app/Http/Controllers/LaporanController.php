<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\MasterBarang;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        $tahun = Pengadaan::select(DB::raw('YEAR(tgl_pengadaan) as tahun'))
        ->distinct()
        ->orderBy('tahun', 'asc')
        ->pluck('tahun');

        $masterBarang = MasterBarang::all();
        $now = Carbon::now();
        $tahun_sekarang = $now->year;
        $bulan = $now->month;

        return view('laporan.index', compact('pengadaan', 'masterBarang', 'bulan', 'tahun', 'tahun_sekarang'));
    }

    public function printPengadaan($encrypted_id)
    {
        $id = Crypt::decryptString($encrypted_id);

        $pengadaan = Pengadaan::findOrFail($id);

        $pdf = Pdf::loadView('laporan.print', compact('pengadaan'));
        return $pdf->stream();
    }

    public function printBulan($tahun, $bulan)
    {
        $pengadaan = Pengadaan::whereYear('tgl_pengadaan', $tahun)->whereMonth('tgl_pengadaan', $bulan)->get();
        // dd($pengadaan);
        if($pengadaan->count() == 0){
            return abort(403, 'Data Kososng');
        }

        $pdf = Pdf::loadView('laporan.printBulan', compact('pengadaan'));
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
