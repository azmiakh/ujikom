<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class FormTablesController extends Controller
{
    //
    public function index()
    {
        $peserta = Peserta::all();

        return view('administrator.tables.formtables.index', compact('peserta'));
    }
    public function create()
    {
        return view('administrator.tables.formtables.create');
    }
    
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);

        $peserta->delete();

        return redirect()->route('admin.formtables')->with('success', 'Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);

        return view('administrator.tables.formtables.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'nik' => 'required|integer',
            'golongan_darah' => 'required',
            'anak_ke' => 'required|integer',
            'total_saudara' => 'required|integer',
            'akta_kelahiran' => 'nullable|image',
            'kartu_keluarga' => 'nullable|file|mimes:doc,docx,pdf',
        ]);

        $peserta = Peserta::findOrFail($id);

        $peserta->update($request->only(
            'name',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama',
            'alamat_lengkap',
            'nik',
            'golongan_darah',
            'anak_ke',
            'total_saudara'
        ));

        if ($request->hasFile('akta_kelahiran')) {
            $akta = $request->file('akta_kelahiran')->store('public/uploads/akta');
            $peserta->akta_kelahiran = $akta;
        }

        if ($request->hasFile('kartu_keluarga')) {
            $kk = $request->file('kartu_keluarga')->store('public/uploads/kk');
            $peserta->kartu_keluarga = $kk;
        }

        $peserta->save();

        return redirect()->route('admin.formtables')->with('success', 'Data peserta berhasil diupdate!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanggal_lahir'  => 'required',
            'jenis_kelamin'  => 'required',
            'agama'  => 'required',
            'alamat_lengkap'  => 'required',
            'nik'  => 'required',
            'golongan_darah'  => 'required',
            'anak_ke'  => 'required',
            'total_saudara'  => 'required'
        ]);

        Peserta::create([
            'name' => $request->name,
            'registration_number' => '111111',
            'tanggal_lahir'  => $request->tanggal_lahir,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'agama'  => $request->agama,
            'alamat_lengkap'  => $request->alamat_lengkap,
            'nik'  => $request->nik,
            'golongan_darah'  => $request->golongan_darah,
            'anak_ke'  => $request->anak_ke,
            'total_saudara'  => $request->total_saudara
        ]);

        return redirect()->route('admin.formtables')->with('success', 'Data berhasil ditambahkan');
    }


}
