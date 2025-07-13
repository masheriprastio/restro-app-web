<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
// Routing CRUD Menu
Route::resource('menu', MenuController::class);




Route::get('/meja', MejaController::class, 'index'])->name('meja.index');
Route::get('/meja/create', [MejaController::class, 'create'])->name('meja.create');
Route::post('/meja', [MejaController::class, 'store'])->name('meja.store');
Route::get('/meja/{id}/edit', [MejaController::class, 'edit'])->name('meja.edit');
Route::put('/meja/{id}', [MejaController::class, 'update'])->name('meja.update');
Route::delete('/meja/{id}', [MejaController::class, 'destroy'])->name('meja.destroy');



Route::resource('pesanan', PesananController::class);
