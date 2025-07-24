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
    Route::get('/kelola-profile', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
    Route::post('/daftar/{id}', [PendaftarController::class, 'store'])->name('pendaftar.store');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');
    Route::resource('berita', BeritaController::class);
    Route::resource('pendaftar', PendaftarController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::resource('distribusi', DistribusiController::class);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/data', [LaporanController::class, 'laporan'])->name('laporan.data');
});

Route::group(['prefix' => 'kepala-dinas', 'middleware' => ['auth', 'kepala-dinas'], 'as' => 'kepala-dinas.'], function () {
    Route::get('/dashboard', [HomeController::class, 'kepaladinas'])->name('dashboard');
    Route::resource('pendaftar', PendaftarController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/data', [LaporanController::class, 'laporan'])->name('laporan.data');
});