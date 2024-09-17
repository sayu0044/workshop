@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Edit Kategori Buku</h1>

        <form action="{{ route('kategori_buku.update', $kategoriBuku->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label>
                <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategoriBuku->nama_kategori) }}"
                    required>
            </div>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
