@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Compose Message</h1>

        <form action="{{ route('sent.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="receiver">Penerima</label>
                <select name="receiver" id="receiver" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->email }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="message_kategori_id">Kategori</label>
                <select name="message_kategori_id" id="message_kategori_id" class="form-control" required>
                    @foreach ($kategoriPesan as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="message_text">Pesan</label>
                <textarea name="message_text" id="message_text" rows="5" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="file">Lampiran (Optional)</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
        </form>
    </div>
@endsection
