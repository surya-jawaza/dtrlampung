<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donaturs', function (Blueprint $table) {
            $table->id();

            $table->string('nama_donatur');
            $table->string('jenis_donatur');
            $table->string('kontak');
            $table->string('email')->nullable();
            $table->text('alamat');
            $table->string('jenis_donasi');
            $table->string('status');
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donaturs');
    }
};