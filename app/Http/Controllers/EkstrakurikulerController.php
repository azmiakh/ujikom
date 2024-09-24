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
        $peserta = Ekstrakurikuler::all();

        return view('administrator.tables.ekstrakurikuler.index', compact('peserta'));
    }

    public function create()
    {
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'ekskul' => 'required|string|max:50',
            'no_ortu' => 'required|string|max:15',
        ]);

        Ekstrakurikuler::create([
            'name' => $request->input('name'),
            'kelas' => $request->input('kelas'),
            'ekskul' => $request->input('ekskul'),
            'no_ortu' => $request->input('no_ortu'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil!');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);

        $peserta->delete();

        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);

        return view('administrator.tables.ekstrakurikuler.edit', compact('peserta'));
    }
}
