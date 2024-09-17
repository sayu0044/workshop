@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Edit Buku</h1>

        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_buku">Kode Buku:</label>
                <input type="text" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku) }}" required>
            </div>

            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang:</label>
                <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" required>
            </div>

            <div class="form-group">
                <label for="kategori_buku_id">Kategori:</label>
                <select name="kategori_buku_id" required>
                    @foreach ($kategoriBuku as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ $buku->kategori_buku_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
