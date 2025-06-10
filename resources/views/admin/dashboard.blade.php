@extends('layouts.app')
@section('title', 'Dashboard - SMK Mandiri')
@push('styles')
    <style>
        .dashboard-container {
            display: flex;
            align-items: flex-start;
            gap: 40px;
            max-width: 900px;
            margin: auto;
        }

        .info-panel {
            width: 250px;
        }

        .info-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info-total {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #374151;
        }

        .info-change {
            color: #10b981;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 14px;
            color: #4b5563;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 4px;
            margin-right: 8px;
        }

        .chart-panel {
            width: 100%;
            max-width: 600px;
        }
    </style>
@endpush
@section('content')
    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">Total Pendaftar Calon Siswa</p>
    </div>
    <section class="section">
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class='card-heading p-1 pl-3'>Pendaftar</h3> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Kolom Keterangan (kiri) -->
                            <div class="col-md-4">
                                <div class="info-title">Pendaftar</div>
                                <div class="info-total">{{ $totalPendaftar }} orang</div>
                                <div class="info-change text-success">Dari Semua Kompetensi Keahlian</div>

                                <!-- Legend Manual -->
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #7219d6;"></div>
                                    RPL
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #27a50e;"></div>
                                    TKJ
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #af0d0d;"></div>
                                    TEI
                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #2844d1;"></div>
                                    TPTU
                                </div>
                            </div>

                            <!-- Kolom Chart (kanan) -->
                            <div class="col-md-8">

                                <canvas id="chartPendaftar" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class='card-heading p-1 pl-3'>Pendaftar</h3> -->
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Status Berkas</h5>
                        <hr>

                        <!-- Lengkap -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="col-4">Lengkap</div>
                            <div class="col-6">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 70%;"
                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-2 text-end">70%</div>
                        </div>

                        <!-- Belum Lengkap -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="col-4">Belum Lengkap</div>
                            <div class="col-6">
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 30%;"
                                        aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-2 text-end">30%</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('assets-admin/js/diagram.js') }}"></script>
    <script>
        const ctx = document.getElementById('chartPendaftar').getContext('2d');

        const data = {
            labels: ['RPL', 'TKJ', 'TEI', 'TPTU'],
            datasets: [{
                label: 'Jumlah Pendaftar',
                data: [
                    {{ $jumlahPendaftar['RPL'] ?? 0 }},
                    {{ $jumlahPendaftar['TKJ'] ?? 0 }},
                    {{ $jumlahPendaftar['TEI'] ?? 0 }},
                    {{ $jumlahPendaftar['TPTU'] ?? 0 }}
                ],
                backgroundColor: ['purple', 'green', 'red', 'blue']
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    </script>
@endpush
