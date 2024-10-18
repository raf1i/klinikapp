<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::paginate(10); 
        return view('poli.index', compact('polis'));
    }

    public function create()
    {
        return view('poli.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|integer',
        ]);

        Poli::create($validated);

        return redirect()->route('poli.index')->with('pesan', 'Poli berhasil ditambahkan!');
    }

    public function edit(Poli $poli)
    {
        return view('poli.edit', compact('poli'));
    }

    public function update(Request $request, Poli $poli)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|integer',
        ]);

        $poli->update($validated);

        return redirect()->route('poli.index')->with('pesan', 'Poli berhasil diperbarui!');
    }

    public function destroy(Poli $poli)
    {
        $poli->delete();
        return redirect()->route('poli.index')->with('pesan', 'Poli berhasil dihapus!');
    }
}
