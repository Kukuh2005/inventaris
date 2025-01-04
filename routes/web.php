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


Route::get('/', [AuthenticatedSessionController::class, 'create']);
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
