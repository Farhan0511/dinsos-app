<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function mail(Request $request) {
        
        $data = [
            'nama' => $request->nama,
            'jenis_bantuan' => $request->jenis_bantuan,
            'tanggal_pengambilan' => $request->tanggal_pengambilan,
        ];
    
        Mail::to($request->email)->send(new SendEmail($data));
    
        return redirect()->route('admin.penerima.index')->with('success', 'Email penerimaan bantuan telah dikirim');
    }
}
