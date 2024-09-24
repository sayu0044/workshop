@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Tambah Menu</h1>

        <form action="{{ route('menu.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" name="nama_menu" value="{{ old('nama_menu') }}" required>
            </div>

            <div class="form-group">
                <label for="link_menu">Link Menu:</label>
                <input type="text" name="link_menu" value="{{ old('link_menu') }}" required>
            </div>

            <div class="form-group">
                <label for="icon_menu">Icon Menu (opsional):</label>
                <input type="text" name="icon_menu" value="{{ old('icon_menu') }}">
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
