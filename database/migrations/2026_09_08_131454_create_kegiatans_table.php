<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();

            $table->string('judul_kegiatan');
            $table->string('kategori');
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('lokasi');
            $table->string('penanggung_jawab');
            $table->integer('jumlah_peserta');

            $table->string('foto_utama')->nullable();
            $table->text('ringkasan');
            $table->longText('isi_kegiatan');
            $table->json('dokumentasi')->nullable();
            $table->string('link_terkait')->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};