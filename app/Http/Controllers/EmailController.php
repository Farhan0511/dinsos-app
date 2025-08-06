<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Penerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function mailPenerima(Request $request) {
        
        $data = [
            'nama' => $request->nama,
            'jenis_bantuan' => $request->jenis_bantuan,
            'tanggal_pengambilan' => $request->tanggal_pengambilan,
            'status' => $request->status
        ];
    
        Mail::to($request->email)->send(new SendEmail($data));
    
        return redirect()->route('admin.penerima.index')->with('success', 'Email telah dikirim');
    }

    public function mailPendaftar(Request $request) {
        
        $data = [
            'nama' => $request->nama,
            'jenis_bantuan' => $request->jenis_bantuan,
            'status' => $request->status
        ];

        if ($request->status == 'diterima') {
            $penerima = Penerima::where('id_user', $request->id_user)->first();
            if ($penerima) {
                $data['tanggal_pengambilan'] = $penerima->tanggal_pengambilan;
                $data['status'] = $penerima->status;
            }
        }
    
        Mail::to($request->email)->send(new SendEmail($data));
    
        return redirect()->route('admin.pendaftar.index')->with('success', 'Email telah dikirim');
    }    
}
