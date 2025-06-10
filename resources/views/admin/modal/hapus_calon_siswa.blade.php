<!-- Modal Hapus Calon Siswa -->
<div class="modal fade text-left" id="hapusCalonSiswa{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="hapusLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('calon.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="hapusLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="close rounded-pill white" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin menghapus data : <br> <strong>{{ $item->nomor_registrasi }} - {{ $item->nama_lengkap }}</strong>?</p>
                    <p class="text-danger mb-0">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
