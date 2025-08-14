<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Penerima;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PendaftarController extends Controller
{
    public function index()
    {
        $data = Pendaftar::with('GetUser')->get();
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.pendaftar.index', compact('data'));
        } else if (Auth::check() && Auth::user()->role == 'kepala dinas') {
            return view('kepala-dinas.pages.pendaftar', compact('data'));        
        }
    }

    public function store(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user)
            return redirect()->back()->with('error', 'User tidak ditemukan.');

        $request->validate([
            'nik' => 'required|digits:16|unique:users,nik',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenisKelamin' => 'required',
            'jenisBantuan' => 'required',
            'nomorTelepon' => 'required|regex:/^[0-9]+$/|min:10|max:13',
            'fotoKtp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fotoRumah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'fotoDiri' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $updateData = [];

        if (isset($request->nik)) {
            $updateData['nik'] = $request->nik;
        }
        if (isset($request->nama)) {
            $updateData['nama'] = $request->nama;
        }
        if (isset($request->alamat)) {
            $updateData['alamat'] = $request->alamat;
        }
        if (isset($request->jenisKelamin)) {
            $updateData['jenisKelamin'] = $request->jenisKelamin;
        }
        if (isset($request->jenisBantuan)) {
            $updateData['jenisBantuan'] = $request->jenisBantuan;
        }
        if (isset($request->nomorTelepon)) {
            $updateData['nomorTelepon'] = $request->nomorTelepon;
        }
        if (isset($request->fotoKtp)) {
            $file_ktp = public_path('uploads/users/ktp/' . $user->fotoKtp);

            if (file_exists($file_ktp) && is_file($file_ktp)) {
                unlink($file_ktp);
            }

            $image_ktp = 'user-' . time() . '.' . $request->fotoKtp->extension();
            $request->fotoKtp->move(public_path('uploads/users/ktp/'), $image_ktp);
            $updateData['fotoKtp'] = $image_ktp;
        }
        if (isset($request->fotoRumah)) {
            $file_rumah = public_path('uploads/users/rumah/' . $user->fotoRumah);

            if (file_exists($file_rumah) && is_file($file_rumah)) {
                unlink($file_rumah);
            }

            $image_rumah = 'user-' . time() . '.' . $request->fotoRumah->extension();
            $request->fotoRumah->move(public_path('uploads/users/rumah/'), $image_rumah);
            $updateData['fotoRumah'] = $image_rumah;
        }
        if (isset($request->fotoDiri)) {
            $file_diri = public_path('uploads/users/fotodiri/' . $user->fotoDiri);

            if (file_exists($file_diri) && is_file($file_diri)) {
                unlink($file_diri);
            }

            $image_diri = 'user-' . time() . '.' . $request->fotoDiri->extension();
            $request->fotoDiri->move(public_path('uploads/users/fotodiri/'), $image_diri);
            $updateData['fotoDiri'] = $image_diri;
        }

        $user->update($updateData);

        $pendaftar = Pendaftar::where('id_user', $id)->first();

        if (!$pendaftar) {
            DB::table('pendaftars')->insert([
                'id_user' => $user->id,
                'jenisBantuan' => $updateData['jenisBantuan'],
                'status' => 'belum diterima'
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::find($id);
        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
        }
        return view('admin.pages.pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::find($id);

        if (!$pendaftar)
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');

        $data = $request->validate([
            'status' => 'required',
        ]);


        $pendaftar->update([
            'status' => $data['status']
        ]);

        $penerima = Penerima::where('id_user', $pendaftar->id_user)->first();
        if (!$penerima) {
            DB::table('penerimas')->insert([
                'id_user' => $pendaftar->id_user,
                'jenisBantuan' => $request->jenisBantuan,
                'status' => $request->status,
                'tanggal_pengambilan' => $request->tanggal_pengambilan
            ]);
        } else {
            $penerima->update([
                'tanggal_pengambilan' => $request->tanggal_pengambilan
            ]);            
        }

        return redirect()->back()->with('success', 'Berhasil diedit!');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::find($id);

        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        // Hapus juga user jika perlu
        $user = User::find($pendaftar->id_user);
        if ($user) {
            // Hapus foto KTP
            if ($user->fotoKtp) {
                $ktpPath = public_path('uploads/users/ktp/' . $user->fotoKtp);
                if (file_exists($ktpPath)) unlink($ktpPath);
            }

            // Hapus foto Rumah
            if ($user->fotoRumah) {
                $rumahPath = public_path('uploads/users/rumah/' . $user->fotoRumah);
                if (file_exists($rumahPath)) unlink($rumahPath);
            }

            if (isset($user->fotoDiri)) {
                $file_diri = public_path('uploads/users/fotodiri/' . $user->fotoDiri);

                if (file_exists($file_diri) && is_file($file_diri)) {
                    unlink($file_diri);
                }
            }

            $user->delete();
        }

        $pendaftar->delete();

        return redirect()->back()->with('success', 'Data pendaftar berhasil dihapus.');
    }
}
