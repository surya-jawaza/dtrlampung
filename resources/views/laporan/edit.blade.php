@extends('layouts.app')

@section('title', 'Edit Laporan')

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

    .current-file {
        background: #f5f6f8;
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 10px;
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

    .btn-lihat {
        background: #e5e7eb;
        color: #333;
        text-decoration: none;
        padding: 6px 10px;
        border-radius: 4px;
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

    <h1>Edit Laporan</h1>

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
        action="{{ route('laporan.update', $laporan->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul_laporan">Judul Laporan</label>

            <input
                type="text"
                name="judul_laporan"
                id="judul_laporan"
                value="{{ old('judul_laporan', $laporan->judul_laporan) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="tanggal_laporan">Tanggal Laporan</label>

            <input
                type="date"
                name="tanggal_laporan"
                id="tanggal_laporan"
                value="{{ old('tanggal_laporan', $laporan->tanggal_laporan->format('Y-m-d')) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>

            <select name="kategori" id="kategori" required>
                <option value="">-- Pilih Kategori --</option>

                <option value="Kegiatan"
                    {{ old('kategori', $laporan->kategori) == 'Kegiatan' ? 'selected' : '' }}>
                    Kegiatan
                </option>

                <option value="Keuangan"
                    {{ old('kategori', $laporan->kategori) == 'Keuangan' ? 'selected' : '' }}>
                    Keuangan
                </option>

                <option value="Tahunan"
                    {{ old('kategori', $laporan->kategori) == 'Tahunan' ? 'selected' : '' }}>
                    Tahunan
                </option>

                <option value="Pertanggungjawaban"
                    {{ old('kategori', $laporan->kategori) == 'Pertanggungjawaban' ? 'selected' : '' }}>
                    Pertanggungjawaban
                </option>

                <option value="Lainnya"
                    {{ old('kategori', $laporan->kategori) == 'Lainnya' ? 'selected' : '' }}>
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
            >{{ old('keterangan', $laporan->keterangan) }}</textarea>
        </div>

        <div class="form-group">
            <label>File PDF Saat Ini</label>

            <div class="current-file">
                📄 {{ basename($laporan->file_pdf) }}

                <a
                    href="{{ asset('storage/' . $laporan->file_pdf) }}"
                    target="_blank"
                    class="btn-lihat"
                >
                    Lihat PDF
                </a>
            </div>
        </div>

        <div class="form-group">
            <label for="file_pdf">Ganti File PDF</label>

            <input
                type="file"
                name="file_pdf"
                id="file_pdf"
                accept=".pdf,application/pdf"
            >

            <small>
                Kosongkan jika tidak ingin mengganti file. Maksimal 10 MB.
            </small>
        </div>

        <button type="submit" class="btn btn-simpan">
            Simpan Perubahan
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