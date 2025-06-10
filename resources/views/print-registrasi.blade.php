<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Berhasil</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
        }

        .card {
            max-width: 450px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 12px;
            background-color: white;
        }

        .text-success {
            color: green;
        }

        .text-primary {
            color: #0d6efd;
        }

        .info-label {
            text-decoration: underline;
            font-size: 14px;
            color: #555;
        }

        .info-value {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        hr {
            margin: 20px 0;
        }

        img.logo {
            height: 60px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="card">

        <h3 class="text-success">Pendaftaran Berhasil!</h3>
        <p>Terima kasih telah mendaftar sebagai calon siswa.</p>

        <hr>

        <h5><strong>Nomor Registrasi Anda:</strong></h5>
        <h3 class="text-primary">{{ $calon->nomor_registrasi }}</h3>

        <div class="info-block">
            <div class="info-label">Nama Lengkap</div>
            <div class="info-value">{{ $calon->nama_lengkap }}</div>
        </div>
        <div class="info-block">
            <div class="info-label">NISN</div>
            <div class="info-value">{{ $calon->nisn }}</div>
        </div>
        <div class="info-block">
            <div class="info-label">Kompetensi Keahlian</div>
            <div class="info-value">{{ $calon->pilihan_jurusan }}</div>
        </div>
        <div class="info-block">
            <div class="info-label">Tanggal Daftar</div>
            <div class="info-value">
                {{ \Carbon\Carbon::parse($calon->pendaftaran->tanggal_daftar)->format('d M Y') }}
            </div>
        </div>
    </div>
</body>

</html>
