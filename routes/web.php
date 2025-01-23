<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kasir', [KasirController::class, 'index']);
Route::post('/kasir', [KasirController::class, 'store']);
Route::get('/kasir/items', [KasirController::class, 'show']);
Route::get('/kasir/{id}/edit', [KasirController::class, 'edit']);
Route::put('/kasir/{id}', [KasirController::class, 'update']);
Route::delete('/kasir/{id}', [KasirController::class, 'destroy']);
Route::get('/kasir/report', [KasirController::class, 'report']);

Route::get('/pembelian', [KasirController::class, 'purchaseIndex']);
Route::post('/pembelian', [KasirController::class, 'purchaseStore']);
Route::get('/pembelian/report', [KasirController::class, 'purchaseReport']);
