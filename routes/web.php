<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LoginSiswaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MidtransController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pendaftaran', [PendaftaranController::class, 'showForm'])->name('pendaftaran.form');
Route::post('/pendaftaran', [PendaftaranController::class, 'submitForm'])->name('pendaftaran.submit');

// Tampilkan form login
Route::get('/login_siswa', [LoginSiswaController::class, 'showLoginForm'])->name('login.siswa');

// Proses login
Route::post('/login_siswa', [LoginSiswaController::class, 'login'])->name('login.siswa.submit');

// Logout 
Route::post('/logout_siswa', [LoginSiswaController::class, 'logout'])->name('logout.siswa');


Route::middleware(['auth.siswa'])->group(function () {
    Route::get('/siswa/profil', [SiswaController::class, 'profil'])->name('siswa.profil');
    Route::get('/logout', [SiswaController::class, 'logout'])->name('logout');
   Route::post('/update-status-terbayar', [SiswaController::class, 'updateStatusTerbayar'])
    ->name('status.terbayar');
});

Route::post('/midtrans/token', [MidtransController::class, 'getSnapToken'])->name('midtrans.token');
