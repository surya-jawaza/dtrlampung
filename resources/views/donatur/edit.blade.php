@extends('layouts.app')

@section('title', 'Edit Donatur')

@section('content')

<div class="form-container">

    <h1>Edit Donatur</h1>

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

    <form action="{{ route('donatur.update', $donatur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_donatur">Nama Donatur</label>

            <input
                type="text"
                name="nama_donatur"
                id="nama_donatur"
                value="{{ old('nama_donatur', $donatur->nama_donatur) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="jenis_donatur">Jenis Donatur</label>

            <select name="jenis_donatur" id="jenis_donatur" required>
                <option value="">-- Pilih Jenis --</option>

                <option value="Individu"
                    {{ old('jenis_donatur', $donatur->jenis_donatur) == 'Individu' ? 'selected' : '' }}>
                    Individu
                </option>

                <option value="Instansi"
                    {{ old('jenis_donatur', $donatur->jenis_donatur) == 'Instansi' ? 'selected' : '' }}>
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
                value="{{ old('kontak', $donatur->kontak) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $donatur->email) }}"
            >
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>

            <textarea
                name="alamat"
                id="alamat"
                rows="4"
                required
            >{{ old('alamat', $donatur->alamat) }}</textarea>
        </div>

        <div class="form-group">
            <label for="jenis_donasi">Jenis Donasi</label>

            <select name="jenis_donasi" id="jenis_donasi" required>
                <option value="">-- Pilih Jenis Donasi --</option>

                <option value="Uang"
                    {{ old('jenis_donasi', $donatur->jenis_donasi) == 'Uang' ? 'selected' : '' }}>
                    Uang
                </option>

                <option value="Barang"
                    {{ old('jenis_donasi', $donatur->jenis_donasi) == 'Barang' ? 'selected' : '' }}>
                    Barang
                </option>

                <option value="Lainnya"
                    {{ old('jenis_donasi', $donatur->jenis_donasi) == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select name="status" id="status" required>
                <option value="">-- Pilih Status --</option>

                <option value="Aktif"
                    {{ old('status', $donatur->status) == 'Aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="Tidak Aktif"
                    {{ old('status', $donatur->status) == 'Tidak Aktif' ? 'selected' : '' }}>
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
            >{{ old('keterangan', $donatur->keterangan) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Simpan Perubahan
            </button>

            <a href="{{ route('donatur.index') }}" class="btn btn-kembali">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection