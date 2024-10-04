@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Create Postingan</h1>

        <form action="{{ route('postingan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_postingan">Nama Postingan</label>
                <textarea name="nama_postingan" id="nama_postingan" class="form-control" rows="3"
                    placeholder="Write your post here..." required></textarea>
            </div>

            <div class="form-group mt-3">
                <label for="gambar">Upload Gambar (Optional)</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Submit Postingan</button>
                <a href="{{ route('postingan.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
