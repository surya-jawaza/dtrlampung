@extends('layouts.app')

@section('title', 'Edit Pengurus')

@section('content')

<style>
    .form-container {
        max-width: 700px;
        background: white;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
    }

    .form-container h1 {
        margin-top: 0;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .current-photo {
        margin-bottom: 10px;
    }

    .current-photo img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }

    .btn {
        padding: 10px 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-simpan {
        background: #2563eb;
        color: white;
    }

    .btn-kembali {
        background: #ddd;
        color: #333;
        margin-left: 8px;
    }

    .error-box {
        background: #ffe5e5;
        color: #b00000;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>

<div class="form-container">

    <h1>Edit Pengurus</h1>

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

    <form action="{{ route('pengurus.update', $pengurus->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>

            <input
                type="text"
                name="nama"
                id="nama"
                value="{{ old('nama', $pengurus->nama) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>

            @if ($pengurus->foto)
                <div class="current-photo">
                    <img
                        src="{{ asset('storage/' . $pengurus->foto) }}"
                        alt="Foto {{ $pengurus->nama }}"
                    >
                </div>
            @endif

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
                value="{{ old('jabatan', $pengurus->jabatan) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="kontak">Kontak</label>

            <input
                type="text"
                name="kontak"
                id="kontak"
                value="{{ old('kontak', $pengurus->kontak) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $pengurus->email) }}"
            >
        </div>

        <div class="form-group">
            <label for="periode">Periode</label>

            <input
                type="text"
                name="periode"
                id="periode"
                value="{{ old('periode', $pengurus->periode) }}"
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
                value="{{ old('jenjang_training', $pengurus->jenjang_training) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <input
                type="text"
                name="status"
                id="status"
                value="{{ old('status', $pengurus->status) }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-simpan">
            Simpan Perubahan
        </button>

        <a href="{{ route('pengurus.index') }}" class="btn btn-kembali">
            Kembali
        </a>

    </form>

</div>

@endsection