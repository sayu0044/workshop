@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Tambah Kategori Buku</h1>

        <form action="{{ route('kategori_buku.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label>
                <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
