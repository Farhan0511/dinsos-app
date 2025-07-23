<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PendaftarController extends Controller
{
    public function index()
    {
        $data = Pendaftar::with('GetUser')->get();
        return view('admin.pages.pendaftar.index', compact('data'));
    }

    public function store(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user)
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        
        $request->validate([
            'nik' => 'required',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenisKelamin' => 'required',
            'jenisBantuan' => 'required',
            'nomorTelepon' => 'required',
            'fotoKtp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fotoRumah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $updateData = [];

        if (isset($request->nik)) {
            $updateData['nik'] = $request->nik;            
        }
        else if (isset($request->nama)) {
            $updateData['nama'] = $request->nama;            
        }
        else if (isset($request->alamat)) {
            $updateData['alamat'] = $request->alamat;            
        }
        else if (isset($request->jenisKelamin)) {
            $updateData['jenisKelamin'] = $request->jenisKelamin;            
        }
        else if (isset($request->jenisBantuan)) {
            $updateData['jenisBantuan'] = $request->jenisBantuan;            
        }
        else if (isset($request->nomorTelepon)) {
            $updateData['nomorTelepon'] = $request->nomorTelepon;            
        }
        else if (isset($request->fotoKtp)) {
            $file_ktp = public_path('uploads/users/ktp/' . $user->fotoKtp);

            if (file_exists($file_ktp) && is_file($file_ktp)) {
                unlink($file_ktp);
            }

            $image_ktp = 'user-'. time() . '.' . $request->fotoKtp->extension();
            $request->gambar->move(public_path('uploads/users/ktp/'), $image_ktp);
            $updateData['fotoKtp'] = $image_ktp; 
        }
        else if (isset($request->fotoRumah)) {
            $file_rumah = public_path('uploads/users/rumah/' . $user->fotoRumah);

            if (file_exists($file_rumah) && is_file($file_rumah)) {
                unlink($file_rumah);
            }

            $image_rumah = 'user-'. time() . '.' . $request->fotoRumah->extension();
            $request->gambar->move(public_path('uploads/users/rumah/'), $image_rumah);
        }
        $user->update($updateData);

        $pendaftar = Pendaftar::where('id_user', $id)->first();

        if (!$pendaftar) {
            DB::table('pendaftar')->insert([
                'id_user' => $user->id,
                'jenisBantuan' => $updateData['jenisBantuan'],
                'status' => 'menunggu'
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }
        return view('admin.pages.pendaftar.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::where('id_user', $id)->with('GetUser')->first();

        if (!$pendaftar)
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');

        $data = $request->validate([
            'jenisBantuan' => 'required',
            'status' => 'required',
        ]);


        $pendaftar->update([
            'status' => $data['status']
        ]);

        return redirect()->back()->with('success', 'Berhasil diedit!');
    }
}
