<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('administrator.login'); // View yang sudah kamu buat
    }

    // Fungsi untuk proses login admin
    public function login(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Kredensial untuk autentikasi
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        // Proses login dengan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Redirect ke dashboard admin jika berhasil login
            return redirect()->intended(route('administrator.dashboard'));
        }

        // Kembali ke halaman login jika gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username', 'remember'));
    }

    // Fungsi untuk logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
