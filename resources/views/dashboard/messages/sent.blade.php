@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Pesan Terkirim</h1>
        <a class="btn btn-primary mb-3" href="{{ route('sent.create') }}">Kirim Pesan</a>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        @if ($sentMessages->isEmpty())
            <p>Tidak ada pesan yang terkirim.</p>
        @else
            <table class="table table-striped table-hover table-bordered custom-table">
                <thead>
                    <tr>
                        <th>Penerima</th>
                        <th>Subjek</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sentMessages as $message)
                        <tr>
                            <td>{{ $message->messageTo->receiver ?? 'Tidak ada penerima' }}</td> <!-- Periksa penerima -->
                            <td>{{ $message->message_text }}</td>
                            <td>{{ $message->kategori->nama_kategori ?? 'Tidak ada kategori' }}</td>
                            <td>{{ $message->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
