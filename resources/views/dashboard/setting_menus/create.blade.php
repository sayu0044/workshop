@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Tambah Pengaturan Menu</h1>

        <form action="{{ route('setting_menus.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jenis_user_id">Jenis User:</label>
                <select name="jenis_user_id" required>
                    @foreach ($jenisUsers as $jenisUser)
                        <option value="{{ $jenisUser->id }}">{{ $jenisUser->nama_jenis_user }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="menus">Pilih Menu:</label>
                @foreach ($menus as $menu)
                    <div>
                        <input type="checkbox" name="menu_id[]" value="{{ $menu->id }}">
                        <label>{{ $menu->nama_menu }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection

    