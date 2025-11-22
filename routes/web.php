<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HistoriesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProdukController::class, 'fetchDatas'])->middleware(['auth', 'verified', 'role:owner'])->name('dashboard');
Route::get('/main', [ProdukController::class, 'fetchDatasCust'])->middleware(['auth', 'verified', 'role:customer']);
Route::get('/add-product', function() {
    return view('addProductPage');
});

Route::get('/edit_product/{id}', [ProdukController::class, 'fetchById'])->name('edit.product');
Route::post('/update-store', [ProdukController::class, 'updateStored'])->name('update.store');
Route::get('/delete_product/{id}',[ProdukController::class, 'deleteProduct'])->name('delete.product');
Route::get('/history/{id}', [HistoriesController::class, 'historyProduct'])->name('history.product');
Route::get('/detail/{id}', [ProdukController::class, 'detailProduct'])->name('detail.product');

Route::get('/search', [ProdukController::class, 'searchProduct']);
Route::get('/history/{id}/searchPenyewa', [HistoriesController::class, 'searchPenyewa']);
Route::post('/konfirmasi/{id}', [HistoriesController::class, 'accKonfirmasi']);

Route::get('/profilUser', [ProfileController::class, 'riwayatSewa'])->middleware(['auth', 'verified', 'role:customer']);
Route::get('/searchMain', [ProdukController::class, 'searchMain']);

Route::post('/detail/addOrder', [HistoriesController::class, 'insertVerif']);
Route::get('/sewa-saya/{id}', [HistoriesController::class, 'fetchSewaSaya'])->middleware(['auth', 'verified', 'role:customer']);
Route::get('/pesanan-saya/{id}', [HistoriesController::class, 'fetchVerify']);
Route::post('/opsi', [HistoriesController::class, 'fetchOpsi']);
Route::post('/tolak/{id}', [HistoriesController::class, 'tolak']);
Route::post('/selesai/{id}', [HistoriesController::class, 'selesai']);

Route::post('/updateProfilUser', [ProfileController::class, 'updateProfilUser']);

Route::post('/stored-product', [ProdukController::class, 'insertData']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';