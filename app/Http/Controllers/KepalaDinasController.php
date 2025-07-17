<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class KepalaDinasController extends Controller
{
    //view
    public function kepalaDinas()
    {
        return view('kepala-dinas.pages.dashboard');
    }

    public function index()
    {
        return view('kepala-dinas.pages.dashboard');
    }

    public function kepalaDinasPenerimaView()
    {
        return view('kepala-dinas.pages.penerima');
    }

    public function kepalaDinasPendaftar()
    {
        return view('kepala-dinas.pages.pendaftar');
    }

    public function kepalaDinasLaporan()
    {
        return view('kepala-dinas.pages.laporan');
    }

    //Bagian Monitoring Pendaftar
    public function kepalaPendaftar(Request $request)
    {
        $search = $request->search;

        $data = Pendaftar::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%");
        })->get();

        return view('kepala-dinas.pages.pendaftar', compact('data'));
    }

    //Bagian monitoring penerima 
    public function kepalaDinasPenerima()
    {
        $penerima = \App\Models\Pendaftar::where('status', 'diterima')->get();
        return view('kepala-dinas.pages.penerima', compact('penerima'));
    }
}
