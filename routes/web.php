<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

Route::resource('pembayaran', PembayaranController::class);

Route::resource('barang', BarangController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// untuk login
Route::middleware(['guest'])->group(function (){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function() {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/kasir', [AdminController::class, 'kasir'])->middleware('userAkses:kasir');
    Route::get('/admin/owner', [AdminController::class, 'owner'])->middleware('userAkses:owner');
});

Route::get('/logout', [SesiController::class, 'logout']);