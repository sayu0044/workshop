@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Edit Menu</h1>

        <form action="{{ route('menu.update', $menu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
            </div>

            <div class="form-group">
                <label for="link_menu">Link Menu:</label>
                <input type="text" name="link_menu" value="{{ old('link_menu', $menu->link_menu) }}" required>
            </div>

            <div class="form-group">
                <label for="icon_menu">Icon Menu (opsional):</label>
                <input type="text" name="icon_menu" value="{{ old('icon_menu', $menu->icon_menu) }}">
            </div>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
