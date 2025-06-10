<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CalonSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $jurusanList = [
            "Rekayasa Perangkat Lunak" => "RPL",
            "Teknik Komputer dan Jaringan" => "TKJ",
            "Teknik Elektronika Industri" => "TEI",
            "Teknik Pendingin dan Tata Udara" => "TPTU",
        ];

        $tahun = date('Y');

        for ($i = 1; $i <= 50; $i++) {
            // Pilih jurusan acak
            $kompetensi = array_rand($jurusanList);
            $kodeJurusan = $jurusanList[$kompetensi];

            // Hitung urutan registrasi untuk jurusan ini
            $count = DB::table('pendaftaran')
                ->where('nomor_registrasi', 'like', "{$kodeJurusan}-{$tahun}-%")
                ->count();

            $urutan = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
            $nomor_registrasi = "{$kodeJurusan}-{$tahun}-{$urutan}";

            // Insert ke tabel pendaftaran
            DB::table('pendaftaran')->insert([
                'nomor_registrasi' => $nomor_registrasi,
                'tanggal_daftar' => Carbon::now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            // Insert ke tabel calon_siswa
            DB::table('calon_siswa')->insert([
                'nomor_registrasi' => $nomor_registrasi,
                'nama_lengkap' => $faker->name,  // Nama random
                'nisn' => str_pad(mt_rand(1000000000, 9999999999), 10, '0', STR_PAD_LEFT),
                'asal_sekolah' => 'SMP Negeri ' . rand(1, 10),
                'pilihan_jurusan' => $kompetensi,
                'no_hp' => '08' . rand(1000000000, 9999999999),
                'alamat' => 'Jl. Contoh Alamat No. ' . rand(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
