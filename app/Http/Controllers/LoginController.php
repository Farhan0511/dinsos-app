<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public function loginUser()
    {
        return view('auth.pages.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            // Do redirect panel base on role
            if (Auth::user()->role == 'user') {
                if (!Auth::user()->is_verified) {
                    return redirect()->route('user.otp.verification');
                }
                return redirect()->route('home')->with('success', 'Login berhasil!');                                
            } else if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');                
            } else if (Auth::user()->role == 'petugas') {
                return redirect()->route('petugas.dashboard')->with('success', 'Login berhasil!');                
            } else if (Auth::user()->role == 'kepala dinas') {
                return redirect()->route('kepala-dinas.dashboard')->with('success', 'Login berhasil!');                
            }
        }

        return redirect()->route('loginUser')->with('failed', 'Email atau password salah.');
    }

    // Method logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginUser')->with('success', 'Logout berhasil!');
    }

    public function register()
    {
        return view('auth.pages.register'); // sesuaikan dengan file blade kamu
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $data['nama'] = $request->nama;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $otp = rand(100000, 999999);
        DB::table('users')->where('email', $request->email)->update([
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(30)
        ]);

        Mail::to($request->email)->send(new \App\Mail\OtpVerification($request->nama, $request->email, $otp));

        return redirect()->route('loginUser')->with('success', 'Regist berhasil!');
    }

    public function otp_verification() 
    {
        return view('auth.pages.otp');
    }

    public function otp_proses(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $user = auth()->user();

        if ($user->otp === $request->otp && Carbon::parse($user->otp_expires_at)->isFuture()) {
            $user->is_verified = true;
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->save();

            return redirect()->route('home')->with('success', 'Verifikasi berhasil!');
        }
        return back()->with('failed', 'Kode OTP salah atau sudah kadaluarsa.');
    }
}
