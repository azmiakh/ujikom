<?php

namespace App\Http\Controllers;

use App\Models\LoginTable;
use Illuminate\Http\Request;

class LoginTableController extends Controller
{
    //
    public function index()
    {
        $logins = LoginTable::all();
        return view('administrator.tables.logintables.index', compact('logins'));
    }

    public function create()
    {
        return view('administrator.tables.logintables.create');
    }

    // Menyimpan data baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required',
            'nomor_pendaftaran' => 'required',
        ]);

        // Simpan data ke tabel LoginTable
        LoginTable::create([
            'name' => $request->name,
            'nomor_pendaftaran' => $request->nomor_pendaftaran,
        ]);

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form untuk edit data berdasarkan ID
    public function edit($id)
    {
        $login = LoginTable::findOrFail($id);
        return view('administrator.tables.logintables.edit', compact('login'));
    }

    // Memperbarui data di database
    public function update(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'name' => 'required|string|max:255',
            'nomor_pendaftaran' => 'required|string|max:255',
        ]);

        // Cari data login berdasarkan ID
        $login = LoginTable::findOrFail($id);

        // Update data login
        $login->update([
            'name' => $request->name,
            'nomor_pendaftaran' => $request->nomor_pendaftaran,
        ]);

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus data dari database
    public function destroy($id)
    {
        // Cari data login berdasarkan ID dan hapus
        $login = LoginTable::findOrFail($id);
        $login->delete();

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil dihapus');
    }
}
