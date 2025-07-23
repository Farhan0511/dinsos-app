<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index()
    {
        return view('admin.pages.laporan');
    }

    public function laporan(Request $request)
    {
        $pendaftars = Pendaftar::query();
        $penerimas = Penerima::query();

        // Filter berdasarkan tanggal daftar
        if ($request->has('start_date_pendaftar') && $request->start_date_pendaftar != '') {
            $pendaftars->whereDate('tanggal_daftar', $request->start_date_pendaftar);
        }

        // Filter berdasarkan tanggal terima
        if ($request->has('start_date_penerima') && $request->start_date_penerima != '') {
            $penerimas->whereDate('tanggal_terima', $request->start_date_penerima);
        }

        return view('admin.pages.laporan', [
            'pendaftars' => $pendaftars->get(),
            'penerimas' => $penerimas->get()
        ]);
    }
}