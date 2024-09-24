@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Tambah Pengguna</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" name="no_hp">
            </div>

            <div class="form-group">
                <label for="wa">WhatsApp:</label>
                <input type="text" name="wa">
            </div>

            <div class="form-group">
                <label for="pin">PIN:</label>
                <input type="text" name="pin">
            </div>

            <div class="form-group">
                <label for="jenis_user_id">Jenis Pengguna:</label>
                <select name="jenis_user_id" required>
                    <option value="">Pilih Jenis Pengguna</option>
                    @foreach ($jenis_user as $jenis_user)
                        <option value="{{ $jenis_user->id }}">{{ $jenis_user->nama_jenis_user }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
