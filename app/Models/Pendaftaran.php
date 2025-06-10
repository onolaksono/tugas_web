<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nomor_registrasi',
        'tanggal_daftar',
    ];

    // Format tanggal
    protected $casts = [
        'tanggal_daftar' => 'date',
    ];

    public function calonSiswa()
    {
        return $this->hasOne(CalonSiswa::class);
    }

}
