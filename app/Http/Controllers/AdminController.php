<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nilai;
use App\Models\CalonSiswa;
use App\Models\UploadBerkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

     // Tampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // dd($request);
        // die;
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // Cek apakah email terdaftar
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            // Email tidak ditemukan
            return back()->with('login_error', 'Email atau password salah.')->withInput();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        session()->flash('login_error', 'Email atau password salah.');
        return back()->withInput();

    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $jurusanList = [
            "Rekayasa Perangkat Lunak" => "RPL",
            "Teknik Komputer dan Jaringan" => "TKJ",
            "Teknik Elektronika Industri" => "TEI",
            "Teknik Pendingin dan Tata Udara" => "TPTU",
        ];

        $jumlahPendaftar = [];

        foreach ($jurusanList as $nama => $kode) {
            $jumlah = DB::table('calon_siswa')
                ->where('pilihan_jurusan', $nama)
                ->count();

            $jumlahPendaftar[$kode] = $jumlah;
             // Hitung total semua pendaftar
            $totalPendaftar = array_sum($jumlahPendaftar);
        }

            return view('admin.dashboard', compact('jumlahPendaftar', 'totalPendaftar'));
    }

    public function showCalonSiswa()
    {
        $calon = CalonSiswa::with('pendaftaran')
        ->orderBy('status_biodata','desc')
        ->get();
        return view('admin.data_calon_siswa', compact('calon'));
    }

    public function updateBioSiswa(Request $request, $id) {
        try {
            $calon = CalonSiswa::findOrFail($id);

            // Update data dari request
            $calon->nama_lengkap = $request->nama_lengkap;
            $calon->nisn = $request->nisn;
            $calon->tempat_lahir = $request->tempat_lahir;
            $calon->tanggal_lahir = $request->tanggal_lahir;
            $calon->jenis_kelamin = $request->jenis_kelamin;
            $calon->alamat = $request->alamat;
            $calon->no_hp = $request->no_hp;
            $calon->asal_sekolah = $request->asal_sekolah;
            $calon->pilihan_jurusan = $request->pilihan_jurusan;

            // Cek kelengkapan
            $lengkap = $request->tempat_lahir && $request->tanggal_lahir && $request->jenis_kelamin;

            $calon->status_biodata = $lengkap ? 'lengkap' : 'belum';
            $calon->save();

            // Cek dan kelola upload_berkas
            if ($lengkap) {
                // Jika belum ada di upload_berkas, tambahkan
                UploadBerkas::firstOrCreate([
                    'calon_siswa_id' => $calon->id
                ]);
                Nilai::firstOrCreate([
                    'calon_siswa_id' => $calon->id
                ]);
            } else {
                // Jika data belum lengkap, hapus jika sudah pernah masuk upload_berkas
                UploadBerkas::where('calon_siswa_id', $calon->id)->delete();
                Nilai::where('calon_siswa_id', $calon->id)->delete();
            }

            if ($lengkap) {
                return redirect()->back()->with('success', 'Data calon siswa berhasil diperbarui dan lengkap.');
            } else {
                return redirect()->back()->with('warning', 'Data calon siswa diperbarui, tetapi belum lengkap.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $calon = CalonSiswa::findOrFail($id);
        $calon->delete();

        return redirect()->back()->with('success', 'Data calon siswa berhasil dihapus.');
    }
}
