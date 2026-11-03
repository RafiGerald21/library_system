<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Wajib di-import untuk fitur Autentikasi Laravel

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses kredensial pengguna saat menekan tombol Login
    public function login(Request $request)
    {
        // 1. Validasi inputan form
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // 2. Cek apakah email dan password cocok di database
        if (Auth::attempt($credentials)) {
            // Mencegah serangan Session Fixation dengan meregenerasi ID sesi
            $request->session()->regenerate();

            // Direct ke halaman yang dituju sebelumnya, atau ke daftar buku secara default
            return redirect()->intended(route('books.index'));
        }

        // 3. Jika gagal, kembalikan ke form login beserta pesan kesalahan
        return back()
            ->withErrors([
                'email' => 'Email atau password tidak sesuai.',
            ])
            ->onlyInput('email');
    }

    // Memproses keluar sistem (Logout)
    public function logout(Request $request)
    {
        Auth::logout(); // Mengakhiri autentikasi pengguna

        $request->session()->invalidate(); // Batalkan sesi
        $request->session()->regenerateToken(); // Buat token CSRF baru demi keamanan

        return redirect()->route('login');
    }
}