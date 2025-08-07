<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function laporanPendaftar(Request $request)
    {
        $pendaftars = Pendaftar::query();

        if ($request->has('start_date_pendaftar') && $request->start_date_pendaftar != '') {
            $pendaftars->whereDate('created_at', $request->start_date_pendaftar);
        }

        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.laporan', [
                'pendaftars' => $pendaftars->get(),
                'penerimas' => []
            ]);
        } else if (Auth::check() && Auth::user()->role == 'kepala dinas') {
            return view('kepala-dinas.pages.laporan', [
                'pendaftars' => $pendaftars->get(),
                'penerimas' => []
            ]);            
        }
    }

    public function laporanPenerima(Request $request)
    {
        $penerimas = Penerima::query();

        if ($request->has('start_date_penerima') && $request->start_date_penerima != '') {
            $penerimas->whereDate('created_at', $request->start_date_penerima);
        }

        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.laporan', [
                'pendaftars' => [],
                'penerimas' => $penerimas->get()
            ]);
        } else if (Auth::check() && Auth::user()->role == 'kepala dinas') {
            return view('kepala-dinas.pages.laporan', [
                'pendaftars' => [],
                'penerimas' => $penerimas->get()
            ]);            
        }
    }

    public function downloadPendaftarPdf(Request $request)
    {
        $pendaftars = Pendaftar::with('GetUser')
            ->when($request->start_date_pendaftar, fn($q) =>
                $q->whereDate('created_at', '>=', $request->start_date_pendaftar)
            )
            ->get();

        $pdf = Pdf::loadView('pdf.pendaftar', compact('pendaftars'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('laporan_pendaftar.pdf');
    }

    public function downloadPenerimaPdf(Request $request)
    {
        $penerimas = Penerima::with('GetUser')
            ->when($request->start_date_penerima, fn($q) =>
                $q->whereDate('created_at', '>=', $request->start_date_penerima)
            )
            ->get();

        $pdf = Pdf::loadView('pdf.penerima', compact('penerimas'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('laporan_penerima.pdf');
    }

}