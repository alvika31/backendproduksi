<?php

use App\Http\Controllers\BarangMentahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestBarangJadiController;
use App\Http\Controllers\JenisBarangJadiController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\WarnaBarangJadiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'asasd';
});

route::get('produksi/sudahproduksi', [ProduksiController::class, 'sudahproduksi']);

Route::resource('requestbarangjadi', RequestBarangJadiController::class);
Route::resource('jenisbarang', JenisBarangJadiController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update', 'show']);
Route::resource('warnabarang', WarnaBarangJadiController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update', 'show']);
Route::resource('barangmentah', BarangMentahController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update', 'show']);
Route::resource('produksi', ProduksiController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update', 'show']);

route::get('produksi/addproduksi/{produksi}', [ProduksiController::class, 'addproduksi']);

route::put('produksi/updatestatusproduksi/{produksi}', [ProduksiController::class, 'updatestatusproduksi']);
