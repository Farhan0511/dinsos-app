<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

// Hal User
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/daftar', [HomeController::class, 'daftar'])->name('daftar');
Route::post('/daftar', [UserController::class, 'create_post'])->name('daftarUser');

Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'loginUser'])->name('loginUser');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Route Login Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin');

    Route::delete('/hapus-user/{id}', [UserController::class, 'hapus_user'])->name('hapusUser');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('editUser');
    Route::post('/edit-user/{id}', [UserController::class, 'edit_post'])->name('editUserPost');


    Route::get('/input-berita', [HomeController::class, 'inputBerita'])->name('inputBerita');

    // Perhatikan ada 2 route dengan URI sama '/data-pendaftar', ini harus diperbaiki supaya tidak bentrok
    // Saya asumsikan yang benar adalah UserController index untuk '/data-pendaftar'
    Route::get('/data-pendaftar', [UserController::class, 'index'])->name('pendaftar');
    Route::get('/data-penerima', [HomeController::class, 'penerima'])->name('penerima');
});
