@extends('layouts.app')
@section('title', 'Calon Siswa - SMK Mandiri')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/simple-datatables/style.css') }}">
@endpush
@section('content')
    <div class="page-title">
        <h3>Calon Siswa</h3>
        <p class="text-subtitle text-muted">Daftar Calon Siswa</p>
    </div>
    <section class="section">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class='card-heading p-1 pl-3'>Pendaftar</h3> --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('warning'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session('warning') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <select id="statusFilter" class="form-select">
                                        <option value="">-- Semua Status --</option>
                                        <option value="lengkap">Sudah Lengkap</option>
                                        <option value="belum">Belum Lengkap</option>
                                    </select>
                                </div>
                            </div>

                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>Nomo Registrasi</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>No HP</th>
                                        <th>Asal Sekolah</th>
                                        <th>Kompetensi Keahlian</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calon as $item)
                                        @php
                                            $lengkap =
                                                $item->tempat_lahir && $item->tanggal_lahir && $item->jenis_kelamin;
                                            $status = $lengkap ? 'lengkap' : 'belum';
                                        @endphp
                                        <tr data-status="{{ $status }}">
                                            <td>{{ $item->nomor_registrasi }}</td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->nisn }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->asal_sekolah }}</td>
                                            <td>{{ $item->pilihan_jurusan }}</td>
                                            <td>
                                                <span class="badge bg-{{ $item->status_biodata_badge }}">
                                                    {{ $item->status_biodata_text }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="#" title="Edit" data-bs-toggle="modal"
                                                    data-bs-target="#editCalonSiswa{{ $item->id }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a> |
                                                <a href="" title="Hapus" data-bs-toggle="modal"
                                                    data-bs-target="#hapusCalonSiswa{{ $item->id }}"> <i
                                                        class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>

                                        @include('admin.modal.edit_calon_siswa')
                                        @include('admin.modal.hapus_calon_siswa')
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('assets-admin/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable("#table1");

        // Fungsi untuk menerapkan filter
        function applyFilter(selected) {
            const rows = document.querySelectorAll('#table1 tbody tr');
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                if (!selected || selected === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Saat halaman dimuat, terapkan kembali filter yang disimpan
        window.addEventListener('DOMContentLoaded', () => {
            const savedFilter = localStorage.getItem('statusFilter');
            if (savedFilter) {
                document.getElementById('statusFilter').value = savedFilter;
                applyFilter(savedFilter);
            }
        });

        // Saat dropdown berubah, simpan ke localStorage dan terapkan filter
        document.getElementById('statusFilter').addEventListener('change', function() {
            const selected = this.value;
            localStorage.setItem('statusFilter', selected);
            applyFilter(selected);
        });
    </script>
@endpush
