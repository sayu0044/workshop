@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1 class="page-heading">Lokasi Anda Saat Ini</h1>
        <div id="map" style="height: 500px; width: 100%;"></div>
    </div>

    <script>
        // Inisialisasi peta menggunakan Geoapify API
        document.addEventListener("DOMContentLoaded", function() {
            const apiKey = "{{ $geoapifyApiKey }}";
            const map = L.map('map').setView([-6.200000, 106.816666], 13); // Default view Jakarta

            // Menambahkan tile layer dari Geoapify
            L.tileLayer(`https://maps.geoapify.com/v1/tile/osm-carto/{z}/{x}/{y}.png?apiKey=${apiKey}`, {
                maxZoom: 19,
            }).addTo(map);

            // Mendapatkan lokasi pengguna dengan Geolocation API
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    // Menambahkan marker pada lokasi pengguna
                    L.marker([lat, lng]).addTo(map)
                        .bindPopup('Lokasi Anda')
                        .openPopup();

                    // Mengatur tampilan peta sesuai dengan lokasi pengguna
                    map.setView([lat, lng], 13);
                }, function(error) {
                    alert('Tidak bisa mendapatkan lokasi.');
                });
            } else {
                alert('Geolocation tidak didukung di browser Anda.');
            }
        });
    </script>

    <!-- Memasukkan stylesheet dan script untuk leaflet.js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@endsection
