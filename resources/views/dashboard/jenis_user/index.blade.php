@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Daftar Jenis Pengguna</h1>
        <a class="btn btn-primary mb-3" href="{{ route('jenis_user.create') }}">Tambah Jenis Pengguna</a>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table class="table table-striped table-hover table-bordered custom-table">
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
                            <a class="btn btn-primary btn-sm" href="{{ route('jenis_user.edit', $jenis_user->id) }}">Edit</a>
                            <form action="{{ route('jenis_user.destroy', $jenis_user->id) }}" method="POST"
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
