<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ============================================================
    // Fungsi index()
    // ------------------------------------------------------------
    // Fungsi ini bertugas menampilkan halaman login.
    // Biasanya dipanggil dari route GET /login.
    // ============================================================
    public function index()
    {
        // Mengembalikan view login/index.blade.php
        // View ini berisi form untuk mengisi email dan password.
        return view('login.index');
    }


    // ============================================================
    // Fungsi authenticate()
    // ------------------------------------------------------------
    // Fungsi ini dipanggil saat user menekan tombol "Login".
    // Tugasnya:
    // 1. Memvalidasi input email & password
    // 2. Mengecek apakah user ada di database (Auth::attempt)
    // 3. Membuat session login jika berhasil
    // 4. Mengembalikan error jika gagal login
    // ============================================================
    public function authenticate(Request $request)
    {
        // --------------------------------------------------------
        // VALIDASI INPUT
        // --------------------------------------------------------
        // validate() akan otomatis:
        // - Mengecek apakah input sesuai aturan
        // - Jika gagal, otomatis kembali ke halaman sebelumnya
        // - Menampilkan error ke blade melalui $errors
        $credentials = $request->validate([
            'email' => 'required|email',   // email wajib & harus format email
            'password' => 'required'       // password wajib diisi
        ], [
            // Pesan error custom
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password harus diisi.',
        ]);

        // --------------------------------------------------------
        // PROSES LOGIN
        // --------------------------------------------------------
        // Auth::attempt():
        // - Mencocokkan email & password ke database
        // - Password akan dicocokkan dengan Hash::check()
        // Jika berhasil → otomatis membuat session login
        if (Auth::attempt($credentials)) {

            // ----------------------------------------------------
            // REGENERASI SESSION
            // ----------------------------------------------------
            // Langkah keamanan penting untuk mencegah session fixation.
            $request->session()->regenerate();

            // Redirect ke halaman /menu setelah login berhasil
            return redirect('/menu')->with('success', 'Berhasil login!');
        }

        // --------------------------------------------------------
        // Jika login gagal
        // --------------------------------------------------------
        // back() → kembali ke halaman sebelumnya
        // withErrors() → mengirim pesan error ke blade
        // onlyInput('email') → mengisi ulang field email agar tidak kosong
        return back()->withErrors([
            'email' => 'Email atau password salah.',  // pesan error
        ])->onlyInput('email');
    }


    // ============================================================
    // Fungsi logout()
    // ------------------------------------------------------------
    // Digunakan untuk menghapus session login user
    // dan mengembalikan ke halaman login.
    // ============================================================
    public function logout(Request $request)
    {
        // Mengeluarkan user dari sistem
        Auth::logout();

        // Menghapus seluruh session
        // invalidate() → menghapus session lama
        $request->session()->invalidate();

        // regenerateToken() → membuat CSRF token baru
        // supaya session tetap aman setelah logout
        $request->session()->regenerateToken();

        // Kembali ke halaman login
        return redirect('/login');
    }
}
