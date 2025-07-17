<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tampilkan semua pendaftar
    public function index()
    {
        $data = User::all();
        return view('admin.pages.pendaftar', compact('data'));
    }

    // Insert data
    public function create_post(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'alamat' => 'required|string|max:255',
            'jenisKelamin' => 'required',
            'jenisBantuan' => 'required',
            'nomorTelepon' => 'required',
            'fotoKtp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        // Handle upload foto KTP
        $fotoKtp = null;
        if ($request->hasFile('fotoKtp')) {
            $file = $request->file('fotoKtp');
            $fotoKtp = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/ktp'), $fotoKtp);
        }

        DB::table('users')->insert([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'jenisKelamin' => $data['jenisKelamin'],
            'jenisBantuan' => $data['jenisBantuan'],
            'nomorTelepon' => $data['nomorTelepon'],
            'fotoKtp' => $fotoKtp,
            'password' => Hash::make('123'),
        ]);

        return redirect()->back()->with('success', 'Berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.pages.edit-pendaftar', compact('data'));
    }

    // Proses edit
    public function edit_post(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'alamat' => 'required|string|max:255',
            'jenisKelamin' => 'required',
            'jenisBantuan' => 'required',
            'nomorTelepon' => 'required|string|max:20',
            'status' => 'required',
            'fotoKtp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload baru jika ada
        if ($request->hasFile('fotoKtp')) {
            $file = $request->file('fotoKtp');
            $fotoKtp = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/ktp'), $fotoKtp);

            // Hapus foto lama jika ada
            if ($user->fotoKtp && file_exists(public_path('uploads/ktp/' . $user->fotoKtp))) {
                unlink(public_path('uploads/ktp/' . $user->fotoKtp));
            }

            $user->fotoKtp = $fotoKtp;
        }

        $user->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'jenisKelamin' => $data['jenisKelamin'],
            'jenisBantuan' => $data['jenisBantuan'],
            'nomorTelepon' => $data['nomorTelepon'],
            'fotoKtp' => $data['fotoKtp'],
            'status' => $data['status'],
            'password' => Hash::make('123'), // atau hapus ini jika tidak ingin reset password
        ]);

        return redirect()->back()->with('success', 'Berhasil diedit!');
    }

    // Hapus user
    public function hapus_user($id)
    {
        $user = User::find($id);

        if ($user) {
            // Hapus foto jika ada
            if ($user->fotoKtp && file_exists(public_path('uploads/ktp/' . $user->fotoKtp))) {
                unlink(public_path('uploads/ktp/' . $user->fotoKtp));
            }

            $user->delete();
            return redirect()->back()->with('success', 'User berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'User tidak ditemukan!');
    }

    // Tampilkan halaman profil user
    public function editProfile()
    {
        return view('user.pages.profile');
    }

    // Update profil user
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->nama = $request->nama;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
