<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategoriBuku = KategoriBuku::all();
        return view('dashboard.kategori_buku.index', compact('kategoriBuku'));
    }

    public function create()
    {
        return view('dashboard.kategori_buku.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required',
        ]);

        KategoriBuku::create($validated);

        return redirect()->route('kategori_buku.index')->with('success', 'Kategori Buku berhasil ditambahkan');
    }

    public function edit(KategoriBuku $kategoriBuku)
    {
        return view('dashboard.kategori_buku.edit', compact('kategoriBuku'));
    }

    public function update(Request $request, KategoriBuku $kategoriBuku)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategoriBuku->update($validated);

        return redirect()->route('kategori_buku.index')->with('success', 'Kategori Buku berhasil diupdate');
    }

    public function destroy(KategoriBuku $kategoriBuku)
    {
        $kategoriBuku->delete();

        return redirect()->route('kategori_buku.index')->with('success', 'Kategori Buku berhasil dihapus');
    }
}
