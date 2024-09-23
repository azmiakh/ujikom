<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    //


    public function index()
    {
        // Mengambil semua data dari tabel peserta (formulir)
        $peserta = Ekstrakurikuler::all();

        // Kirim data ke view formtables.index
        return view('administrator.tables.ekstrakurikuler.index', compact('peserta'));
    }

    public function create()
    {
        // Daftar ekstrakurikuler
        $ekskul = [
            'Pramuka', 
            'Pencak Silat', 
            'Tari Tradisional', 
            'Paduan Suara', 
            'Melukis atau Menggambar', 
            'Sepak Bola', 
            'Badminton', 
            'Dokter Kecil', 
            'English Club', 
            'Paskibra'
        ];

        return view('ekstrakurikuler', compact('ekskul'));
    }

    // Menyimpan data dari form pendaftaran
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'ekskul' => 'required|string|max:50',
            'no_ortu' => 'required|string|max:15',
        ]);

        // Simpan data ke database
        Ekstrakurikuler::create([
            'name' => $request->input('name'),
            'kelas' => $request->input('kelas'),
            'ekskul' => $request->input('ekskul'),
            'no_ortu' => $request->input('no_ortu'),
        ]);

        // Redirect ke halaman sukses atau berikan feedback
        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil!');
    }

    public function destroy($id)
    {
        // Temukan peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Hapus peserta
        $peserta->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Data berhasil dihapus!');
    }

    public function edit($id)
    {
        // Mengambil data peserta berdasarkan ID
        $peserta = Peserta::findOrFail($id);

        // Menampilkan halaman edit dengan data peserta
        return view('administrator.tables.ekstrakurikuler.edit', compact('peserta'));
    }
}
