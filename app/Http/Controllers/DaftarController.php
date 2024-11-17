<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource with search functionality.
     */
    public function index(Request $request)
    {
        // Ambil query pencarian dari input
        $query = $request->input('search');

        // Query data dengan pencarian berdasarkan nama pasien atau poli
        $daftar = Daftar::with(['pasien', 'poli'])
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->whereHas('pasien', function ($q) use ($query) {
                    $q->where('nama', 'like', '%' . $query . '%');
                })->orWhereHas('poli', function ($q) use ($query) {
                    $q->where('nama', 'like', '%' . $query . '%');
                });
            })
            ->paginate(10);

        // Kembalikan data ke view 'daftar.index'
        return view('daftar.index', compact('daftar'));
    }
    public function show($id)
    {
        // Ambil data berdasarkan ID dengan relasi pasien dan poli
        $daftar = Daftar::with(['pasien', 'poli'])->findOrFail($id);
    
        // Kirim data ke view
        return view('daftar.show', compact('daftar'));
    }    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = Pasien::all();
        $polis = Poli::all();

        // Tampilkan view create dengan data
        return view('daftar.create', compact('pasiens', 'polis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'poli_id' => 'required|exists:polis,id',
            'tanggal_daftar' => 'required|date',
            'keluhan' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Daftar::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('daftar.index')->with('success', 'Data pendaftaran berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        $pasiens = Pasien::all();
        $polis = Poli::all();

        // Tampilkan form edit dengan data
        return view('daftar.edit', compact('daftar', 'pasiens', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftar $daftar)
    {
        // Validasi input
        $validated = $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'poli_id' => 'required|exists:polis,id',
            'tanggal_daftar' => 'required|date',
            'keluhan' => 'required|string|max:255',
        ]);

        // Update data di database
        $daftar->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('daftar.index')->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftar $daftar)
    {
        // Hapus data dari database
        $daftar->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('daftar.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
