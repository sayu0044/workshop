@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Daftar Postingan</h1>

        <!-- Tombol untuk membuat postingan -->
        <a href="{{ route('postingan.create') }}" class="btn btn-primary mb-3">Buat Postingan</a>

        @foreach ($postings as $postingan)
            <div class="card mb-4">
                <div class="card-body">
                    <h5>{{ $postingan->user->name }}</h5>
                    <p>{{ $postingan->nama_postingan }}</p>
                    @if ($postingan->gambar)
                        <div class="mt-2">
                            <!-- Perbesar gambar postingan -->
                            <img src="{{ asset('storage/' . $postingan->gambar) }}" class="img-fluid" style="max-width: 500px;"
                                alt="Post Image">
                        </div>
                    @endif

                    <!-- Like and Comment Section -->
                    <div class="mt-3">
                        <form action="{{ route('postingan.like', $postingan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-thumbs-up"></i> Like ({{ $postingan->likes->count() }})
                            </button>
                        </form>

                        <button class="btn btn-secondary btn-sm" type="button" data-toggle="collapse"
                            data-target="#comments-{{ $postingan->id }}" aria-expanded="false"
                            aria-controls="comments-{{ $postingan->id }}">
                            Komentar ({{ $postingan->komentars->count() }})
                        </button>

                        <!-- Tampilkan tombol edit hanya jika pengguna adalah pemilik postingan -->
                        @if ($postingan->user_id === auth()->user()->id)
                            <a href="{{ route('postingan.edit', $postingan->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('postingan.destroy', $postingan->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin ingin menghapus postingan ini?')">Hapus</button>
                            </form>
                        @endif
                    </div>

                    <!-- Komentar Collapse -->
                    <div class="collapse mt-3" id="comments-{{ $postingan->id }}">
                        <!-- Tampilkan Komentar -->
                        <h6>Komentar:</h6>
                        @foreach ($postingan->komentars as $komentar)
                            <div class="border-bottom mb-2">
                                <strong>{{ $komentar->user->name }}</strong>:
                                <p>{{ $komentar->nama_komentar }}</p>
                                @if ($komentar->gambar_komentar)
                                    <!-- Perbesar gambar komentar -->
                                    <img src="{{ asset('storage/' . $komentar->gambar_komentar) }}" class="img-fluid"
                                        style="max-width: 350px; margin-bottom: 20px;" alt="Post Image">
                                @endif
                            </div>
                        @endforeach

                        <form action="{{ route('postingan.comment', $postingan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea name="nama_komentar" class="form-control" rows="2" placeholder="Tulis komentar..." required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="gambar_komentar">Upload Gambar (Optional):</label>
                                <input type="file" name="gambar_komentar" class="form-control-file">
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Kirim Komentar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
