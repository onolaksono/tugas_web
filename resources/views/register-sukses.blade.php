<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pendaftaran Berhasil</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}" />
    <style>
        body,
        html {
            height: 100%;
            background-color: #f8f9fa;
        }

        .vh-100 {
            min-height: 100vh !important;
        }

        .card {
            border-radius: 12px;
        }

        .no-print {
            cursor: pointer;
        }

        /* Hover tombol cetak */
        #btn-cetak:hover {
            color: white !important;
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="max-width: 450px; width: 100%;">
            <div class="card-body text-center">
                <img src="{{ asset('assets-admin/images/favicon.svg') }}" height="60" class="mb-3"
                    alt="Logo" />
                <h3 class="text-success mb-3">Pendaftaran Berhasil!</h3>
                <p class="mb-4">Terima kasih telah mendaftar sebagai calon siswa.</p>

                <hr>

                <h5><strong>Nomor Registrasi Anda:</strong></h5>
                <h3 class="text-primary mb-4">{{ $nomorRegistrasi }}</h3>

                <div class="text-center mb-4 info-block">
                    <div class="info-label text-decoration-underline">Nama Lengkap</div>
                    <h4 class="info-value">{{ $namaLengkap }}</h4>
                </div>
                <div class="text-center mb-4 info-block">
                    <div class="info-label text-decoration-underline">NISN</div>
                    <h4 class="info-value">{{ $nisn ?? '-' }}</h4>
                </div>
                <div class="text-center mb-4 info-block">
                    <div class="info-label text-decoration-underline">Kompetensi Keahlian</div>
                    <h4 class="info-value">{{ $kompetensi }}</h4>
                </div>
                <div class="text-center mb-4 info-block">
                    <div class="info-label text-decoration-underline">Tanggal Daftar</div>
                    <h4 class="info-value">{{ \Carbon\Carbon::parse($tanggalDaftar)->format('d M Y') }}</h4>
                </div>


                <p class="text-muted mb-3">Silakan simpan atau cetak bukti pendaftaran ini.</p>
                <a class="btn btn-outline-primary no-print" id="btn-cetak"
                    href="{{ route('pendaftaran.pdf', $nomorRegistrasi) }}">Simpan / Cetak
                    PDF</a>
                <a href="/" class="btn btn-secondary mt-3 d-block no-print">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
