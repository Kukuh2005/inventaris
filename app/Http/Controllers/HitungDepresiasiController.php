<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use App\Models\Depresiasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class HitungDepresiasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $tahun = $now->year;
        $bulan = 0;

        $hitungDepresiasi = HitungDepresiasi::whereYear('tgl_hitung_depresiasi', $tahun)->orderBy('created_at', 'desc')->get()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        
        $pengadaan = Pengadaan::all();

        return view('hitungDepresiasi.index', compact('hitungDepresiasi', 'pengadaan', 'bulan', 'tahun'));
    }
    
    public function get_bulan($bulan_req){
        $now = Carbon::now();
        $tahun = $now->year;
        if($bulan_req < 1){
            return redirect('/' . auth()->user()->role . '/hitung-depresiasi');
        }else{
            $bulan = $bulan_req;
        }
    
        $hitungDepresiasi = HitungDepresiasi::whereYear('tgl_hitung_depresiasi', $tahun)->where('bulan', $bulan)->get()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        $pengadaan = Pengadaan::all();
    
        return view('hitungDepresiasi.index', compact('hitungDepresiasi', 'pengadaan', 'bulan', 'tahun'));        
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
        $now = Carbon::now();        
        $pengadaan = Pengadaan::where('id', $request->id_pengadaan)->first();//mendapatkan id tabel pengadaan
        $depresiasi_id = Depresiasi::findOrFail($pengadaan->id_depresiasi);

        $tanggal_pengadaan = $pengadaan->tgl_pengadaan;
        $tanggal_depresiasi = $request->tgl_hitung_depresiasi;

        //mengonversi tanngal menjadi intance Carbon
        $tanggal_pengadaan_awal = Carbon::parse($tanggal_pengadaan);
        $tanggal_depresiasi_now = Carbon::parse($tanggal_depresiasi);

        //hitung selisih bulan
        $selisih_bulan = $tanggal_pengadaan_awal->diffinMonths($tanggal_depresiasi_now);
        $durasi = floor($selisih_bulan);

        //perhitungan depresiasi
        $depresiasi = $pengadaan->nilai_barang / ($depresiasi_id->lama_depresiasi * 12);
        $nilai_depresiasi = $pengadaan->nilai_barang - ($depresiasi * $durasi);

        $hitungDepresiasi = new HitungDepresiasi;
        $hitungDepresiasi->id_pengadaan = $request->id_pengadaan;
        $hitungDepresiasi->tgl_hitung_depresiasi = $request->tgl_hitung_depresiasi;
        $hitungDepresiasi->bulan = $tanggal_depresiasi_now->month;
        $hitungDepresiasi->durasi = $durasi;
        $hitungDepresiasi->nilai_barang = $nilai_depresiasi;
        $hitungDepresiasi->save();

        return redirect('/' . auth()->user()->role . '/hitung-depresiasi' . '/' . $tanggal_depresiasi_now->month)->with('sukses', 'Berhasil Hitung Depresiasi');
    }
    
    public function keseluruhan(Request $request)
    {
        $now = Carbon::now();
        
        $pengadaan = Pengadaan::all();
        
        foreach($pengadaan as $item){
            $depresiasi_id = Depresiasi::findOrFail($item->id_depresiasi);
        
            $tanggal_pengadaan = $item->tgl_pengadaan;
            $tanggal_depresiasi = $request->tgl_hitung_depresiasi;
        
            //mengonversi tanngal menjadi intance Carbon
            $tanggal_pengadaan_awal = Carbon::parse($tanggal_pengadaan);
            $tanggal_depresiasi_now = Carbon::parse($tanggal_depresiasi);
        
            //hitung selisih bulan
            $selisih_bulan = $tanggal_pengadaan_awal->diffinMonths($tanggal_depresiasi_now);
            $durasi = floor($selisih_bulan);
        
            //perhitungan depresiasi
            $depresiasi = $item->nilai_barang / ($depresiasi_id->lama_depresiasi * 12);
            $nilai_depresiasi = $item->nilai_barang - ($depresiasi * $durasi);
            
            $hitungDepresiasi = new HitungDepresiasi;
            $hitungDepresiasi->id_pengadaan = $item->id;
            $hitungDepresiasi->tgl_hitung_depresiasi = $request->tgl_hitung_depresiasi;
            $hitungDepresiasi->bulan = $tanggal_depresiasi_now->month;
            $hitungDepresiasi->durasi = $durasi;
            $hitungDepresiasi->nilai_barang = $nilai_depresiasi;
            $hitungDepresiasi->save();
            
        }
        return redirect('/' . auth()->user()->role . '/hitung-depresiasi' . '/' . $tanggal_depresiasi_now->month)->with('sukses', 'Berhasil Hitung Depresiasi Keseluruhan');
    }

    /**
     * Display the specified resource.
     */
    public function show(HitungDepresiasi $hitungDepresiasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HitungDepresiasi $hitungDepresiasi)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $encryted_id)
    {
        $now = Carbon::now();
        $pengadaan = Pengadaan::where('id', $request->id_pengadaan)->first();//mendapatkan id tabel pengadaan
        $depresiasi_id = Depresiasi::findOrFail($pengadaan->id_depresiasi);

        $tanggal_pengadaan = $pengadaan->tgl_pengadaan;
        $tanggal_depresiasi = $request->tgl_hitung_depresiasi;

        //mengonversi tanngal menjadi intance Carbon
        $tanggal_pengadaan_awal = Carbon::parse($tanggal_pengadaan);
        $tanggal_depresiasi_now = Carbon::parse($tanggal_depresiasi);

        //hitung selisih bulan
        $selisih_bulan = $tanggal_pengadaan_awal->diffinMonths($tanggal_depresiasi_now);
        $durasi = floor($selisih_bulan);

        //perhitungan depresiasi
        $depresiasi = $pengadaan->nilai_barang / ($depresiasi_id->lama_depresiasi * 12);
        $nilai_depresiasi = $pengadaan->nilai_barang - ($depresiasi * $durasi);

        $id = Crypt::decryptString($encryted_id);
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $hitungDepresiasi->id_pengadaan = $request->id_pengadaan;
        $hitungDepresiasi->tgl_hitung_depresiasi = $request->tgl_hitung_depresiasi;
        $hitungDepresiasi->bulan = $tanggal_depresiasi_now->month;
        $hitungDepresiasi->durasi = $durasi;
        $hitungDepresiasi->nilai_barang = $nilai_depresiasi;
        $hitungDepresiasi->save();

        return redirect('/' . auth()->user()->role . '/hitung-depresiasi' . '/' . $tanggal_depresiasi_now->month)->with('sukses', 'Berhasil Hitung Depresiasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($encryted_id)
    {
        
    }
}
