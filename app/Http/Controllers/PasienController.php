<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien; // Jangan lupa untuk mengimpor model Pasien

class PasienController extends Controller
{
    // Method untuk menampilkan data pasien
    public function index()
    {
        $pasien = Pasien::latest()->paginate(10);
        return view('pasien_index', compact('pasien'));
    }

    // Method untuk menampilkan form tambah pasien
    public function create()
    {
        return view('pasien_create');
    }

    // Method untuk menyimpan data pasien baru
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $pasien = new Pasien();
        $pasien->fill($requestData);
        $pasien->foto = $request->file('foto')->store('public'); // menyimpan file foto ke storage
        $pasien->save();

        return redirect()->route('pasien.index')->with('pesan', 'Data sudah disimpan');
    }

    // Method untuk menampilkan form edit pasien
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien_edit', compact('pasien'));
    }

    // Method untuk mengupdate data pasien
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->fill($requestData);

        if ($request->hasFile('foto')) {
            $pasien->foto = $request->file('foto')->store('public'); // update foto jika ada file baru
        }

        $pasien->save();

        return redirect()->route('pasien.index')->with('pesan', 'Data berhasil diperbarui');
    }

    // Method untuk menghapus data pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('pesan', 'Data berhasil dihapus');
    }
}
