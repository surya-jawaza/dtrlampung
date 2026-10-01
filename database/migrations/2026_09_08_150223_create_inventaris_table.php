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
       Schema::create('inventaris', function (Blueprint $table) {
    $table->id();
    $table->string('nama_barang');
    $table->string('kategori');
    $table->integer('jumlah');
    $table->string('satuan');
    $table->string('kondisi');
    $table->string('lokasi_penyimpanan');
    $table->date('tanggal_pembelian')->nullable();
    $table->decimal('harga_perolehan', 15, 2)->nullable();
    $table->text('keterangan')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
