<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});



Route::group(['middleware' => ['auth', 'Ceklevel:admin,user']], function (){
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::group(['middleware' => ['auth', 'Ceklevel:admin']], function (){
    // pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/tambahPegawai', [PegawaiController::class, 'add'])->name('tambahPegawai');
    Route::post('/addPegawai', [PegawaiController::class, 'prosesPegawai'])->name('addPegawai');
    Route::get('/editPegawai/{id}', [PegawaiController::class, 'edit'])->name('editPegawai');
    Route::post('/editData/{id}', [PegawaiController::class, 'editProses'])->name('editData');
    Route::get('/delete/{id}', [PegawaiController::class, 'delete'])->name('delete');
    // kendaraan
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');
    Route::get('/tambahKendaraan', [KendaraanController::class, 'add'])->name('tambahKendaraan');
    Route::post('/addKendaraan', [KendaraanController::class, 'prosesKendaraan'])->name('addKendaraan');
    Route::get('/editKendaraan/{id}', [KendaraanController::class, 'edit'])->name('editKendaraan');
    Route::post('/editKendaraan/{id}', [KendaraanController::class, 'editProses'])->name('editKendaraan');
    Route::get('/deleteKendaraan/{id}', [KendaraanController::class, 'delete'])->name('deleteKendaraan');
    // Servis
    Route::get('servisAdmin',[ServisController::class, 'indexAdmin'])->name('servisAdmin');
    Route::get('rekapServis', [ServisController::class, 'cetakRekap'])->name('rekapServis');
    Route::get('cetakServis/{tglawal}/{tglakhir}', [ServisController::class, 'cetakServis'])->name('cetakServis');

    //Pinjam
    Route::get('pinjamAdmin', [PinjamController::class, 'indexAdmin'])->name('pinjamAdmin');
    Route::get('rekapPinjam', [PinjamController::class, 'cetakRekap'])->name('rekapPinjam');
    Route::get('cetakPinjam/{tglawal}/{tglakhir}', [PinjamController::class, 'cetakPinjam'])->name('cetakPinjam');
    // profile
    Route::get('profile', [UserController::class, 'index'])->name('profile');
    Route::post('/editProfile/{id}', [UserController::class, 'editProses'])->name('editProfile');
});
Route::group(['middleware' => ['auth', 'Ceklevel:user']], function (){
        // servis
        Route::get('servis',[ServisController::class, 'index'])->name('servis');
        Route::get('tambahServis',[ServisController::class, 'add'])->name('tambahServis');
        Route::post('/addServis', [ServisController::class, 'prosesServis'])->name('addServis');
        Route::get('nota/{id}', [ServisController::class, 'nota'])->name('nota');
        Route::get('/editServis/{id}', [ServisController::class, 'edit'])->name('editServis');
        Route::post('/editServis/{id}', [ServisController::class, 'editProses'])->name('editServis');
        Route::get('/deleteServis/{id}', [ServisController::class, 'delete'])->name('deleteServis');
        // pinjam
        Route::get('pinjam', [PinjamController::class, 'index'])->name('pinjam');
        Route::get('tambahPinjam',[PinjamController::class, 'add'])->name('tambahPinjam');
        Route::post('/addPinjam', [PinjamController::class, 'prosesPinjam'])->name('addPinjam');
        Route::get('/editPinjam/{id}', [PinjamController::class, 'edit'])->name('editPinjam');
        Route::post('/editPinjam/{id}', [PinjamController::class, 'editProses'])->name('editPinjam');
        Route::get('/deletePinjam/{id}', [PinjamController::class, 'delete'])->name('deletePinjam');
 });
require __DIR__.'/auth.php';
