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

// Halaman Berita untuk User
Route::get('/berita', [BeritaController::class, 'beritaUser'])->name('user.berita');


// Route user wajib login
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'redirectIfAdmin'], 'as' => 'user.'], function () {
    Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
    Route::post('/daftar', [UserController::class, 'create_post'])->name('daftarUser');
});

// Route Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');

    Route::get('/data-pendaftar', [UserController::class, 'index'])->name('pendaftar');
    Route::get('/data-penerima', [HomeController::class, 'penerima'])->name('penerima');

    // Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/berita/create', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}/edit', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}/edit', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Pengguna
    Route::delete('/hapus-user/{id}', [UserController::class, 'hapus_user'])->name('hapusUser');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('editUser');
    Route::post('/edit-user/{id}', [UserController::class, 'edit_post'])->name('editUserPost');

    // Distribusi
    Route::get('/distribusi', [DistribusiController::class, 'distribusi'])->name('distribusi');
    Route::get('/distribusi/create', [DistribusiController::class, 'create'])->name('createDistribusi');
    Route::post('/distribusi', [DistribusiController::class, 'store'])->name('distribusiStore');
    Route::get('/distribusi/{id}/edit', [DistribusiController::class, 'edit'])->name('editDistribusi');
    Route::put('/distribusi/{id}', [DistribusiController::class, 'update'])->name('distribusiUpdate');
    Route::delete('/distribusi/{id}', [DistribusiController::class, 'destroy'])->name('destroyDistribusi');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('index');
    Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');
});



// Admin User Control
Route::get('/admin/pendaftar', [AdminController::class, 'indexPendaftar'])->name('admin.pendaftar');
Route::get('/admin/penerima', [AdminController::class, 'indexPenerima'])->name('admin.penerima');
Route::get('/admin/pendaftar/{id}/edit', [AdminController::class, 'editUser'])->name('admin.editUser');
Route::post('/admin/pendaftar/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');


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
