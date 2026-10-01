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
        Schema::create('surat_dokumens', function (Blueprint $table) {
    $table->id();
    $table->string('nama_dokumen');
    $table->string('jenis_dokumen');
    $table->date('tanggal_dokumen');
    $table->string('nomor_dokumen')->nullable();
    $table->text('keterangan')->nullable();
    $table->string('file_dokumen');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_dokumens');
    }
};
