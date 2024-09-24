@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Daftar Menu</h1>

        @if (auth()->user()->jenis_user_id == 1)
            <!-- Check if the user is an admin -->
            <a class="button-link" href="{{ route('menu.create') }}">Tambah Menu</a>
        @endif

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table class="custom-table">
            <thead>
                <tr>
                    <th>Nama Menu</th>
                    <th>Link Menu</th>
                    <th>Icon Menu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->link_menu }}</td>
                        <td>{{ $menu->icon_menu ?? 'Tidak Ada Icon' }}</td>
                        <td>
                            @if (auth()->user()->jenis_user_id == 1)
                                <!-- Check if the user is an admin -->
                                <a class="button-link" href="{{ route('menu.edit', $menu->id) }}">Edit</a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="form-group button">Hapus</button>
                                </form>
                            @else
                                <!-- Optionally, show a message or disable buttons for non-admin users -->
                                <span>Access Denied</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
