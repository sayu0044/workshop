@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Daftar Pengaturan Menu</h1>
        <a class="button-link" href="{{ route('setting_menus.create') }}">Tambah Pengaturan Menu</a>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table class="custom-table">
            <thead>
                <tr>
                    <th>Jenis User</th>
                    <th>Menu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settingMenus as $setting)
                    <tr>
                        <td>{{ $setting->jenisUser->nama_jenis_user }}</td>
                        <!-- Pastikan ini sesuai dengan field di model JenisUser -->
                        <td>
                            {{ $setting->menu->nama_menu ?? 'Tidak ada menu' }}
                            <!-- Menggunakan null coalescing operator -->
                        </td>
                        <td>
                            <a class="button-link" href="{{ route('setting_menus.edit', $setting->id) }}">Edit</a>
                            <form action="{{ route('setting_menus.destroy', $setting->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="form-group button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
