<?php

use App\Http\Controllers\ProdukBukuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//routing data_produk dan kategori
Route::get('/data_produk/test', [ProdukBukuController::class, 'test'])->name('data_produk.test');
Route::resource('data_produk', ProdukBukuController::class);
// Route::resource('kategori_produk', KategoriBukuController::class);

require __DIR__ . '/auth.php';
