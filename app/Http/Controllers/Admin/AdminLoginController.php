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

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {

            return redirect()->intended(route('administrator.dashboard'));
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
