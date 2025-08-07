<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

        if ($request->filled('start_date_pendaftar') && $request->filled('end_date_pendaftar')) {
            $start = Carbon::parse($request->start_date_pendaftar)->startOfDay();
            $end = Carbon::parse($request->end_date_pendaftar)->endOfDay();

            $pendaftars->whereBetween('updated_at', [$start, $end]);
        } elseif ($request->filled('start_date_pendaftar')) {
            $start = Carbon::parse($request->start_date_pendaftar)->startOfDay();
            $end = Carbon::parse($request->start_date_pendaftar)->endOfDay();

            $pendaftars->whereBetween('updated_at', [$start, $end]);
        }

        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.laporan', [
                'pendaftars' => $pendaftars->get(),
                'penerimas' => []
            ]);
        } elseif (Auth::check() && Auth::user()->role == 'kepala dinas') {
            return view('kepala-dinas.pages.laporan', [
                'pendaftars' => $pendaftars->get(),
                'penerimas' => []
            ]);
        }
    }

    public function laporanPenerima(Request $request)
    {
        $penerimas = Penerima::query();

        if ($request->filled('start_date_penerima') && $request->filled('end_date_penerima')) {
            $start = Carbon::parse($request->start_date_penerima)->startOfDay();
            $end = Carbon::parse($request->end_date_penerima)->endOfDay();
            $penerimas->whereBetween('updated_at', [$start, $end]);
        } elseif ($request->filled('start_date_penerima')) {
            $start = Carbon::parse($request->start_date_penerima)->startOfDay();
            $end = Carbon::parse($request->start_date_penerima)->endOfDay();
            $penerimas->whereBetween('updated_at', [$start, $end]);
        }

        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.laporan', [
                'pendaftars' => [],
                'penerimas' => $penerimas->get()
            ]);
        } elseif (Auth::check() && Auth::user()->role == 'kepala dinas') {
            return view('kepala-dinas.pages.laporan', [
                'pendaftars' => [],
                'penerimas' => $penerimas->get()
            ]);
        }
    }

    public function downloadPendaftarPdf(Request $request)
    {
        $pendaftars = Pendaftar::with('GetUser')
            ->when($request->filled('start_date_pendaftar') && $request->filled('end_date_pendaftar'), function ($query) use ($request) {
                $start = Carbon::parse($request->start_date_pendaftar)->startOfDay();
                $end = Carbon::parse($request->end_date_pendaftar)->endOfDay();
                $query->whereBetween('updated_at', [$start, $end]);
            })
            ->when($request->filled('start_date_pendaftar') && !$request->filled('end_date_pendaftar'), function ($query) use ($request) {
                $start = Carbon::parse($request->start_date_pendaftar)->startOfDay();
                $end = Carbon::parse($request->start_date_pendaftar)->endOfDay();
                $query->whereBetween('updated_at', [$start, $end]);
            })
            ->get();

        $pdf = Pdf::loadView('pdf.pendaftar', compact('pendaftars'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('laporan_pendaftar.pdf');
    }

    public function downloadPenerimaPdf(Request $request)
    {
        $penerimas = Penerima::with('GetUser')
            ->when($request->filled('start_date_penerima') && $request->filled('end_date_penerima'), function ($query) use ($request) {
                $start = Carbon::parse($request->start_date_penerima)->startOfDay();
                $end = Carbon::parse($request->end_date_penerima)->endOfDay();
                $query->whereBetween('updated_at', [$start, $end]);
            })
            ->when($request->filled('start_date_penerima') && !$request->filled('end_date_penerima'), function ($query) use ($request) {
                $start = Carbon::parse($request->start_date_penerima)->startOfDay();
                $end = Carbon::parse($request->start_date_penerima)->endOfDay();
                $query->whereBetween('updated_at', [$start, $end]);
            })
            ->get();

        $pdf = Pdf::loadView('pdf.penerima', compact('penerimas'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('laporan_penerima.pdf');
    }
}