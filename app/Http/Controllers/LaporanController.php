<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{

    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.laporan', [
                'pendaftars' => [],
                'penerimas' => []
            ]);
        } else if (Auth::check() && Auth::user()->role == 'kepala dinas') {
            return view('kepala-dinas.pages.laporan', [
                'pendaftars' => [],
                'penerimas' => []
            ]);            
        }
    }

    public function laporan(Request $request)
    {
        $pendaftars = Pendaftar::query();
        $penerimas = Penerima::query();

        if ($request->has('start_date_pendaftar') && $request->start_date_pendaftar != '') {
            $pendaftars->whereDate('updated_at', $request->start_date_pendaftar);
        }

        if ($request->has('start_date_penerima') && $request->start_date_penerima != '') {
            $penerimas->whereDate('updated_at', $request->start_date_penerima);
        }

        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.laporan', [
                'pendaftars' => $pendaftars->get(),
                'penerimas' => $penerimas->get()
            ]);
        } else if (Auth::check() && Auth::user()->role == 'kepala dinas') {
            return view('kepala-dinas.pages.laporan', [
                'pendaftars' => $pendaftars->get(),
                'penerimas' => $penerimas->get()
            ]);            
        }
    }
}