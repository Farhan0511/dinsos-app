<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all(); //mengambil data yang ada di DB dan model
        return view('admin.pages.pendaftar', compact('data'));
    }


    // Insert data
    public function create_post(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenisKelamin' => 'required',
            'jenisBantuan' => 'required',
            'nomorTelepon' => 'required',
        ]);

        DB::table('users')->insert([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'jenisKelamin' => $data['jenisKelamin'],
            'jenisBantuan' => $data['jenisBantuan'],
            'nomorTelepon' => $data['nomorTelepon'],
            'password' => Hash::make('kontol123'),
        ]);

        return redirect()->back()->with('success', 'Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.pages.edit', compact('data'));
    }

    public function edit_post(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenisKelamin' => 'required',
            'jenisBantuan' => 'required',
            'nomorTelepon' => 'required',
        ]);

        $user = User::find($id);
        $user->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'jenisKelamin' => $data['jenisKelamin'],
            'jenisBantuan' => $data['jenisBantuan'],
            'nomorTelepon' => $data['nomorTelepon'],
            'password' => Hash::make('kontol123'),
        ]);

        return redirect()->back()->with('success', 'Berhasil diedit!');
    }

    public function hapus_user( $id)
    {
        $data = User::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'User berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'User tidak ditemukan!');
    }
}
