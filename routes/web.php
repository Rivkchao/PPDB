<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\LoginSiswaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GelombangController;

Route::get('/', function () {return view('welcome');})->name('welcome');

Route::get('/login_choice', function () { return view('choice');})->name('choice');

// Tampilan form pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'showForm'])->name('pendaftaran.form');
Route::post('/pendaftaran', [PendaftaranController::class, 'submitForm'])->name('pendaftaran.submit');

// Tampilan form login
Route::get('/login_siswa', [LoginSiswaController::class, 'showLoginForm'])->name('siswa.login.siswa');

// Proses login Siswa
Route::post('/login_siswa', [LoginSiswaController::class, 'login'])->name('siswa.login.siswa.submit');

// Logout Siswa 
Route::post('/logout_siswa', [LoginSiswaController::class, 'logout'])->name('logout.siswa');

// Berita Company Profile
Route::get('/berita', [BeritaController::class, 'index'])->name('beritaglobal');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('beritaglobalshow');

// Profil Siswa (hanya untuk siswa yang sudah login)
Route::middleware(['auth.siswa'])->group(function () {
    Route::get('/siswa/profil', [SiswaController::class, 'profil'])->name('siswa.profil');
    Route::get('/siswa/revisi', [SiswaController::class, 'revisi'])->name('siswa.revisi_siswa');
    Route::put('/siswa/update_data', [SiswaController::class, 'updateData'])->name('siswa.update_data');
    Route::get('/siswa/edit/{nisn}', [SiswaController::class, 'edit'])->name('siswa.edit');
});

// Admin Login Routes
Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.submit');

// Midtrans Payment
Route::post('/midtrans/token', [MidtransController::class, 'getSnapToken'])->name('midtrans.token');
Route::post('/midtrans/update-status', [MidtransController::class, 'updateStatusTerbayar'])->name('midtrans.updateStatusTerbayar');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard_admin');
    Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.berita');
    Route::post('/admin/berita', [AdminController::class, 'simpanBerita'])->name('admin.berita.simpan');
    Route::delete('/admin/berita/{id}', [AdminController::class, 'deleteBerita'])->name('admin.berita.delete');
    Route::put('/admin/verifikasi/{nisn}', [AdminController::class, 'verifikasiPendaftar'])->name('admin.verifikasi.update');
    Route::get('/admin/pendaftar/{nisn}', [AdminController::class, 'detailPendaftar'])->name('admin.pendaftar.detail');
    Route::get('/gelombang', [GelombangController::class, 'index'])->name('admin.gelombang.index');
    Route::post('/gelombang', [GelombangController::class, 'store'])->name('admin.gelombang.store');
    Route::get('/gelombang/{gelombang}/edit', [GelombangController::class, 'edit'])->name('admin.gelombang.edit');
    Route::put('/gelombang/{gelombang}', [GelombangController::class, 'update'])->name('admin.gelombang.update');
    Route::delete('/gelombang/{gelombang}', [GelombangController::class, 'destroy'])->name('admin.gelombang.destroy');
});

