<?php

use App\Http\Controllers\pelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pelanggan/create', [pelangganController::class, 'create'])->name('pelanggan.create');
Route::post('pelanggan', [pelangganController::class, 'store'])->name('pelanggan.store');
Route::resource('/pelanggan', pelangganController::class);


