<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Penerima;
use App\Models\Verifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    public function index()
    {
        $data = Verifikasi::with('GetUser')->get(); 
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.verifikasi.index', compact('data'));
        }
        else if (Auth::check() && Auth::user()->role == 'petugas') {
            return view('petugas.pages.verifikasi.index', compact('data'));
        }
    }

    public function create()
    {
        $pendaftar = Pendaftar::with('GetUser')->get();
        return view('petugas.pages.verifikasi.create', compact('pendaftar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required',
            'foto_rumah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto_diri' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        $image_name_rumah = 'verifikasi-fotorumah-'. time() . '.' . $request->foto_rumah->extension();
        $request->foto_rumah->move(public_path('uploads/verifikasi/images/'), $image_name_rumah);

        $image_name_diri = 'verifikasi-fotodiri-'. time() . '.' . $request->foto_diri->extension();
        $request->foto_diri->move(public_path('uploads/verifikasi/images/'), $image_name_diri);

        Verifikasi::create([
            'id_user' => $data['id_user'],
            'foto_diri' => $image_name_diri,
            'foto_rumah' => $image_name_rumah,
        ]);

        return redirect()->route('petugas.verifikasi.index')->with('success', 'Data verifikasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $verifikasi = Verifikasi::find($id);
        $pendaftar = Pendaftar::with('GetUser')->get();

        if (!$verifikasi) {
            return redirect()->back()->with('error', 'Verifikasi tidak ditemukan.');
        }

        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.pages.verifikasi.edit', compact('verifikasi', 'pendaftar'));
        }
        else if (Auth::check() && Auth::user()->role == 'petugas') {
            return view('petugas.pages.verifikasi.edit', compact('verifikasi', 'pendaftar'));
        }
    }

    public function update(Request $request, $id)
    {
        $verifikasi = Verifikasi::find($id);

        if (!$verifikasi) {
            return redirect()->back()->with('error', 'Verifikasi tidak ditemukan.');
        }

        if (Auth::check() && Auth::user()->role == 'admin') {
            $data = $request->validate([
                'status' => 'required',
            ]);


            $verifikasi->update([
                'status' => $data['status']
            ]);

            $penerima = Penerima::where('id_user', $verifikasi->id_user)->first();
            if (!$penerima) {
                DB::table('penerimas')->insert([
                    'id_user' => $verifikasi->id_user,
                    'status' => $request->status,
                    'tanggal_pengambilan' => $request->tanggal_pengambilan
                ]);
            } else {
                $penerima->update([
                    'tanggal_pengambilan' => $request->tanggal_pengambilan
                ]);            
            }

            $pendaftar = Pendaftar::where('id_user', $verifikasi->id_user)->first();
            if ($pendaftar) {
                $penerima->update([
                    'tanggal_pengambilan' => $request->tanggal_pengambilan
                ]);            
            }
            return redirect()->route('admin.verifikasi.index')->with('success', 'Data verifikasi berhasil diupdate!');
        }
        else if (Auth::check() && Auth::user()->role == 'petugas') {

            $request->validate([
                'id_user' => 'required',
                'foto_rumah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'foto_diri' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);
    
            $updateData = [];
            if (isset($request->id_user)) {
                $updateData['id_user'] = $request->id_user;
            }
            if (isset($request->foto_rumah)) {
                $file_path = public_path('uploads/verifikasi/images/' . $verifikasi->foto_rumah);
        
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
        
                $image_name = 'verifikasi-fotorumah-'. time() . '.' . $request->foto_rumah->extension();
                $request->foto_rumah->move(public_path('uploads/verifikasi/images/'), $image_name);
                $updateData['foto_rumah'] = $image_name;
            }
            if (isset($request->foto_diri)) {
                $file_path = public_path('uploads/verifikasi/images/' . $verifikasi->foto_diri);
        
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
        
                $image_name = 'verifikasi-fotodiri-'. time() . '.' . $request->foto_diri->extension();
                $request->foto_diri->move(public_path('uploads/verifikasi/images/'), $image_name);
                $updateData['foto_diri'] = $image_name;
            }
    
            $verifikasi->update($updateData);
    
            return redirect()->route('petugas.verifikasi.index')->with('success', 'Data verifikasi berhasil diupdate!');
        }
    }

    public function destroy($id)
    {
        $verifikasi = Verifikasi::find($id);
        if (!$verifikasi) {
            return redirect()->back()->with('error', 'Verifikasi tidak ditemukan.');
        }

        $file_path_diri = public_path('uploads/verifikasi/images/' . $verifikasi->foto_diri);

        if (file_exists($file_path_diri) && is_file($file_path_diri)) {
            unlink($file_path_diri);
        }

        $file_path_rumah = public_path('uploads/verifikasi/images/' . $verifikasi->foto_rumah);

        if (file_exists($file_path_rumah) && is_file($file_path_rumah)) {
            unlink($file_path_rumah);
        }

        $verifikasi->delete();

        return redirect()->route('admin.verifikasi.index')->with('success', 'Data verifikasi berhasil dihapus!');
    }
}
