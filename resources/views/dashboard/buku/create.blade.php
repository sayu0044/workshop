@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Tambah Buku</h1>

        <form action="{{ route('buku.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_buku">Kode Buku</label>
                <input type="text" id="kode_buku" name="kode_buku" required>
            </div>

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" required>
            </div>

            <div class="form-group">
                <label for="kategori_buku_id">Kategori Buku</label>
                <select id="kategori_buku_id" name="kategori_buku_id" required>
                    @foreach ($kategoriBuku as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
