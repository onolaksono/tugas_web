<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadBerkas extends Model
{
    use HasFactory;
    protected $table = 'upload_berkas';

    protected $fillable = [
        'calon_siswa_id',
        'surat_keterangan_lulus',
        'kartu_keluarga',
        'ktp_orangtua',
        'akte_kelahiran',
        'surat_kelakuan_baik',
        'pas_foto',
        'status_upload',
    ];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class, 'calon_siswa_id');
    }
}
