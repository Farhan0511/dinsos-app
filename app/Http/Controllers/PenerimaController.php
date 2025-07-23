<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Http\Controllers\Controller;

class PenerimaController extends Controller
{
    public function index()
    {
        $penerima = Penerima::with('GetUser')->get();
        return view('admin.pages.penerima.index', compact('penerima'));
    }
}
