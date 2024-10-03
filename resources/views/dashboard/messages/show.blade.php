@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Detail Pesan</h1>

        <div class="form-group">
            <label>Pengirim</label>
            <p>{{ $message->sender }}</p>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <p>{{ $message->kategori->nama_kategori ?? 'Tidak ada kategori' }}</p>
        </div>

        <div class="form-group">
            <label>Pesan</label>
            <p>{{ $message->message_text }}</p>
        </div>

        @if ($message->file)
            <div class="form-group">
                <label>File:</label>
                <a href="{{ asset('storage/' . $message->file) }}" target="_blank">Download Lampiran</a>
            </div>
        @endif

        <hr>

        <h2>Balas Pesan</h2>

        <form action="{{ route('inbox.sendReply', $message->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="message_text">Balasan</label>
                <textarea name="message_text" id="message_text" rows="5" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="file">Lampiran (Opsional)</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Kirim Balasan</button>
        </form>
    </div>
@endsection
