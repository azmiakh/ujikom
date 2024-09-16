<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function submitForm(Request $request)
    {
        // Validasi data form
        $request->validate([
            'nama_lengkap' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'nik' => 'required|integer',
            'golongan_darah' => 'required',
            'anak_ke' => 'required|integer',
            'total_saudara' => 'required|integer',
            'foto_terbaru' => 'required|image',
            'akta_kelahiran' => 'required|image',
            'kartu_keluarga' => 'required|image',
            'surat_keterangan' => 'file|mimes:doc,docx,pdf'
        ]);

        // Proses upload file
        $foto = $request->file('foto_terbaru')->store('public/uploads/foto');
        $akta = $request->file('akta_kelahiran')->store('public/uploads/akta');
        $kk = $request->file('kartu_keluarga')->store('public/uploads/kk');
        $surat = $request->file('surat_keterangan')->store('public/uploads/surat');

        // Simpan data ke tabel peserta
        Peserta::create([
            'nama_lengkap' => $request->nama_lengkap,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat_lengkap' => $request->alamat_lengkap,
            'nik' => $request->nik,
            'golongan_darah' => $request->golongan_darah,
            'anak_ke' => $request->anak_ke,
            'total_saudara' => $request->total_saudara,
            'foto_terbaru' => $foto,
            'akta_kelahiran' => $akta,
            'kartu_keluarga' => $kk,
            'surat_keterangan' => $surat,
        ]);

        return back()->with('success', 'Formulir berhasil dikirim!');
    }
}
