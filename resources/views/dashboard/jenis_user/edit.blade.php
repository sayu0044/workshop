@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Edit Jenis Pengguna</h1>

        <form action="{{ route('jenis_user.update', $jenis_user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_jenis_user">Nama Jenis Pengguna:</label>
                <input type="text" name="nama_jenis_user" value="{{ $jenis_user->nama_jenis_user }}" required>
            </div>

            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
