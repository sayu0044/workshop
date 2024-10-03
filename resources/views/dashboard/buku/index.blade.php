@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Daftar Buku</h1>
        <a class="btn btn-primary mb-3" href="{{ route('buku.create') }}">Tambah Buku</a>
        <table class="table table-striped table-hover table-bordered custom-table">
            <thead>
                <tr>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $b)
                    <tr>
                        <td>{{ $b->kode_buku }}</td>
                        <td>{{ $b->judul }}</td>
                        <td>{{ $b->pengarang }}</td>
                        <td>{{ $b->kategoriBuku->nama_kategori }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('buku.edit', $b->id) }}">Edit</a>
                            <form action="{{ route('buku.destroy', $b->id) }}" method="POST" style="display:inline;">
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
