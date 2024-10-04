@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Edit Postingan</h1>

        <form action="{{ route('postingan.update', $postingan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_postingan">Nama Postingan</label>
                <textarea name="nama_postingan" id="nama_postingan" class="form-control" rows="3" required>{{ old('nama_postingan', $postingan->nama_postingan) }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="gambar">Update Gambar (Optional)</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
                @if ($postingan->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $postingan->gambar) }}" class="img-fluid" alt="post image">
                        <small class="d-block mt-2">Current Image</small>
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Postingan</button>
                <a href="{{ route('postingan.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
