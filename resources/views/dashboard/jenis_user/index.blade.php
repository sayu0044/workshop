@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Daftar Jenis Pengguna</h1>
        <a class="button-link" href="{{ route('jenis_user.create') }}">Tambah Jenis Pengguna</a>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table class="custom-table">
            <thead>
                <tr>
                    <th>Nama Jenis Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenis_user as $jenis_user)
                    <tr>
                        <td>{{ $jenis_user->nama_jenis_user }}</td>
                        <td>
                            <a class="button-link" href="{{ route('jenis_user.edit', $jenis_user->id) }}">Edit</a>
                            <form action="{{ route('jenis_user.destroy', $jenis_user->id) }}" method="POST"
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
