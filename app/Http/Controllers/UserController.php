<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('jenisUser')->get(); // Mengambil data pengguna dengan jenis pengguna
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $jenis_user = JenisUser::all();
        return view('dashboard.users.create', compact('jenis_user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'no_hp' => 'nullable|string|max:20',
            'wa' => 'nullable|string|max:20',
            'pin' => 'nullable|string|max:6',
            'jenis_user_id' => 'required|integer',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        $jenis_user = JenisUser::all(); // Mengambil semua jenis pengguna
        return view('dashboard.users.edit', compact('user', 'jenis_user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'no_hp' => 'nullable|string|max:20',
            'wa' => 'nullable|string|max:20',
            'pin' => 'nullable|string|max:6',
            'jenis_user_id' => 'required|integer',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
