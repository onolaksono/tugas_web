<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('upload_berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_siswa_id')->constrained('calon_siswa')->onDelete('cascade');

            $table->string('surat_keterangan_lulus')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('ktp_orangtua')->nullable();
            $table->string('akte_kelahiran')->nullable();
            $table->string('surat_kelakuan_baik')->nullable();
            $table->string('pas_foto')->nullable();
            $table->enum('status_upload', ['belum', 'lengkap'])->default('belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_berkas');
    }
};
