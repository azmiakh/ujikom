<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
    //
    public function showRegisterForm()
    {
        return view('administrator.register'); // Sesuaikan dengan view register yang sudah kamu buat
    }

    // Menangani proses register admin
    public function register(Request $request)
    {
        // Validasi input dari form
        $this->validator($request->all())->validate();

        // Membuat admin baru
        $this->create($request->all());

        // Redirect ke halaman login setelah berhasil register
        return redirect()->route('admin.login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Fungsi validasi input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:admins'], // Cek unique pada tabel admins
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'], // Unique pada email
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Fungsi untuk menyimpan admin baru ke database
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
