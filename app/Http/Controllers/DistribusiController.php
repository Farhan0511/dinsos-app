<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    // ✅ Tampilkan semua data distribusi
    public function distribusi()
    {
        $data = Distribusi::all(); 
        return view('admin.distribusi.distribusi', compact('data'));
    }


    // ✅ Tampilkan form tambah distribusi
    public function create()
    {
        return view('admin.distribusi.create-distribusi');
    }

    // ✅ Simpan data distribusi baru
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_bantuan' => 'required',
            'no_telepon' => 'required',
            'foto_penyerahan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Handle foto upload
        if ($request->hasFile('foto_penyerahan')) {
            $file = $request->file('foto_penyerahan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto', $filename);
            $data['foto_penyerahan'] = $filename;
        }

        Distribusi::create($data);

        return redirect()->route('admin.distribusi')->with('success', 'Data distribusi berhasil ditambahkan!');
    }

    // ✅ Tampilkan form edit distribusi
    public function edit($id)
    {
        $distribusi = Distribusi::findOrFail($id);
        return view('admin.distribusi.edit-distribusi', compact('distribusi'));
    }

    // ✅ Update data distribusi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_bantuan' => 'required',
            'no_telepon' => 'required',
            'foto_penyerahan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $distribusi = Distribusi::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto_penyerahan')) {
            $file = $request->file('foto_penyerahan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto', $filename);
            $data['foto_penyerahan'] = $filename;
        }

        $distribusi->update($data);

        return redirect()->route('admin.distribusi')->with('success', 'Data distribusi berhasil diupdate!');
    }

    // ✅ Hapus data distribusi
    public function destroy($id)
    {
        $distribusi = Distribusi::findOrFail($id);
        $distribusi->delete();

        return redirect()->route('admin.distribusi')->with('success', 'Data distribusi berhasil dihapus!');
    }
}
