<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ================================================
    // Fungsi index()
    // Menampilkan halaman form login
    // ================================================
    public function index()
    {
        // Jika user sudah login, redirect ke menu
        return view('login.index');
    }


    // ================================================
    // Fungsi authenticate()
    // Mengecek email + password pengguna
    // ================================================
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password harus diisi.',
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            // Regenerasi session setelah login
            $request->session()->regenerate();

            // Redirect ke menu (halaman utama admin)
            return redirect('/menu')->with('success', 'Berhasil login!');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }


    // ================================================
    // Fungsi logout()
    // Menghapus session login
    // ================================================
    public function logout(Request $request)
    {
        Auth::logout(); // logout user

        // Menghapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}
