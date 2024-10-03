@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Inbox</h1>
        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        @if ($receivedMessages->isEmpty())
            <p>Tidak ada pesan di Inbox.</p>
        @else
            <table class="table table-striped table-hover table-bordered custom-table">
                <thead>
                    <tr>
                        <th>Pengirim</th>
                        <th>Pesan</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receivedMessages as $messageTo)
                        <tr>
                            <td>{{ $messageTo->message->sender }}</td>
                            <td>
                                {{ $messageTo->message->message_text }}
                            </td>
                            <td>{{ $messageTo->message->kategori->nama_kategori ?? 'Tidak ada kategori' }}</td>
                            <td>{{ $messageTo->message->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('inbox.show', $messageTo->message->id) }}">Detail</a>
                                <form action="{{ route('inbox.destroy', $messageTo->message->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
