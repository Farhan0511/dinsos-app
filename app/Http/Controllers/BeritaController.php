<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;


class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderByDesc('created_at')->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    // Tampilkan form tambah berita
    public function create()
    {
        return view('admin.berita.input-berita');
    }

    // Tampilkan berita untuk user (frontend)
    public function beritaUser()
    {
        $beritas = Berita::orderByDesc('created_at')->paginate(6); // Atur jumlah sesuai kebutuhan
        return view('user.pages.berita', compact('beritas'));
    }


    // Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Tampilkan form edit berita
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit-berita', compact('berita'));
    }

    // Update berita
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $gambarBaru = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $gambarBaru;
        }

        $berita->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate.');
    }

    // Hapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar dari storage
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
