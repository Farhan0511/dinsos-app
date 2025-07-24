<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenerimaController extends Controller
{
    public function index()
    {
        $penerima = Penerima::with('GetUser')->get();
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.penerima.index', compact('penerima'));
        } else if (Auth::check() && Auth::user()->role == 'kepala dinas') {
            return view('kepala-dinas.pages.penerima', compact('penerima'));
        }
    }
}
