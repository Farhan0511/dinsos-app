<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaDinasController extends Controller
{
    public function kepalaDinas(){
        return view('kepala-dinas.pages.dashboard');
    }

    public function index(){
        return view('kepala-dinas.pages.dashboard');
    }

    public function kepalaDinasPenerima() {
        return view('kepala-dinas.pages.penerima');
    }
}
