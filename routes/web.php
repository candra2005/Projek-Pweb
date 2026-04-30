<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\ProfileController;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [HomeController::class, 'kirimKontak'])->name('kontak.kirim');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{produk}', [ProdukController::class, 'show'])->name('produk.show');

// Halaman Admin (Hanya untuk pengguna login)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/produk', AdminProdukController::class)->names('admin.produk');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
