<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/create', [PasienController::class, 'create'])->name('pasien.create');
Route::post('/store', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/{pasien}', [PasienController::class, 'show'])->name('pasien.show');
Route::get('/{pasien}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/{pasien}', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('/{pasien}', [PasienController::class, 'destroy'])->name('pasien.destroy');
Route::get('/pasien_umur', [PasienController::class, 'indexSortedByUmur'])->name('pasien.umur');

