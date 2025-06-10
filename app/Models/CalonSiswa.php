<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;

    protected $table = 'calon_siswa';

    protected $fillable = [
        'nomor_registrasi',
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'asal_sekolah',
        'pilihan_jurusan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Relasi ke model Pendaftaran
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'nomor_registrasi', 'nomor_registrasi');
    }

    public function getIsLengkapAttribute()
    {
        return $this->tempat_lahir && $this->tanggal_lahir && $this->jenis_kelamin;
    }

    public function getStatusBiodataTextAttribute()
    {
        return $this->is_lengkap ? 'Sudah Lengkap' : 'Belum Lengkap';
    }

    public function getStatusBiodataBadgeAttribute()
    {
        return $this->is_lengkap ? 'success' : 'danger';
    }

    public function getStatusDataAttribute()
    {
        return $this->is_lengkap ? 'lengkap' : 'belum';
    }

    // CalonSiswa.php
    public function uploadBerkas()
    {
        return $this->hasOne(UploadBerkas::class, 'calon_siswa_id');
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'calon_siswa_id');
    }



}
