<?php

namespace App\Http\Controllers\Auth;

use App\Models\Peserta;
use App\Models\LoginTable;
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

            LoginTable::create([
                'name' => $request->input('name'),
                'registration_number' => $request->input('registration_number'),
            ]);

            return redirect()->intended('/form');
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

    public function create()
    {
        return view('admin.create-logintable');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
        ]);

        LoginTable::create([
            'name' => $request->name,
            'registration_number' => $request->registration_number,
        ]);

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $login = LoginTable::findOrFail($id);
        return view('admin.edit-logintable', compact('login'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
        ]);

        $login = LoginTable::findOrFail($id);
        $login->update([
            'name' => $request->name,
            'registration_number' => $request->registration_number,
        ]);

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $login = LoginTable::findOrFail($id);
        $login->delete();

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil dihapus');
    }
}
