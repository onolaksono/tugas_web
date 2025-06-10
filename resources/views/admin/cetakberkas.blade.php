<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Bukti Pemberkasan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12pt;
            line-height: 1.6;
            margin: 40px;
        }

        h3,
        h4 {
            margin: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h3 {
            font-size: 16pt;
        }

        .header h4 {
            font-size: 14pt;
            font-weight: normal;
        }


        .info-table td:first-child {
            width: 40%;
        }

        .section-title {
            margin-top: 25px;
            font-weight: bold;
        }

        .checklist {
            margin-left: 18px;
        }

        .checklist li {
            margin-bottom: 6px;
        }

        .checkbox {
            font-family: DejaVu Sans, sans-serif;
            font-weight: bold;
            margin-left: 10px;
        }

        hr {
            border: 1px solid #000;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <div class="header">
        <h3>BUKTI PEMBERKASAN PPDB SMK MANDIRI</h3>
        <h4>TAHUN AJARAN 2025/2026</h4>
    </div>

    <hr>

    <table class="info-table">
        <tr>
            <td>No Pendaftaran</td>
            <td>: {{ $berkas->calonSiswa->nomor_registrasi }}</td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>: {{ $berkas->calonSiswa->nisn }}</td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>: {{ $berkas->calonSiswa->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $berkas->calonSiswa->tempat_lahir }},
                {{ \Carbon\Carbon::parse($berkas->calonSiswa->tanggal_lahir)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ ucfirst($berkas->calonSiswa->jenis_kelamin) }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $berkas->calonSiswa->alamat }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>: {{ $berkas->calonSiswa->no_hp }}</td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td>: {{ $berkas->calonSiswa->asal_sekolah }}</td>
        </tr>
        <tr>
            <td>Kompetensi Keahlian</td>
            <td>: {{ $berkas->calonSiswa->pilihan_jurusan }}</td>
        </tr>
    </table>

    <p class="section-title">Berkas yang dikumpulkan:</p>
    <table class="">
        <tr>
            <td>1. Surat Keterangan Lulus</td>
            <td class="checkbox">{!! $berkas->surat_keterangan_lulus ? '☑' : '☐' !!}</td>
        </tr>
        <tr>
            <td>2. Kartu Keluarga</td>
            <td class="checkbox">{!! $berkas->kartu_keluarga ? '☑' : '☐' !!}</td>
        </tr>
        <tr>
            <td>3. KTP Orang Tua</td>
            <td class="checkbox">{!! $berkas->ktp_orangtua ? '☑' : '☐' !!}</td>
        </tr>
        <tr>
            <td>4. Akte Kelahiran</td>
            <td class="checkbox">{!! $berkas->akte_kelahiran ? '☑' : '☐' !!}</td>
        </tr>
        <tr>
            <td>5. Surat Kelakuan Baik</td>
            <td class="checkbox">{!! $berkas->surat_kelakuan_baik ? '☑' : '☐' !!}</td>
        </tr>
        <tr>
            <td>6. Pas Foto</td>
            <td class="checkbox">{!! $berkas->pas_foto ? '☑' : '☐' !!}</td>
        </tr>
    </table>


    <h6 style="margin-top:-10px;">
        <p align="center" style="margin-top:1px; margin-left:380px;margin-top:-20px"> Kota
            Cimahi,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= date('Y') ?></p>
        <p align="center" style="margin-left:380px;margin-top:-10px">Panitia PPDB</p>
        <p align="center" style="word-spacing:150px; margin-top:60px;margin-left:380px">( )</p>
    </h6>

</body>

</html>
