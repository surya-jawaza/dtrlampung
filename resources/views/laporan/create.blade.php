@extends('layouts.app')

@section('title', 'Upload Laporan')

@section('content')

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

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Upload Laporan
            </button>

            <a
                href="{{ route('laporan.index') }}"
                class="btn btn-kembali"
            >
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection