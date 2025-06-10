<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\CalonSiswa;
use App\Models\UploadBerkas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UploadBerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calon = CalonSiswa::whereHas('uploadBerkas')
                                ->whereHas('nilai')->with(['nilai', 'uploadBerkas', 'pendaftaran'])->get();
        return view('admin.upload_berkas', compact('calon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Cek apakah data Nilai ada untuk calon_siswa_id = $id
            $nilai = Nilai::where('calon_siswa_id', $id)->first();

            if ($nilai) {
                // Update data nilai yang sudah ada
                $nilai->update([
                    'indonesia' => $request->bahasa_indonesia,
                    'matematika' => $request->matematika,
                    'inggris' => $request->inggris
                ]);
            } else {
                // Kalau datanya tidak ada, bisa kasih pesan error atau buat data baru jika perlu
                return redirect()->back()->with('error', 'Data nilai tidak ditemukan.');
            }

            // Cek apakah data UploadBerkas ada untuk calon_siswa_id = $id
            $uploadBerkas = UploadBerkas::where('calon_siswa_id', $id)->first();

            if ($uploadBerkas) {
                // Update data upload berkas yang sudah ada
                $uploadBerkas->update([
                    'surat_keterangan_lulus' => $request->has('surat_keterangan_lulus') ? 1 : null,
                    'kartu_keluarga'         => $request->has('kartu_keluarga') ? 1 : null,
                    'ktp_orangtua'           => $request->has('ktp_orangtua') ? 1 : null,
                    'akte_kelahiran'         => $request->has('akte_kelahiran') ? 1 : null,
                    'surat_kelakuan_baik'    => $request->has('surat_kelakuan_baik') ? 1 : null,
                    'pas_foto'               => $request->has('pas_foto') ? 1 : null,
                ]);

                // Cek apakah semua berkas terisi
                $semuaBerkas = [
                    $uploadBerkas->surat_keterangan_lulus,
                    $uploadBerkas->kartu_keluarga,
                    $uploadBerkas->ktp_orangtua,
                    $uploadBerkas->akte_kelahiran,
                    $uploadBerkas->surat_kelakuan_baik,
                    $uploadBerkas->pas_foto,
                ];

                $uploadBerkas->status_upload = collect($semuaBerkas)->contains(null) ? 'belum' : 'lengkap';
                $uploadBerkas->save();
            } else {
                return redirect()->back()->with('error', 'Data upload berkas tidak ditemukan.');
            }

            return redirect()->back()->with('success', 'Data nilai dan upload berkas berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cetakPDF($id)
    {
        $berkas = UploadBerkas::with('calonSiswa')->where('calon_siswa_id', $id)->firstOrFail();
        $pdf = Pdf::loadView('admin.cetakberkas', compact('berkas'))->setPaper('A4', 'portrait');

        return $pdf->stream('bukti-pemberkasan.pdf');
        // return view('admin.cetakberkas', compact('berkas'));
    }
}
