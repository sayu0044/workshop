@extends('dashboard.layout.main')
@section('container')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Halo {{ $user->name }}</h3>
                            <p class="font-weight-normal mb-0">Selamat datang di dashboard! Berikut adalah ringkasan
                                aktivitas Anda.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik & Grafik -->
            <div class="row">
                <!-- Card Statistik Pesan -->
                <div class="col-md-3 stretch-card grid-margin">
                    <div class="card" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                        <div class="card-body d-flex flex-column align-items-start justify-content-center">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope fa-3x text-white mr-3"></i>
                                <div>
                                    <h4 class="card-title text-white">Total Pesan</h4>
                                </div>
                            </div>
                            <p class="text-white">Pesan terkirim: {{ $totalSentMessages }}</p>
                            <p class="text-white">Pesan diterima: {{ $totalReceivedMessages }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Statistik Buku -->
                <div class="col-md-3 stretch-card grid-margin">
                    <div class="card" style="background: linear-gradient(135deg, #3a7bd5 0%, #3a6073 100%);">
                        <div class="card-body d-flex flex-column align-items-start justify-content-center">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-book fa-3x text-white mr-3"></i>
                                <div>
                                    <h4 class="card-title text-white">Total Buku & Kategori</h4>
                                </div>
                            </div>
                            <p class="text-white">Jumlah Buku: {{ $totalBooks }}</p>
                            <p class="text-white">Jumlah Kategori: {{ $totalCategories }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Statistik Pengguna -->
                <div class="col-md-3 stretch-card grid-margin">
                    <div class="card" style="background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);">
                        <div class="card-body d-flex flex-column align-items-start justify-content-center">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-users fa-3x text-white mr-3"></i>
                                <div>
                                    <h4 class="card-title text-white">Pengguna Terdaftar</h4>
                                </div>
                            </div>
                            <p class="text-white">Total Pengguna: {{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Statistik Menu dan Setting Menu -->
                <div class="col-md-3 stretch-card grid-margin">
                    <div class="card" style="background: linear-gradient(135deg, #f7797d 0%, #FBD786 100%);">
                        <div class="card-body d-flex flex-column align-items-start justify-content-center">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-cog fa-3x text-white mr-3"></i>
                                <div>
                                    <h4 class="card-title text-white">Menu & Setting</h4>
                                </div>
                            </div>
                            <p class="text-white">Total Menu: {{ $totalMenus }}</p>
                            <p class="text-white">Setting Menu: {{ $totalSettingMenus }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Statistik Jenis User -->
                <div class="col-md-3 stretch-card grid-margin">
                    <div class="card" style="background: linear-gradient(135deg, #ff512f 0%, #dd2476 100%);">
                        <div class="card-body d-flex flex-column align-items-start justify-content-center">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-user-tag fa-3x text-white mr-3"></i>
                                <div>
                                    <h4 class="card-title text-white">Jenis Pengguna</h4>
                                </div>
                            </div>
                            <p class="text-white">Jumlah Jenis Pengguna: {{ $totalJenisUsers }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Statistik Postingan -->
                <div class="col-md-3 stretch-card grid-margin">
                    <div class="card" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                        <div class="card-body d-flex flex-column align-items-start justify-content-center">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-edit fa-3x text-white mr-3"></i>
                                <div>
                                    <h4 class="card-title text-white">Total Postingan</h4>
                                </div>
                            </div>
                            <p class="text-white">Jumlah Postingan: {{ $totalPostingan }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Aktivitas Pesan -->
            <div class="row">
                <div class="col-md-12">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <!-- Script untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pesan Terkirim', 'Pesan Diterima', 'Buku', 'Kategori Buku', 'Pengguna', 'Menu',
                    'Setting Menu', 'Jenis Pengguna', 'Postingan'
                ],
                datasets: [{
                    label: 'Aktivitas',
                    data: [{{ $totalSentMessages }}, {{ $totalReceivedMessages }}, {{ $totalBooks }},
                        {{ $totalCategories }}, {{ $totalUsers }}, {{ $totalMenus }},
                        {{ $totalSettingMenus }}, {{ $totalJenisUsers }}, {{ $totalPostingan }}
                    ],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)',
                        'rgba(201, 203, 207, 0.2)', 'rgba(255, 205, 86, 0.2)', 'rgba(128, 0, 128, 0.2)'
                    ],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)',
                        'rgba(201, 203, 207, 1)', 'rgba(255, 205, 86, 1)', 'rgba(128, 0, 128, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 2
            }
        });
    </script>
@endsection
