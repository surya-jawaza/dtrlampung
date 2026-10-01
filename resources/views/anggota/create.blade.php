@extends('layouts.app')

@section('title', 'Tambah Anggota')

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

    textarea {
        height: 100px;
        resize: vertical;
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

    <h1>Tambah Anggota</h1>

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

    <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
        </div>

        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>
            </select>
        </div>

        <div class="form-group">
            <label>Kontak Person</label>
            <input type="text" name="kontak_person" value="{{ old('kontak_person') }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
            <label>Jenjang Training</label>
            <input type="text" name="jenjang_training" value="{{ old('jenjang_training') }}" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" value="{{ old('status') }}" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*">
        </div>

        <button type="submit" class="btn btn-simpan">
            Simpan Anggota
        </button>

        <a href="{{ route('anggota.index') }}" class="btn btn-kembali">
            Kembali
        </a>

    </form>

</div>

@endsection