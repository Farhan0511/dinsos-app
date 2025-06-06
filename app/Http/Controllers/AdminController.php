<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function indexPendaftar()
    {
        $data = User::all();
        return view('admin.pages.pendaftar', compact('data'));
    }

    public function indexPenerima()
    {
        $penerima = User::where('status', 'diterima')->get();
        return view('admin.pages.penerima', compact('penerima'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.edit-pendaftar', compact('user'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,belum diterima',
        ]);

        $pendaftar = User::findOrFail($id);
        $pendaftar->status = $request->status;
        $pendaftar->save();

        return redirect()->route('admin.pendaftar')->with('success', 'Status berhasil diubah');
    }

    public function laporan()
    {
        return view('admin.pages.laporan');
    }

    public function apiPendaftar()
    {
        $data = User::orderBy('created_at', 'desc')->get(); // Sesuaikan model & logika
        return response()->json($data);
    }
}
