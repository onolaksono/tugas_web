<div class="modal fade text-left" id="editCalonSiswa{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('calon.update', $item->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Biodata Calon Siswa</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Nomor Registrasi</label>
                            <input type="text" name="nomor_registrasi" value="{{ $item->nomor_registrasi }}"
                                class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ $item->nama_lengkap }}"
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ $item->tempat_lahir }}"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                value="{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('Y-m-d') : '' }}"
                                class="form-control">

                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>NISN</label>
                            <input type="text" name="nisn" value="{{ $item->nisn }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <input name="alamat" class="form-control" value="{{ $item->alamat }}">
                        </div>
                        <div class="mb-3">
                            <label>No HP</label>
                            <input type="text" name="no_hp" value="{{ $item->no_hp }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" value="{{ $item->asal_sekolah }}"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Kompetensi Keahlian</label>
                            <select name="pilihan_jurusan" class="form-control">
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="Rekayasa Perangkat Lunak"
                                    {{ $item->pilihan_jurusan == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>
                                    Rekayasa Perangkat Lunak</option>
                                <option value="Teknik Komputer dan Jaringan"
                                    {{ $item->pilihan_jurusan == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>
                                    Teknik Komputer dan Jaringan</option>
                                <option value="Teknik Elektronika Industri"
                                    {{ $item->pilihan_jurusan == 'Teknik Elektronika Industri' ? 'selected' : '' }}>
                                    Teknik Elektronika Industri</option>
                                <option value="Teknik Pendingin dan Tata Udara"
                                    {{ $item->pilihan_jurusan == 'Teknik Pendingin dan Tata Udara' ? 'selected' : '' }}>
                                    Teknik Pendingin dan Tata Udara</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
