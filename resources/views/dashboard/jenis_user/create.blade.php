@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Tambah Jenis Pengguna</h1>

        <form action="{{ route('jenis_user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_jenis_user">Nama Jenis Pengguna:</label>
                <input type="text" name="nama_jenis_user" required>
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
