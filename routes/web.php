<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KepalaDinasController;

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
    Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');

    Route::get('/data-pendaftar', [UserController::class, 'index'])->name('pendaftar');
    Route::get('/data-penerima', [HomeController::class, 'penerima'])->name('penerima');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    Route::delete('/hapus-user/{id}', [UserController::class, 'hapus_user'])->name('hapusUser');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('editUser');
    Route::post('/edit-user/{id}', [UserController::class, 'edit_post'])->name('editUserPost');

    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
});


// Admin User Control
Route::get('/admin/pendaftar', [AdminController::class, 'indexPendaftar'])->name('admin.pendaftar');
Route::get('/admin/penerima', [AdminController::class, 'indexPenerima'])->name('admin.penerima');
Route::get('/admin/pendaftar/{id}/edit', [AdminController::class, 'editUser'])->name('admin.editUser');
Route::post('/admin/pendaftar/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');


// Kepala Dinas
Route::get('/kepala-dinas/dashboard', [KepalaDinasController::class, 'kepalaDinas'])->name('kepala-dinas.dashboard');
Route::get('/kepala-dinas/penerima', [KepalaDinasController::class, 'kepalaDinasPenerima'])->name('kepala-dinas.penerima');


Route::middleware(['auth'])->group(function () {
    Route::get('/kelola-profile', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
});
