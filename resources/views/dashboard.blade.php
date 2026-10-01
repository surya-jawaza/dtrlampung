@extends('layouts.app')

@section('title', 'Dashboard DTR Lampung')

@section('content')

<div class="dashboard">

    {{-- HEADER --}}
    <div class="dashboard-header">
        <div>
            <div class="organization-name">DTR LAMPUNG</div>
            <h1>Dashboard</h1>
            <p>Ringkasan data dan aktivitas organisasi</p>
        </div>
    </div>


    {{-- STATISTIK --}}
    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div>
                <div class="stat-label">Total Anggota</div>
                <div class="stat-number">{{ $jumlahAnggota }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">🧑‍💼</div>
            <div>
                <div class="stat-label">Total Pengurus</div>
                <div class="stat-number">{{ $jumlahPengurus }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">💛</div>
            <div>
                <div class="stat-label">Total Donatur</div>
                <div class="stat-number">{{ $jumlahDonatur }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📅</div>
            <div>
                <div class="stat-label">Total Kegiatan</div>
                <div class="stat-number">{{ $jumlahKegiatan }}</div>
            </div>
        </div>

    </div>


    {{-- GRAFIK --}}
    <div class="charts-grid">

        {{-- GRAFIK JENJANG TRAINING --}}
        <div class="dashboard-card chart-card">

            <div class="card-header">
                <div>
                    <h2>Jenjang Training Anggota</h2>
                    <p>Distribusi anggota berdasarkan jenjang training</p>
                </div>
            </div>

            <div class="training-layout">

                <div class="training-chart">
                    <canvas id="trainingChart"></canvas>
                </div>

                <div class="training-legend">

                    @forelse ($anggotaTraining as $training)

                        <div class="training-item">
                            <span class="training-color"></span>

                            <span class="training-name">
                                {{ $training->jenjang_training }}
                            </span>

                            <span class="training-count">
                                : {{ $training->jumlah }}
                            </span>
                        </div>

                    @empty

                        <div class="empty-state">
                            Belum ada data training.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- GRAFIK PENAMBAHAN ANGGOTA --}}
        <div class="dashboard-card chart-card">

            <div class="card-header">
                <div>
                    <h2>Penambahan Anggota</h2>
                    <p>Jumlah anggota baru berdasarkan bulan</p>
                </div>
            </div>

            <div class="chart-container">
                <canvas id="anggotaChart"></canvas>
            </div>

        </div>

    </div>


    {{-- DATA TERBARU --}}
    <div class="latest-grid">

        {{-- ANGGOTA TERBARU --}}
        <div class="dashboard-card">

            <div class="card-header">
                <div>
                    <h2>Anggota Terbaru</h2>
                    <p>Data anggota yang terakhir ditambahkan</p>
                </div>

                <a href="{{ route('anggota.index') }}" class="view-all">
                    Lihat semua
                </a>
            </div>

            <div class="latest-list">

                @forelse ($anggotaTerbaru as $anggota)

                    <div class="latest-item">

                        <div class="latest-photo">

                            @if ($anggota->foto)

                                <img
                                    src="{{ asset('storage/' . $anggota->foto) }}"
                                    alt="{{ $anggota->nama_lengkap }}"
                                >

                            @else

                                <div class="photo-placeholder">
                                    👤
                                </div>

                            @endif

                        </div>

                        <div class="latest-info">

                            <div class="latest-name">
                                {{ $anggota->nama_lengkap }}
                            </div>

                            <div class="latest-meta">
                                {{ $anggota->jenjang_training }}
                            </div>

                        </div>

                        <div>
                            <span class="status-badge">
                                {{ $anggota->status }}
                            </span>
                        </div>

                    </div>

                @empty

                    <div class="empty-state">
                        Belum ada data anggota.
                    </div>

                @endforelse

            </div>

        </div>


        {{-- KEGIATAN TERBARU --}}
        <div class="dashboard-card">

            <div class="card-header">
                <div>
                    <h2>Kegiatan Terbaru</h2>
                    <p>Kegiatan yang terakhir ditambahkan</p>
                </div>

                <a href="{{ route('kegiatan.index') }}" class="view-all">
                    Lihat semua
                </a>
            </div>

            <div class="activity-list">

                @forelse ($kegiatanTerbaru as $kegiatan)

                    <div class="activity-item">

                        <div class="activity-photo">

                            @if ($kegiatan->foto_utama)

                                <img
                                    src="{{ asset('storage/' . $kegiatan->foto_utama) }}"
                                    alt="{{ $kegiatan->judul_kegiatan }}"
                                >

                            @else

                                <div class="activity-placeholder">
                                    📅
                                </div>

                            @endif

                        </div>

                        <div class="activity-info">

                            <div class="activity-title">
                                {{ $kegiatan->judul_kegiatan }}
                            </div>

                            <div class="activity-meta">
                                {{ $kegiatan->tanggal->format('d M Y') }}
                                ·
                                {{ $kegiatan->lokasi }}
                            </div>

                        </div>

                        <a
                            href="{{ route('kegiatan.show', $kegiatan->id) }}"
                            class="activity-link"
                        >
                            Lihat
                        </a>

                    </div>

                @empty

                    <div class="empty-state">
                        Belum ada kegiatan.
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>


{{-- CHART.JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    // =========================================
    // GRAFIK JENJANG TRAINING
    // =========================================

    const trainingCanvas = document.getElementById('trainingChart');

    if (trainingCanvas) {

        const trainingData = @json($anggotaTraining);

        const trainingColors = [
            '#ffc50b',
            '#ffd84d',
            '#ffe88a',
            '#f5b700',
            '#e6a900',
            '#172554'
        ];

        new Chart(trainingCanvas, {

            type: 'doughnut',

            data: {

                labels: trainingData.map(item => item.jenjang_training),

                datasets: [{

                    data: trainingData.map(item => item.jumlah),

                    backgroundColor: trainingColors,

                    borderWidth: 0

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '68%',

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        callbacks: {

                            label: function(context) {

                                const label = context.label || '';
                                const value = context.parsed || 0;

                                return label + ': ' + value + ' anggota';

                            }

                        }

                    }

                }

            }

        });

    }


    // =========================================
    // GRAFIK PENAMBAHAN ANGGOTA
    // =========================================

    const anggotaCanvas = document.getElementById('anggotaChart');

    if (anggotaCanvas) {

        const anggotaData = @json($penambahanAnggota);

        new Chart(anggotaCanvas, {

            type: 'line',

            data: {

                labels: anggotaData.map(item => item.bulan),

                datasets: [{

                    label: 'Anggota Baru',

                    data: anggotaData.map(item => item.jumlah),

                    borderColor: '#ffc50b',

                    backgroundColor: 'rgba(255, 197, 11, 0.12)',

                    borderWidth: 3,

                    fill: true,

                    tension: 0.35,

                    pointRadius: 4,

                    pointHoverRadius: 6,

                    pointBackgroundColor: '#ffc50b',

                    pointBorderColor: '#172554',

                    pointBorderWidth: 2

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        callbacks: {

                            label: function(context) {

                                return 'Anggota baru: ' + context.parsed.y;

                            }

                        }

                    }

                },

                scales: {

                    x: {

                        grid: {
                            display: false
                        },

                        ticks: {
                            color: '#64748b'
                        }

                    },

                    y: {

                        beginAtZero: true,

                        ticks: {
                            precision: 0,
                            color: '#64748b'
                        },

                        grid: {
                            color: '#eef0f3'
                        }

                    }

                }

            }

        });

    }

</script>


<style>

    * {
        box-sizing: border-box;
    }

    .dashboard {
        max-width: 1500px;
        margin: 0 auto;
    }


    /* =========================
       HEADER
       ========================= */

    .dashboard-header {
        margin-bottom: 28px;
    }

    .organization-name {
        color: #b77900;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 6px;
    }

    .dashboard-header h1 {
        margin: 0;
        color: #172554;
        font-size: 30px;
        font-weight: 700;
    }

    .dashboard-header p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 14px;
    }


    /* =========================
       STATISTICS
       ========================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: white;
        border: 1px solid #e8ebf0;
        border-radius: 14px;
        padding: 22px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #fff8df;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .stat-label {
        color: #64748b;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .stat-number {
        color: #172554;
        font-size: 26px;
        font-weight: 700;
    }


    /* =========================
       CARD
       ========================= */

    .dashboard-card {
        background: white;
        border: 1px solid #e8ebf0;
        border-radius: 14px;
        padding: 22px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
    }

    .chart-card {
        min-width: 0;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
    }

    .card-header h2 {
        margin: 0;
        color: #172554;
        font-size: 17px;
        font-weight: 700;
    }

    .card-header p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .view-all {
        color: #b77900;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
    }

    .view-all:hover {
        text-decoration: underline;
    }


    /* =========================
       GRAFIK
       ========================= */

    .charts-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }

    .chart-container {
        position: relative;
        width: 100%;
        height: 280px;
    }


    /* =========================
       TRAINING
       ========================= */

    .training-layout {
        display: flex;
        align-items: center;
        gap: 15px;
        height: 280px;
        width: 100%;
    }

    .training-chart {
        position: relative;
        flex: 1;
        min-width: 0;
        height: 250px;
    }

    .training-legend {
        width: 42%;
        flex-shrink: 0;
    }

    .training-item {
        display: grid;
        grid-template-columns: 10px 1fr auto;
        align-items: center;
        gap: 7px;
        padding: 9px 0;
        border-bottom: 1px solid #eef0f3;
        font-size: 12px;
    }

    .training-item:last-child {
        border-bottom: none;
    }

    .training-color {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #ffc50b;
    }

    .training-item:nth-child(2) .training-color {
        background: #ffd84d;
    }

    .training-item:nth-child(3) .training-color {
        background: #ffe88a;
    }

    .training-item:nth-child(4) .training-color {
        background: #f5b700;
    }

    .training-item:nth-child(5) .training-color {
        background: #e6a900;
    }

    .training-item:nth-child(6) .training-color {
        background: #172554;
    }

    .training-name {
        color: #475569;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .training-count {
        color: #172554;
        font-weight: 700;
        white-space: nowrap;
    }


    /* =========================
       LATEST
       ========================= */

    .latest-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .latest-list,
    .activity-list {
        display: flex;
        flex-direction: column;
    }

    .latest-item,
    .activity-item {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 13px 0;
        border-bottom: 1px solid #eef0f3;
    }

    .latest-item:last-child,
    .activity-item:last-child {
        border-bottom: none;
    }


    /* =========================
       MEMBER PHOTO
       ========================= */

    .latest-photo {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .latest-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .photo-placeholder {
        width: 100%;
        height: 100%;
        background: #fff8df;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }


    /* =========================
       MEMBER INFO
       ========================= */

    .latest-info {
        flex: 1;
        min-width: 0;
    }

    .latest-name {
        color: #172554;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .latest-meta {
        color: #64748b;
        font-size: 12px;
        margin-top: 4px;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 999px;
        background: #ecfdf3;
        color: #15803d;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }


    /* =========================
       ACTIVITY
       ========================= */

    .activity-photo {
        width: 70px;
        height: 55px;
        border-radius: 9px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .activity-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .activity-placeholder {
        width: 100%;
        height: 100%;
        background: #fff8df;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .activity-info {
        flex: 1;
        min-width: 0;
    }

    .activity-title {
        color: #172554;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .activity-meta {
        color: #64748b;
        font-size: 12px;
        margin-top: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .activity-link {
        background: #fff8df;
        color: #b77900;
        text-decoration: none;
        padding: 7px 11px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .activity-link:hover {
        background: #ffc50b;
        color: #172554;
    }


    /* =========================
       EMPTY
       ========================= */

    .empty-state {
        padding: 30px 10px;
        text-align: center;
        color: #94a3b8;
        font-size: 13px;
    }


    /* =========================
       RESPONSIVE
       ========================= */

    @media (max-width: 1100px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .charts-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 768px) {

        .latest-grid {
            grid-template-columns: 1fr;
        }

        .training-layout {
            gap: 10px;
        }

        .training-chart {
            flex: 1;
        }

        .training-legend {
            width: 42%;
        }

        .dashboard-header h1 {
            font-size: 26px;
        }

    }


    @media (max-width: 500px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-card {
            padding: 18px;
        }

        .dashboard-card {
            padding: 17px;
        }

        .training-layout {
            flex-direction: column;
            height: auto;
        }

        .training-chart {
            width: 100%;
            height: 220px;
        }

        .training-legend {
            width: 100%;
        }

    }

</style>

@endsection