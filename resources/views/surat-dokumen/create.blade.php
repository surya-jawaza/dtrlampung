@extends('layouts.app')

@section('title', 'Upload Surat & Dokumen')

@section('content')

<div class="form-container">

    <h1>Upload Surat & Dokumen</h1>

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
        action="{{ route('surat-dokumen.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="form-group">
            <label for="nama_dokumen">Nama Dokumen</label>

            <input
                type="text"
                name="nama_dokumen"
                id="nama_dokumen"
                value="{{ old('nama_dokumen') }}"
                placeholder="Contoh: Surat Keputusan Pengurus 2026"
                required
            >
        </div>

        <div class="form-group">
            <label for="jenis_dokumen">Jenis Dokumen</label>

            <select name="jenis_dokumen" id="jenis_dokumen" required>
                <option value="">-- Pilih Jenis Dokumen --</option>

                <option value="Surat Masuk"
                    {{ old('jenis_dokumen') == 'Surat Masuk' ? 'selected' : '' }}>
                    Surat Masuk
                </option>

                <option value="Surat Keluar"
                    {{ old('jenis_dokumen') == 'Surat Keluar' ? 'selected' : '' }}>
                    Surat Keluar
                </option>

                <option value="Surat Keputusan"
                    {{ old('jenis_dokumen') == 'Surat Keputusan' ? 'selected' : '' }}>
                    Surat Keputusan
                </option>

                <option value="Proposal"
                    {{ old('jenis_dokumen') == 'Proposal' ? 'selected' : '' }}>
                    Proposal
                </option>

                <option value="MoU"
                    {{ old('jenis_dokumen') == 'MoU' ? 'selected' : '' }}>
                    MoU
                </option>

                <option value="Dokumen Administrasi"
                    {{ old('jenis_dokumen') == 'Dokumen Administrasi' ? 'selected' : '' }}>
                    Dokumen Administrasi
                </option>

                <option value="Lainnya"
                    {{ old('jenis_dokumen') == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_dokumen">Tanggal Dokumen</label>

            <input
                type="date"
                name="tanggal_dokumen"
                id="tanggal_dokumen"
                value="{{ old('tanggal_dokumen') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="nomor_dokumen">
                Nomor Surat / Dokumen
            </label>

            <input
                type="text"
                name="nomor_dokumen"
                id="nomor_dokumen"
                value="{{ old('nomor_dokumen') }}"
                placeholder="Opsional"
            >
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>

            <textarea
                name="keterangan"
                id="keterangan"
                rows="4"
                placeholder="Keterangan tambahan (opsional)"
            >{{ old('keterangan') }}</textarea>
        </div>

        <div class="form-group">
            <label for="file_dokumen">File Dokumen</label>

            <input
                type="file"
                name="file_dokumen"
                id="file_dokumen"
                accept=".pdf"
                required
            >

            <div class="file-info">
                Format PDF, maksimal 10 MB.
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Upload Dokumen
            </button>

            <a
                href="{{ route('surat-dokumen.index') }}"
                class="btn btn-kembali"
            >
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection