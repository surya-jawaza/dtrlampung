@extends('layouts.app')

@section('title', 'Edit Laporan')

@section('content')

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

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Simpan Perubahan
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