<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
                return redirect()->route('home')->with('success', 'Login berhasil!');                                
            } else if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');                
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

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->route('loginUser')->with('success', 'Login berhasil!');
        }

        return redirect()->route('register')->with('failed', 'Email atau password salah.');
    }
}
