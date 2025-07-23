<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // public function indexPendaftar(Request $request)
    // {
    //     $query = User::query();

    //     if ($request->has('search') && $request->search != '') {
    //         $search = $request->search;

    //         $query->where(function ($q) use ($search) {
    //             $q->where('nama', 'like', "%{$search}%")
    //                 ->orWhere('email', 'like', "%{$search}%")
    //                 ->orWhere('alamat', 'like', "%{$search}%")
    //                 ->orWhere('jenisKelamin', 'like', "%{$search}%")
    //                 ->orWhere('jenisBantuan', 'like', "%{$search}%")
    //                 ->orWhere('nomorTelepon', 'like', "%{$search}%");
    //         });
    //     }

    //     $data = $query->latest()->get();

    //     return view('admin.pages.pendaftar', compact('data'));
    // }

    // public function indexPenerima()
    // {
    //     $penerima = User::where('status', 'diterima')->get();
    //     return view('admin.pages.penerima', compact('penerima'));
    // }

    // public function editUser($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('admin.pages.edit-pendaftar', compact('user'));
    // }

    // public function updateStatus(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'jenisKelamin' => 'required|in:laki-laki,perempuan',
    //         'jenisBantuan' => 'required|string|max:255',
    //         'alamat' => 'required|string',
    //         'nomorTelepon' => 'nullable|string|max:20',
    //         'status' => 'required|in:diterima,belum diterima',
    //         'fotoKtp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'fotoRumah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $pendaftar = User::findOrFail($id);

    //     // Update data biasa
    //     $pendaftar->nama = $request->nama;
    //     $pendaftar->email = $request->email;
    //     $pendaftar->jenisKelamin = $request->jenisKelamin;
    //     $pendaftar->jenisBantuan = $request->jenisBantuan;
    //     $pendaftar->alamat = $request->alamat;
    //     $pendaftar->nomorTelepon = $request->nomorTelepon;
    //     $pendaftar->status = $request->status;

    //     // Upload Foto KTP
    //     if ($request->hasFile('fotoKtp')) {
    //         $file = $request->file('fotoKtp');
    //         $namaFile = time() . '_ktp.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('views/image'), $namaFile);
    //         $pendaftar->fotoKtp = $namaFile;
    //     }

    //     // Upload Foto Rumah
    //     if ($request->hasFile('fotoRumah')) {
    //         $file = $request->file('fotoRumah');
    //         $namaFile = time() . '_rumah.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('views/image'), $namaFile);
    //         $pendaftar->fotoRumah = $namaFile;
    //     }

    //     $pendaftar->save();

    //     return redirect()->route('admin.pendaftar')->with('success', 'Data berhasil diperbarui');
    // }

    public function apiPendaftar()
    {
        $data = User::orderBy('created_at', 'desc')->get();
        return response()->json($data);
    }
}
