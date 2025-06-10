<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\CalonSiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    private function generateNomorPendaftaran()
    {
        $tahun = date('Y');
        $last = Pendaftaran::whereYear('created_at', $tahun)->count() + 1;
        return 'SMK' . $tahun . str_pad($last, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Mapping jurusan ke kode
        $mapKode = [
            "Rekayasa Perangkat Lunak" => "RPL",
            "Teknik Komputer dan Jaringan" => "TKJ",
            "Teknik Elektronika Industri" => "TEI",
            "Teknik Pendingin dan Tata Udara" => "TPTU",
        ];

        $kompetensi = $request->kompetensi;
        $kodeJurusan = $mapKode[$kompetensi] ?? 'XXX';
        $tahun = date('Y');

        // Cek jumlah pendaftar dengan kode jurusan & tahun yang sama
        $count = DB::table('pendaftaran')
            ->where('nomor_registrasi', 'like', "{$kodeJurusan}-{$tahun}-%")
            ->count();

        // Buat urutan dengan leading zero
        $urutan = str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // Buat nomor registrasi
        $nomor_registrasi = "{$kodeJurusan}-{$tahun}-{$urutan}";
        // dd($nomor_registrasi);
        // die;
        $pendaftaran = Pendaftaran::create([
                            'nomor_registrasi' => $nomor_registrasi,
                            'tanggal_daftar' => now(),
                        ]);

        // Simpan ke tabel calon_siswa (relasi ke pendaftaran)
        CalonSiswa::create([
            'nomor_registrasi' => $nomor_registrasi,
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'asal_sekolah' => $request->asal_sekolah,
            'pilihan_jurusan' => $kompetensi,
            'no_hp' => $request->telepon,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('pendaftaran.sukses', $nomor_registrasi);



    }

    public function sukses($nomor)
    {
        // Ambil data calon siswa dan pendaftaran berdasar nomor registrasi
        $calon = CalonSiswa::where('nomor_registrasi', $nomor)->firstOrFail();

        // Jika kamu ingin data tanggal daftar dari tabel pendaftaran
        $pendaftaran = Pendaftaran::where('nomor_registrasi', $nomor)->first();

        return view('register-sukses', [
            'nomorRegistrasi' => $nomor,
            'namaLengkap' => $calon->nama_lengkap,
            'nisn' => $calon->nisn,
            'kompetensi' => $calon->pilihan_jurusan,
            'tanggalDaftar' => $pendaftaran ? $pendaftaran->tanggal_daftar : null,
        ]);
    }

    public function generatePdf($nomor_registrasi)
    {
        $calon = CalonSiswa::where('nomor_registrasi', $nomor_registrasi)
                            ->with('pendaftaran')
                            ->firstOrFail();

        $pdf = PDF::loadView('print-registrasi', ['calon' => $calon]);

        return $pdf->download("pendaftaran-{$nomor_registrasi}.pdf");


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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
