<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    // Menampilkan data pasien
    public function index(Request $request)
    {
        $query = Pasien::query();

        // Filter pencarian
        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('no_pasien', 'like', '%' . $request->search . '%');
        }

        $pasien = $query->latest()->paginate(10);

        return view('pasien_index', compact('pasien'));
    }

    // Menampilkan form tambah pasien
    public function create()
    {
        return view('pasien_create');
    }

    // Menyimpan data pasien baru
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

        if ($request->hasFile('foto')) {
            $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/pasien'), $fileName);
            $pasien->foto = $fileName;
        }

        $pasien->save();

        return redirect()->route('pasien.index')->with('pesan', 'Data pasien berhasil disimpan');
    }

    // Menampilkan form edit pasien
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien_edit', compact('pasien'));
    }

    // Mengupdate data pasien
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
            if ($pasien->foto && file_exists(public_path('uploads/pasien/' . $pasien->foto))) {
                unlink(public_path('uploads/pasien/' . $pasien->foto));
            }

            $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/pasien'), $fileName);
            $pasien->foto = $fileName;
        }

        $pasien->save();

        return redirect()->route('pasien.index')->with('pesan', 'Data pasien berhasil diperbarui');
    }

    // Menghapus data pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);

        if ($pasien->foto && file_exists(public_path('uploads/pasien/' . $pasien->foto))) {
            unlink(public_path('uploads/pasien/' . $pasien->foto));
        }

        $pasien->delete();

        return redirect()->route('pasien.index')->with('pesan', 'Data pasien berhasil dihapus');
    }
}
