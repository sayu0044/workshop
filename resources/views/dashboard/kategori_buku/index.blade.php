@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Daftar Kategori Buku</h1>
        <a class="btn btn-primary mb-3" href="{{ route('kategori_buku.create') }}">Tambah Kategori Buku</a>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <table class="table table-striped table-hover table-bordered custom-table">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoriBuku as $kategori)
                    <tr>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('kategori_buku.edit', $kategori->id) }}">Edit</a>
                            <form action="{{ route('kategori_buku.destroy', $kategori->id) }}" method="POST"
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
