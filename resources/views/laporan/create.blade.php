@extends('layouts.app')

@section('title', 'Upload Laporan')

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

    <h1>Upload Laporan</h1>

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

    <form
        action="{{ route('laporan.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="form-group">
            <label for="judul_laporan">Judul Laporan</label>

            <input
                type="text"
                name="judul_laporan"
                id="judul_laporan"
                value="{{ old('judul_laporan') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="tanggal_laporan">Tanggal Laporan</label>

            <input
                type="date"
                name="tanggal_laporan"
                id="tanggal_laporan"
                value="{{ old('tanggal_laporan') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>

            <select name="kategori" id="kategori" required>
                <option value="">-- Pilih Kategori --</option>

                <option value="Kegiatan"
                    {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>
                    Kegiatan
                </option>

                <option value="Keuangan"
                    {{ old('kategori') == 'Keuangan' ? 'selected' : '' }}>
                    Keuangan
                </option>

                <option value="Tahunan"
                    {{ old('kategori') == 'Tahunan' ? 'selected' : '' }}>
                    Tahunan
                </option>

                <option value="Pertanggungjawaban"
                    {{ old('kategori') == 'Pertanggungjawaban' ? 'selected' : '' }}>
                    Pertanggungjawaban
                </option>

                <option value="Lainnya"
                    {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
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

        <div class="form-group">
            <label for="file_pdf">File PDF</label>

            <input
                type="file"
                name="file_pdf"
                id="file_pdf"
                accept=".pdf,application/pdf"
                required
            >

            <small>
                Maksimal ukuran file: 10 MB.
            </small>
        </div>

        <button type="submit" class="btn btn-simpan">
            Upload Laporan
        </button>

        <a
            href="{{ route('laporan.index') }}"
            class="btn btn-kembali"
        >
            Kembali
        </a>

    </form>

</div>

@endsection