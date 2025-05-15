<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasyarakatController;
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
// Halaman Admin
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');

// Hal Admin Input
Route::get('/input-berita', [HomeController::class, 'inputBerita'])->name('inputBerita');

// Hal User
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/data-pendaftar', [HomeController::class, 'pendaftar'])->name('pendaftar');

Route::get('/data-pendaftar', [MasyarakatController::class, 'index'])->name('pendaftar');

Route::get('/data-penerima', [HomeController::class, 'penerima'])->name('penerima');
