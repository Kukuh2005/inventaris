<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\MasterBarang;
use App\Models\Depresiasi;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengadaan = Pengadaan::all()->map(function($item){
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
        
        $masterBarang = MasterBarang::all();
        $depresiasi = Depresiasi::all();
        $merk = Merk::all();
        $satuan = Satuan::all();
        $subKategoriAsset = SubKategoriAsset::all();
        $distributor = Distributor::all();

        $kode = $this->generateKode();
        
        return view('pengadaan.index', compact(
            'pengadaan',
            'masterBarang',
            'depresiasi',
            'merk',
            'satuan',
            'subKategoriAsset',
            'distributor',
            'kode'
        ));        
    }

    private function generateKode(){
        $cek = Pengadaan::count();
        $now = Carbon::now();
        $tahun_bulan = $now->year . $now->month;

        if($cek == 0){
            $nomor = 00001;
            $kode = "PIVN-" . $tahun_bulan . $nomor;
        }else{
            $data_terakhir = Pengadaan::all()->last();
            $nomor_urut = (int)substr($data_terakhir->kode_pengadaan, -5) + 1;
            $nomor_urut_padded = str_pad($nomor_urut, 5, '0', STR_PAD_LEFT);
            $kode = "PIVN-" . $tahun_bulan . $nomor_urut_padded;
        }

        return $kode;
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
        $request->validate([
            'kode_pengadaan' => 'required',
            'no_invoice' => 'required',
            'jumlah_barang' => 'required|integer|min:1',
            // validasi lainnya
        ]);

        $pengadaan = new Pengadaan;
        $pengadaan->fill($request->all());
        $pengadaan->save();

        return back()->with('sukses', 'Berhasil Tambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengadaan $pengadaan)
    {
        //
    }
}
