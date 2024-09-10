<?php

namespace App\Http\Controllers\Auth;

use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'registration_number' => 'required|string',
        ]);

        $peserta = Peserta::where('name', $request->input('name'))
                            ->where('registration_number', $request->input('registration_number'))
                            ->first();

        if ($peserta) {
            Auth::login($peserta);
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withErrors([
            'login_error' => 'Nama lengkap atau nomor pendaftaran tidak sesuai.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
