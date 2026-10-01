@extends('layouts.app')

@section('title', 'Tambah Pengurus')

@section('content')

<div class="form-container">

    <h1>Tambah Pengurus</h1>

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

    <form action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input
                type="text"
                name="nama"
                id="nama"
                value="{{ old('nama') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            <input
                type="file"
                name="foto"
                id="foto"
                accept="image/*"
            >
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input
                type="text"
                name="jabatan"
                id="jabatan"
                value="{{ old('jabatan') }}"
                required
            >
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
            <label for="periode">Periode</label>
            <input
                type="text"
                name="periode"
                id="periode"
                value="{{ old('periode') }}"
                placeholder="Contoh: 2026-2027"
                required
            >
        </div>

        <div class="form-group">
            <label for="jenjang_training">Jenjang Training</label>
            <input
                type="text"
                name="jenjang_training"
                id="jenjang_training"
                value="{{ old('jenjang_training') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input
                type="text"
                name="status"
                id="status"
                value="{{ old('status') }}"
                required
            >
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Simpan Pengurus
            </button>

            <a href="{{ route('pengurus.index') }}" class="btn btn-kembali">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection