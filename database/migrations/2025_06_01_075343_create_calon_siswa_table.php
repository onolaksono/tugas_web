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
        Schema::create('calon_siswa', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            // Tambahkan dulu kolomnya
            $table->string('nomor_registrasi');
            $table->foreign('nomor_registrasi', 'fk_calonsiswa_registrasi')
                ->references('nomor_registrasi')
                ->on('pendaftaran')
                ->onDelete('cascade');

            $table->string('nama_lengkap');
            $table->string('nisn')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('pilihan_jurusan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_siswa');
    }
};
