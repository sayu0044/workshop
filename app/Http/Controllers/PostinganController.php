<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use App\Models\Like;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostinganController extends Controller
{
    public function index()
    {
        // Mengambil semua postingan dengan user, likes, dan komentar terkait
        $postings = Postingan::with('user', 'likes', 'komentars')->latest()->get();
        return view('dashboard.postingan.index', compact('postings'));
    }

    public function create()
    {
        return view('dashboard.postingan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_postingan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $path = null;
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('images', 'public');
            }

            Postingan::create([
                'user_id' => Auth::id(), // Menggunakan Auth::id() untuk mengambil ID user
                'nama_postingan' => $request->nama_postingan,
                'gambar' => $path,
            ]);

            return redirect()->route('postingan.index')->with('success', 'Postingan berhasil dibuat.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function edit(Postingan $postingan)
    {
        return view('dashboard.postingan.edit', compact('postingan'));
    }

    public function update(Request $request, Postingan $postingan)
    {
        $request->validate([
            'nama_postingan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $postingan->gambar = $path;
        }

        $postingan->nama_postingan = $request->nama_postingan;
        $postingan->save();

        return redirect()->route('postingan.index')->with('success', 'Postingan berhasil diperbarui.');
    }

    public function destroy(Postingan $postingan)
    {
        if ($postingan->user_id !== Auth::id()) {
            return redirect()->route('postingan.index')->withErrors(['error' => 'Anda tidak berhak menghapus postingan ini.']);
        }

        $postingan->delete();

        return redirect()->route('postingan.index')->with('success', 'Postingan berhasil dihapus.');
    }

    public function like($id)
    {
        Like::create([
            'postingan_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Anda menyukai postingan ini.');
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'nama_komentar' => 'required|string|max:255',
            'gambar_komentar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar_komentar')) {
            $path = $request->file('gambar_komentar')->store('images/comments', 'public');
        }

        Komentar::create([
            'postingan_id' => $id,
            'user_id' => Auth::id(),
            'nama_komentar' => $request->nama_komentar,
            'gambar_komentar' => $path,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
