<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\SubKategoriAsset;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $tahun = $now->year;
        $bulan = $now->translatedFormat('F');
        $asset = Pengadaan::all();
        $pengadaan_bulan_ini = Pengadaan::whereYear('tgl_pengadaan', $now->year)->whereMonth('tgl_pengadaan', $now->month)->get();
        $nilai_asset = 0;

        foreach($asset as $item){
            $nilai_asset = $item->nilai_barang + $nilai_asset;
        }

        $nilai_per_bulan = Pengadaan::selectRaw('MONTH(tgl_pengadaan) as bulan, SUM(nilai_barang) as total_nilai')
        ->whereYear('tgl_pengadaan', $tahun)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total_nilai', 'bulan');

        //format
        $labels = [
            'Januari', 
            'Februari', 
            'Maret', 
            'April', 
            'Mei', 
            'Juni', 
            'Juli', 
            'Agustus', 
            'September', 
            'Oktober', 
            'November', 
            'Desember'];
        $data = [];

        //isi $data
        for($i = 1; $i <= 12; $i++){
            $data[] = $nilai_per_bulan->get($i, 0);
        }

        //mendapatkan kategori asset yang sesuai dengan asset yang tersedia
        $persentase_kategori = Pengadaan::selectRaw('id_sub_kategori_asset, COUNT(*) as jumlah, (COUNT(*) / (SELECT COUNT(*) FROM pengadaans)) * 100 as persentase')
        ->groupBy('id_sub_kategori_asset')
        ->get();

        $label_kategori = [];
        $data_kategori = [];
        foreach($persentase_kategori as $kat){
            $kategori = SubKategoriAsset::find($kat->id_sub_kategori_asset);
            $label_kategori[] = $kategori->sub_kategori_asset;
            
            $data_kategori[] = number_format($kat->persentase, 1);
        }

        return view('dashboard.index', compact(
            'asset', 
            'pengadaan_bulan_ini', 
            'nilai_asset', 
            'tahun',
            'bulan',
            'labels', 
            'data',
            'label_kategori',
            'data_kategori',
        ));
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
