@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Informasi Gempa Terkini</h1>

        @if (isset($dataGempa['Infogempa']['gempa']))
            @php
                $gempa = $dataGempa['Infogempa']['gempa'];
            @endphp
            <div class="card">
                <div class="card-body">
                    <h4>{{ $gempa['Tanggal'] }} - {{ $gempa['Jam'] }}</h4>
                    <p><strong>Magnitudo:</strong> {{ $gempa['Magnitude'] }}</p>
                    <p><strong>Kedalaman:</strong> {{ $gempa['Kedalaman'] }}</p>
                    <p><strong>Wilayah:</strong> {{ $gempa['Wilayah'] }}</p>
                    <p><strong>Potensi:</strong> {{ $gempa['Potensi'] }}</p>
                    <p><strong>Koordinat:</strong> {{ $gempa['Lintang'] }}, {{ $gempa['Bujur'] }}</p>
                    <img src="https://data.bmkg.go.id/DataMKG/TEWS/{{ $gempa['Shakemap'] }}" alt="Shakemap" class="img-fluid">
                </div>
            </div>
        @else
            <p>Tidak ada data gempa saat ini.</p>
        @endif
    </div>
@endsection
