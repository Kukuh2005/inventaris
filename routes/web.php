<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\pimpinanMiddleware;
use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\stafMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\KategoriAssetController;
use App\Http\Controllers\SubKategoriAssetController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\DepresiasiController;
use App\Http\Controllers\MutasiLokasiController;
use App\Http\Controllers\HitungDepresiasiController;


Route::get('/', [AuthenticatedSessionController::class, 'landing']);
Route::get('/login', [AuthenticatedSessionController::class, 'create']);
Route::get('/logout', [AuthenticatedSessionController::class, 'logout']);
Route::post('/postlogin', [AuthenticatedSessionController::class, 'postlogin']);
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register/store', [RegisteredUserController::class, 'store']);

Route::middleware(['auth', 'adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::get('/admin/master-barang', [MasterBarangController::class, 'index']);
    Route::post('/admin/master-barang/store', [MasterBarangController::class, 'store']);
    Route::put('/admin/master-barang/{encrypted_id}/update', [MasterBarangController::class, 'update']);
    Route::get('/admin/master-barang/{encrypted_id}/delete', [MasterBarangController::class, 'destroy']);

    Route::get('/admin/kategori-asset', [KategoriAssetController::class, 'index']);
    Route::post('/admin/kategori-asset/store', [KategoriAssetController::class, 'store']);
    Route::put('/admin/kategori-asset/{encrypted_id}/update', [KategoriAssetController::class, 'update']);
    Route::get('/admin/kategori-asset/{encrypted_id}/delete', [KategoriAssetController::class, 'destroy']);

    Route::get('/admin/subkategori-asset', [SubKategoriAssetController::class, 'index']);
    Route::post('/admin/subkategori-asset/store', [SubKategoriAssetController::class, 'store']);
    Route::put('/admin/subkategori-asset/{encrypted_id}/update', [SubKategoriAssetController::class, 'update']);
    Route::get('/admin/subkategori-asset/{encrypted_id}/delete', [SubKategoriAssetController::class, 'destroy']);

    Route::get('/admin/merk', [MerkController::class, 'index']);
    Route::post('/admin/merk/store', [MerkController::class, 'store']);
    Route::put('/admin/merk/{encrypted_id}/update', [MerkController::class, 'update']);
    Route::get('/admin/merk/{encrypted_id}/delete', [MerkController::class, 'destroy']);

    Route::get('/admin/satuan', [SatuanController::class, 'index']);
    Route::post('/admin/satuan/store', [SatuanController::class, 'store']);
    Route::put('/admin/satuan/{encrypted_id}/update', [SatuanController::class, 'update']);
    Route::get('/admin/satuan/{encrypted_id}/delete', [SatuanController::class, 'destroy']);

    Route::get('/admin/lokasi', [LokasiController::class, 'index']);
    Route::post('/admin/lokasi/store', [LokasiController::class, 'store']);
    Route::put('/admin/lokasi/{encrypted_id}/update', [LokasiController::class, 'update']);
    Route::get('/admin/lokasi/{encrypted_id}/delete', [LokasiController::class, 'destroy']);

    Route::get('/admin/distributor', [DistributorController::class, 'index']);
    Route::post('/admin/distributor/store', [DistributorController::class, 'store']);
    Route::put('/admin/distributor/{encrypted_id}/update', [DistributorController::class, 'update']);
    Route::get('/admin/distributor/{encrypted_id}/delete', [DistributorController::class, 'destroy']);

    Route::get('/admin/pengadaan', [PengadaanController::class, 'index']);
    Route::post('/admin/pengadaan/store', [PengadaanController::class, 'store']);
    Route::put('/admin/pengadaan/{encrypted_id}/update', [PengadaanController::class, 'update']);
    Route::get('/admin/pengadaan/{encrypted_id}/delete', [PengadaanController::class, 'destroy']);

    Route::get('/admin/depresiasi', [DepresiasiController::class, 'index']);
    Route::post('/admin/depresiasi/store', [DepresiasiController::class, 'store']);
    Route::put('/admin/depresiasi/{encrypted_id}/update', [DepresiasiController::class, 'update']);
    Route::get('/admin/depresiasi/{encrypted_id}/delete', [DepresiasiController::class, 'destroy']);

    Route::get('/admin/mutasi-lokasi', [MutasiLokasiController::class, 'index']);
    Route::post('/admin/mutasi-lokasi/store', [MutasiLokasiController::class, 'store']);
    Route::put('/admin/mutasi-lokasi/{encrypted_id}/update', [MutasiLokasiController::class, 'update']);
    
    Route::get('/admin/hitung-depresiasi', [HitungDepresiasiController::class, 'index']);
    Route::get('/admin/hitung-depresiasi/{bulan_req}', [HitungDepresiasiController::class, 'get_bulan']);
    Route::post('/admin/hitung-depresiasi/store', [HitungDepresiasiController::class, 'store']);
    Route::post('/admin/hitung-depresiasi/all', [HitungDepresiasiController::class, 'keseluruhan']);
    Route::put('/admin/hitung-depresiasi/{encrypted_id}/update', [HitungDepresiasiController::class, 'update']);
    Route::get('/admin/hitung-depresiasi/{encrypted_id}/delete', [HitungDepresiasiController::class, 'destroy']);
});












// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
