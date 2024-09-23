<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    //
    public function showForm()
    {
        $peserta = Auth::user();
        return view('form', compact('peserta')); // ganti 'form' dengan nama file blade view form Anda
    }
    public function submitForm(Request $request)
    {
        // Validasi data form
        $request->validate([
            'name' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'nik' => 'required|integer',
            // 'nik' => 'required|digits:16',
            'golongan_darah' => 'required',
            'anak_ke' => 'required|integer',
            'total_saudara' => 'required|integer',
            'akta_kelahiran' => 'required|image',
            'kartu_keluarga' => 'file|mimes:doc,docx,pdf',
        ], [
                // 'nik.digits' => 'Nomor Induk Kependudukan (NIK) harus terdiri dari 16 digit.',
    ]);

    do {
        $registration_number = Peserta::max('registration_number') + 1;
    } while (Peserta::where('registration_number', $registration_number)->exists()); 

        $akta = $request->file('akta_kelahiran')->storeAs('public/uploads/akta', time() . '_' . $request->file('akta_kelahiran')->getClientOriginalName());
        $kk = $request->file('kartu_keluarga')->storeAs('public/uploads/kk', time() . '_' . $request->file('kartu_keluarga')->getClientOriginalName());

        // if (Peserta::where('registration_number', $registration_number)->exists()) {
        //     return redirect()->back()->withErrors('Nomor registrasi sudah ada, silakan coba dengan nomor yang lain.');
        // }

        Peserta::create([
            'name' => $request->name,
            'registration_number' => $registration_number,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat_lengkap' => $request->alamat_lengkap,
            'nik' => $request->nik,
            'golongan_darah' => $request->golongan_darah,
            'anak_ke' => $request->anak_ke,
            'total_saudara' => $request->total_saudara,
            'akta_kelahiran' => $akta,
            'kartu_keluarga' => $kk,
        ]);

        $peserta = Auth::user();
        $peserta->has_submitted_form = true;
        $peserta->save();

        return redirect()->route('dashboard')->with('success', 'Formulir berhasil dikirim!');
    }
}
