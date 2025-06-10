<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets-admin/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="{{ asset('assets-admin/images/favicon.svg') }}" height="48" class='mb-4'>
                                <h3>Daftar Sebagai Calon Siswa</h3>
                                <p>Silakan isi formulir untuk mendaftar.</p>
                            </div>
                            <form action="{{ route('pendaftaran.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" id="nama_lengkap" class="form-control"
                                                name="nama_lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nisn">NISN</label>
                                            <input type="text" id="nisn" class="form-control" name="nisn"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="asal_sekolah">Asal Sekolah</label>
                                            <input type="text" id="asal_sekolah" class="form-control"
                                                name="asal_sekolah">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Kompetensi Keahlian</label>
                                            <select name="kompetensi" id="" class="form-control" required>
                                                <option value="" @readonly(true)>Pilih Kompetensi Keahlian
                                                </option>
                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak
                                                </option>
                                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan
                                                    Jaringan</option>
                                                <option value="Teknik Elektronika Industri">Teknik Elektronika Industri
                                                </option>
                                                <option value="Teknik Pendingin dan Tata Udara">Teknik Pendingin dan
                                                    Tata Udara</option>
                                            </select>
                                            <!-- <input type="text" id="country-floating" class="form-control" name="country-floating"> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" id="telepon" class="form-control" name="telepon"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" id="" class="form-control" name="alamat"
                                                required>
                                        </div>
                                    </div>
                                </diV>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Daftar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets-admin/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/app.js') }}"></script>

    <script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>

</html>
