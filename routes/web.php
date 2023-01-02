<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/sidebar', function () {
    return view('sidebar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Anggota
Route::get('anggota', [AnggotaController::class, 'index'])->name('anggota');
Route::get('tambahAnggota', [AnggotaController::class, 'create'])->name('tambahAnggota');
Route::post('anggotaStore', [AnggotaController::class, 'store'])->name('anggotaStore');
Route::get('anggotaView', [AnggotaController::class, 'show'])->name('anggotaView');

//Pemasukan
Route::get('pemasukan', [PemasukanController::class, 'index'])->name('anggota');
Route::get('tambahPemasukan', [PemasukanController::class, 'create'])->name('tambahAnggota');
Route::post('pemasukanStore/{pemasukan}', [PemasukanController::class, 'store'])->name('anggotaStore');
Route::get('pemasukanView', [PemasukanController::class, 'show'])->name('anggotaView');

//Pengeluaran
Route::get('pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
Route::get('tambahPengeluaran', [PengeluaranController::class, 'create'])->name('tambahPengeluaran');
Route::post('pengeluaranStore/{pengeluaran}', [PengeluaranController::class, 'store'])->name('pengeluaranStore');
Route::get('pengeluaranView', [PengeluaranController::class, 'show'])->name('pengeluaranView');

require __DIR__ . '/auth.php';
