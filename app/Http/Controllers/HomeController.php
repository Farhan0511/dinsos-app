<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('admin.pages.dashboard');
    }

    public function inputBerita()
    {
        return view('admin.pages.input-berita');
    }

    public function home()
    {
        return view('user.main');
    }

    public function pendaftar(){
        return view('admin.pages.pendaftar');
    }

    public function penerima(){
        return view('admin.pages.penerima');
    }

    public function daftar(){
        return view('user.pages.daftar');
    }

    public function register(){
        return view('auth.pages.register');
    }

}