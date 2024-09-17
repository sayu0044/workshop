<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategoriBuku')->get();
        return view('dashboard.buku.index', compact('buku'));
    }

    public function create()
    {
        $kategoriBuku = KategoriBuku::all();
        return view('dashboard.buku.create', compact('kategoriBuku'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|unique:buku',
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori_buku_id' => 'required|exists:kategori_buku,id',
        ]);

        Buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Buku $buku)
    {
        $kategoriBuku = KategoriBuku::all();
        return view('dashboard.buku.edit', compact('buku', 'kategoriBuku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|unique:buku,kode_buku,' . $buku->id,
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori_buku_id' => 'required|exists:kategori_buku,id',
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
