<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\KategoriAssetController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\pimpinanMiddleware;
use App\Http\Middleware\stafMiddleware;


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
