@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Edit Setting Menu</h1>

        <form action="{{ route('setting_menus.update', $settingMenu[0]->jenis_user_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="jenis_user_id">Jenis User:</label>
                <select name="jenis_user_id" id="jenis_user_id" required>
                    @foreach ($jenisUsers as $jenisUser)
                        <option value="{{ $jenisUser->id }}"
                            {{ $jenisUser->id == $settingMenu[0]->jenis_user_id ? 'selected' : '' }}>
                            {{ $jenisUser->nama_jenis_user }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="menu_id">Menu:</label><br>
                @foreach ($menus as $menu)
                    <label>
                        <input type="checkbox" name="menu_id[]" value="{{ $menu->id }}"
                            {{ in_array($menu->id, $selectedMenus) ? 'checked' : '' }}> {{ $menu->nama_menu }}
                    </label><br>
                @endforeach
            </div>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
