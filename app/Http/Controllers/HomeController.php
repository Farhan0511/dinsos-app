<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Pendaftar;
use App\Models\Penerima;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function admin()
    {
        $pendaftar = Pendaftar::count();
        $penerima = Penerima::count();
        $distribusi = Distribusi::count();
        return view('admin.pages.dashboard', compact('pendaftar', 'penerima', 'distribusi'));
    }

    public function kepaladinas()
    {
        $pendaftar = Pendaftar::count();
        $penerima = Penerima::count();
        $distribusi = Distribusi::count();
        return view('kepala-dinas.pages.dashboard', compact('pendaftar', 'penerima', 'distribusi'));
    }

    public function penerimaBansos()
    {
        $distribusis = Distribusi::with('GetUser')->get();
        return view('user.pages.penerima', compact('distribusis'));
    }

    public function home()
    {
        return view('user.main');
    }

    public function daftar(){
        $user = User::find(Auth::user()->id);
        return view('user.pages.daftar', compact('user'));
    }

    public function register(){
        return view('auth.pages.register');
    }
}