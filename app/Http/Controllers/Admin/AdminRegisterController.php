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
        return view('administrator.register'); 
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());

        return redirect()->route('admin.login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:admins'], // Cek unique pada tabel admins
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'], // Unique pada email
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

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
