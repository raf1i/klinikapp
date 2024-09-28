<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

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
        // Validasi inputan
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000', // Maksimal ukuran file 5MB
        ]);

        $pasien = new Pasien();
        $pasien->fill($requestData);

        // Proses unggah foto
        if ($request->hasFile('foto')) {
            // Simpan file di folder public/uploads/pasien
            $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/pasien'), $fileName);
            $pasien->foto = $fileName; // Simpan nama file di database
        }

        $pasien->save();

        return redirect()->route('pasien.index')->with('pesan', 'Data pasien berhasil disimpan');
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
        // Validasi inputan
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000', // Foto opsional saat update
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->fill($requestData);

        // Proses unggah foto baru (jika ada)
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pasien->foto && file_exists(public_path('uploads/pasien/' . $pasien->foto))) {
                unlink(public_path('uploads/pasien/' . $pasien->foto));
            }

            // Simpan file foto baru di folder public/uploads/pasien
            $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/pasien'), $fileName);
            $pasien->foto = $fileName;
        }

        $pasien->save();

        return redirect()->route('pasien.index')->with('pesan', 'Data pasien berhasil diperbarui');
    }

    // Method untuk menghapus data pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);

        // Hapus foto dari folder jika ada
        if ($pasien->foto && file_exists(public_path('uploads/pasien/' . $pasien->foto))) {
            unlink(public_path('uploads/pasien/' . $pasien->foto));
        }

        $pasien->delete();

        return redirect()->route('pasien.index')->with('pesan', 'Data pasien berhasil dihapus');
    }
}
