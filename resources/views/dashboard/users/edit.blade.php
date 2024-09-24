@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Edit Pengguna</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" name="no_hp" value="{{ $user->no_hp }}">
            </div>

            <div class="form-group">
                <label for="wa">WhatsApp:</label>
                <input type="text" name="wa" value="{{ $user->wa }}">
            </div>

            <div class="form-group">
                <label for="pin">PIN:</label>
                <input type="text" name="pin" value="{{ $user->pin }}">
            </div>

            <div class="form-group">
                <label for="jenis_user_id">Jenis Pengguna:</label>
                <select name="jenis_user_id" required>
                    @foreach ($jenis_user as $jenis_user)
                        <option value="{{ $jenis_user->id }}"
                            {{ $user->jenis_user_id == $jenis_user->id ? 'selected' : '' }}>
                            {{ $jenis_user->nama_jenis_user }}
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
