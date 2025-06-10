<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UploadBerkasController;

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
    return view('landing-page');
});

Route::get('/pendaftaran', function () {
    return view('register');
});

Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/pendaftaran/sukses/{nomor}', [PendaftaranController::class, 'sukses'])->name('pendaftaran.sukses');

Route::get('/pendaftaran/{nomor_registrasi}', [PendaftaranController::class, 'generatePdf'])->name('pendaftaran.pdf');

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/logout', [AdminController::class, 'logout']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/calon-siswa', [AdminController::class, 'showCalonSiswa'])->middleware('auth')->name('calon-siswa');

Route::post('/calon/update/{id}', [AdminController::class, 'updateBioSiswa'])->name('calon.update');

Route::delete('/calon/{id}', [AdminController::class, 'destroy'])->name('calon.destroy');

Route::get('/berkas', [UploadBerkasController::class, 'index'])->middleware('auth')->name('berkas');

Route::put('/admin/update-berkas-nilai/{id}', [UploadBerkasController::class, 'update'])->name('update.berkas.nilai');

Route::get('/cetak-bukti/{id}', [UploadBerkasController::class, 'cetakPDF'])->name('upload_berkas.cetak');
