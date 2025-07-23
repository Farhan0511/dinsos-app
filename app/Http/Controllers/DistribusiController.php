<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    public function index()
    {
        $data = Distribusi::with('GetUser')->get(); 
        return view('admin.pages.distribusi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pages.distribusi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'jenis_bantuan' => 'required',
            'foto_penyerahan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        $image_name = 'distribusi-'. time() . '.' . $request->foto_penyerahan->extension();
        $request->foto_penyerahan->move(public_path('uploads/distribusi/images/'), $image_name);

        Distribusi::create($data);

        return redirect()->route('admin.distribusi.index')->with('success', 'Data distribusi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $distribusi = Distribusi::where('id_user', $id)->with('GetUser')->first();

        if (!$distribusi) {
            return redirect()->back()->with('error', 'Distribusi tidak ditemukan.');
        }

        return view('admin.pages.distribusi.edit', compact('distribusi'));
    }

    public function update(Request $request, $id)
    {
        $distribusi = Distribusi::find($id);

        if (!$distribusi) {
            return redirect()->back()->with('error', 'Distribusi tidak ditemukan.');
        }

        $request->validate([
            'id_user' => 'required',
            'jenis_bantuan' => 'required',
            'foto_penyerahan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $updateData = [];
        if (isset($request->id_user)) {
            $updateData['id_user'] = $request->id_user;
        }
        if (isset($request->jenis_bantuan)) {
            $updateData['jenis_bantuan'] = $request->jenis_bantuan;
        }
        if (isset($request->foto_penyerahan)) {
            $file_path = public_path('uploads/distribusi/images/' . $distribusi->foto_penyerahan);
    
            if (file_exists($file_path) && is_file($file_path)) {
                unlink($file_path);
            }
    
            $image_name = 'distribusi-'. time() . '.' . $request->foto_penyerahan->extension();
            $request->foto_penyerahan->move(public_path('uploads/distribusi/images/'), $image_name);
            $updateData['foto_penyerahan'] = $image_name;
        }

        $distribusi->update($updateData);

        return redirect()->route('admin.distribusi.index')->with('success', 'Data distribusi berhasil diupdate!');
    }

    public function destroy($id)
    {
        $distribusi = Distribusi::find($id);
        if (!$distribusi) {
            return redirect()->back()->with('error', 'Distribusi tidak ditemukan.');
        }

        $file_path = public_path('uploads/distribusi/images/' . $distribusi->foto_penyerahan);

        if (file_exists($file_path) && is_file($file_path)) {
            unlink($file_path);
        }

        $distribusi->delete();

        return redirect()->route('admin.distribusi.index')->with('success', 'Data distribusi berhasil dihapus!');
    }
}
