<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\KepalaDinasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PenerimaController;

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

// Hal Masyarakat tanpa login
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
Route::get('/login', [LoginController::class, 'loginUser'])->name('loginUser');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/penerima-bansos', [HomeController::class, 'penerimaBansos'])->name('penerimaBansos');
Route::get('/berita', [BeritaController::class, 'beritaUser'])->name('user.berita');

Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function () {
    Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
    Route::post('/daftar/{id}', [PendaftarController::class, 'store'])->name('pendaftar.store');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');

    Route::resource('berita', BeritaController::class);
    Route::resource('pendaftar', PendaftarController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::resource('distribusi', DistribusiController::class);

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('index');
    Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');
});

// Kepala Dinas
// Dashboard Kepala Dinas
Route::get('/kepala-dinas/dashboard', [KepalaDinasController::class, 'kepalaDinas'])->name('kepala-dinas.dashboard');
// Data Penerima Bantuan
Route::get('/kepala-dinas/penerima', [KepalaDinasController::class, 'kepalaDinasPenerimaView'])->name('kepala-dinas.penerima');
// Data Pendaftar (Monitoring)
Route::get('/kepala-dinas/pendaftar', [KepalaDinasController::class, 'kepalaPendaftar'])->name('kepala-dinas.pendaftar');
// Laporan
Route::get('/kepala-dinas/laporan', [KepalaDinasController::class, 'kepalaDinasLaporan'])->name('kepala-dinas.laporan');

Route::get('/kepala-dinas/penerima', [KepalaDinasController::class, 'kepalaDinasPenerima'])->name('kepala-dinas.penerima');




Route::middleware(['auth'])->group(function () {
    Route::get('/kelola-profile', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
});
