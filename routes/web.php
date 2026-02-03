<?php

use App\Http\Controllers\ProdukBukuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as DashboardAdmin;
use App\Http\Controllers\AuthorBukuController;
use Illuminate\Support\Facades\Route;

// Halaman Guest
Route::get('/', function () {
    return view('dashboard');
})->name('home');

//Untuk Produk
Route::get('/produk_buku',  [ProdukBukuController::class, 'index'])->name('produk_buku.index');
Route::middleware('auth')->group(function () {
    // Jika guest ingin baca buku
    Route::get('/produk_buku/{buku:slug}',  [ProdukBukuController::class, 'show'])->name('produk_buku.show');

    // Vote Author dan Buku Favorit kalian
    Route::get('/vote_author', [AuthorBukuController::class, 'index'])->name('vote_author');
});

// Untuk Admin
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('/dashboard/', DashboardAdmin::class);
        Route::get('/tambah_buku', [ProdukBukuController::class, 'create'])->name('produk_buku.create');
    });

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
