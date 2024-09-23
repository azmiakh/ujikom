<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class FormTablesController extends Controller
{
    //
    public function index()
    {
        // Mengambil semua data dari tabel peserta (formulir)
        $peserta = Peserta::all();

        // Kirim data ke view formtables.index
        return view('administrator.tables.formtables.index', compact('peserta'));
    }
    public function create()
    {
        return view('administrator.tables.formtables.create');
    }
    
    public function destroy($id)
    {
        // Temukan peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Hapus peserta
        $peserta->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.formtables')->with('success', 'Data berhasil dihapus!');
    }

    public function edit($id)
    {
        // Mengambil data peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Menampilkan halaman edit dengan data peserta
        return view('administrator.tables.formtables.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data form
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

        // Mengambil data peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Update data peserta
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

        // Jika ada file baru untuk akta_kelahiran, upload file baru
        if ($request->hasFile('akta_kelahiran')) {
            $akta = $request->file('akta_kelahiran')->store('public/uploads/akta');
            $peserta->akta_kelahiran = $akta;
        }

        // Jika ada file baru untuk kartu_keluarga, upload file baru
        if ($request->hasFile('kartu_keluarga')) {
            $kk = $request->file('kartu_keluarga')->store('public/uploads/kk');
            $peserta->kartu_keluarga = $kk;
        }

        // Simpan perubahan
        $peserta->save();

        // Redirect ke halaman formtables dengan pesan sukses
        return redirect()->route('admin.formtables')->with('success', 'Data peserta berhasil diupdate!');
    }

    public function store(Request $request)
    {
        // Validasi input form
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

        // Simpan data ke tabel LoginTable
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
