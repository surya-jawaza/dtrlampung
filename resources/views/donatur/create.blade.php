@extends('layouts.app')

@section('title', 'Tambah Donatur')

@section('content')

<div class="form-container">

    <h1>Tambah Donatur</h1>

    @if ($errors->any())
        <div class="error-box">
            <strong>Terjadi kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('donatur.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_donatur">Nama Donatur</label>
            <input
                type="text"
                name="nama_donatur"
                id="nama_donatur"
                value="{{ old('nama_donatur') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="jenis_donatur">Jenis Donatur</label>

            <select name="jenis_donatur" id="jenis_donatur" required>
                <option value="">-- Pilih Jenis --</option>

                <option value="Individu"
                    {{ old('jenis_donatur') == 'Individu' ? 'selected' : '' }}>
                    Individu
                </option>

                <option value="Instansi"
                    {{ old('jenis_donatur') == 'Instansi' ? 'selected' : '' }}>
                    Instansi
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input
                type="text"
                name="kontak"
                id="kontak"
                value="{{ old('kontak') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
            >
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea
                name="alamat"
                id="alamat"
                rows="4"
                required
            >{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
            <label for="jenis_donasi">Jenis Donasi</label>

            <select name="jenis_donasi" id="jenis_donasi" required>
                <option value="">-- Pilih Jenis Donasi --</option>

                <option value="Uang"
                    {{ old('jenis_donasi') == 'Uang' ? 'selected' : '' }}>
                    Uang
                </option>

                <option value="Barang"
                    {{ old('jenis_donasi') == 'Barang' ? 'selected' : '' }}>
                    Barang
                </option>

                <option value="Lainnya"
                    {{ old('jenis_donasi') == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select name="status" id="status" required>
                <option value="">-- Pilih Status --</option>

                <option value="Aktif"
                    {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="Tidak Aktif"
                    {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>

            <textarea
                name="keterangan"
                id="keterangan"
                rows="4"
            >{{ old('keterangan') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Simpan Donatur
            </button>

            <a href="{{ route('donatur.index') }}" class="btn btn-kembali">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection