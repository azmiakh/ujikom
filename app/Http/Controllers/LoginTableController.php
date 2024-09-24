<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'registration_number' => 'required',
        ]);

        LoginTable::create([
            'name' => $request->name,
            'registration_number' => $request->registration_number,
        ]);

        Peserta::create([
            'name' => $request->name,
            'registration_number' => $request->registration_number,
        ]);

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $login = LoginTable::findOrFail($id);
        return view('administrator.tables.logintables.edit', compact('login'));
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

        $peserta = Peserta::where('registration_number', $login->registration_number)->first();
        if ($peserta) {
            $peserta->update([
                'name' => $request->name,
                'registration_number' => $request->registration_number,
            ]);
        }

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $login = LoginTable::findOrFail($id);

        $peserta = Peserta::where('registration_number', $login->registration_number)->first();
        if ($peserta) {
            $peserta->delete();
        }

        $login->delete();

        return redirect()->route('admin.logintables')->with('success', 'Data berhasil dihapus');
    }
}
