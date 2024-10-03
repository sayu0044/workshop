@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Daftar Pengaturan Menu</h1>
        <a class="btn btn-primary mb-3" href="{{ route('setting_menus.create') }}">Tambah Pengaturan Menu</a>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table class="table table-striped table-hover table-bordered custom-table">
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
                        <td>{{ $setting->menu->nama_menu ?? 'Tidak ada menu' }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('setting_menus.edit', $setting->id) }}">Edit</a>
                            <form action="{{ route('setting_menus.destroy', $setting->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
