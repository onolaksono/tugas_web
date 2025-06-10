<!-- Modal Edit -->
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('update.berkas.nilai', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Nilai & Berkas - ({{ $item->nomor_registrasi }}) {{ $item->nama_lengkap }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body row">

                    <!-- ========== BAGIAN NILAI ========== -->
                    <div class="col-md-6">
                        <h6>Nilai Ujian</h6>
                        @php $nilai = $item->nilai; @endphp

                        <div class="mb-3">
                            <label>Bahasa Indonesia</label>
                            <input type="number" name="bahasa_indonesia" class="form-control"
                                value="{{ $nilai->indonesia ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label>Matematika</label>
                            <input type="number" name="matematika" class="form-control"
                                value="{{ $nilai->matematika ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label>Bahasa Inggris</label>
                            <input type="number" name="inggris" class="form-control"
                                value="{{ $nilai->inggris ?? '' }}">
                        </div>
                    </div>

                    <!-- ========== BAGIAN BERKAS ========== -->
                    <div class="col-md-6">
                        <h6>Upload Berkas</h6>
                        @php $berkas = $item->uploadBerkas; @endphp

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="surat_keterangan_lulus" value="1"
                                {{ $berkas && $berkas->surat_keterangan_lulus ? 'checked' : '' }}>
                            <label class="form-check-label">Surat Keterangan Lulus</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="kartu_keluarga" value="1"
                                {{ $berkas && $berkas->kartu_keluarga ? 'checked' : '' }}>
                            <label class="form-check-label">Kartu Keluarga</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ktp_orangtua" value="1"
                                {{ $berkas && $berkas->ktp_orangtua ? 'checked' : '' }}>
                            <label class="form-check-label">KTP Orang Tua</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="akte_kelahiran" value="1"
                                {{ $berkas && $berkas->akte_kelahiran ? 'checked' : '' }}>
                            <label class="form-check-label">Akte Kelahiran</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="surat_kelakuan_baik" value="1"
                                {{ $berkas && $berkas->surat_kelakuan_baik ? 'checked' : '' }}>
                            <label class="form-check-label">Surat Kelakuan Baik</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="pas_foto" value="1"
                                {{ $berkas && $berkas->pas_foto ? 'checked' : '' }}>
                            <label class="form-check-label">Pas Foto</label>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
