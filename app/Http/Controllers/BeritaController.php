<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;


class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.pages.berita.create');
    }

    public function beritaUser()
    {
        $beritas = Berita::orderBy('id', 'desc')->paginate(6);
        return view('user.pages.berita', compact('beritas'));
    }

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

        $image_name = 'berita-'. time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads/berita/images/'), $image_name);

        Berita::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'gambar' => $image_name,
            'id_user' => Auth::user()->id
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }
        return view('admin.pages.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_user' => 'required'
        ]);

        $updateData = [];
        if (isset($request->judul)) {
            $updateData['judul'] = $request->judul;
        }
        if (isset($request->penulis)) {
            $updateData['penulis'] = $request->penulis;
        }
        if (isset($request->kategori)) {
            $updateData['kategori'] = $request->kategori;
        }
        if (isset($request->isi)) {
            $updateData['isi'] = $request->isi;
        }
        if (isset($request->gambar)) {
            $file_path = public_path('uploads/berita/images/' . $berita->gambar);
    
            if (file_exists($file_path) && is_file($file_path)) {
                unlink($file_path);
            }
    
            $image_name = 'berita-'. time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/berita/images/'), $image_name);
            $updateData['gambar'] = $image_name;
        }
        if (isset($request->id_user)) {
            $updateData['id_user'] = $request->id_user;
        }

        $berita->update($updateData);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }

        $file_path = public_path('uploads/berita/images/' . $berita->gambar);

        if (file_exists($file_path) && is_file($file_path)) {
            unlink($file_path);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
